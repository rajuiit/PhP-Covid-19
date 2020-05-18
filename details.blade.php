<?php
include('header.php');
$country  = $_GET['country'];
$country_data = callAPI('GET', 'https://restcountries.eu/rest/v2/name/'.$country,  array(), '',  array());
$country_data = json_decode($country_data,true);
if($country_data['status'] = 404){
	$split = explode(" ", $country);
	$last_word = $split[count($split)-1];
	$country_data = callAPI('GET', 'https://restcountries.eu/rest/v2/name/'.$last_word,  array(), '',  array());
	$country_data = json_decode($country_data,true);
}


$labels_str="";
$files = array_diff(scandir('data'), array('.', '..'));
$final_data = array();
foreach ($files as $key => $value) {
	$basename = basename($value, ".csv");	
	$labels_str.= "'".$basename."', "; 
    $final_data[$basename]['confirmed'] = array();
    $final_data[$basename]['death'] = array();
    $final_data[$basename]['recover'] = array();
}


    foreach ($data as $key2 => $value) {
    	if($value[1]==$country){
    		$formatted_date = date('m-d-Y',strtotime($value[2]));

                $final_data[$formatted_date]['confirmed'][$value[0]] = $value[3]!=0 ? $value[3] : 0 ;
                $final_data[$formatted_date]['death'][$value[0]] = $value[4]!=0 ? $value[4] : 0 ;
                $final_data[$formatted_date]['recover'][$value[0]] = $value[5]!=0 ? $value[5] : 0 ;
                
            
    	}
    }


foreach ($final_data as $date => $row) {
    $d = explode('-', $date);
    $prev_date = date('m-d-Y', strtotime($d[2].'-'.$d[0].'-'.$d[1].' -1 day'));
    $final_data[$date]['confirmed_sum'] = array_sum($row['confirmed']);
    $final_data[$date]['death_sum'] = array_sum($row['death']);
    $final_data[$date]['recover_sum'] = array_sum($row['recover']);
    if (array_key_exists($prev_date,$final_data) && array_sum($row['confirmed']) == 0)  { 
        $final_data[$date]['confirmed_sum'] = $final_data[$prev_date]['confirmed_sum'] ;
    }
    if (array_key_exists($prev_date,$final_data) && array_sum($row['death']) == 0)  { 
        $final_data[$date]['death_sum'] = $final_data[$prev_date]['death_sum'] ;
    }
    if (array_key_exists($prev_date,$final_data) && array_sum($row['recover']) == 0)  { 
        $final_data[$date]['recover_sum'] = $final_data[$prev_date]['recover_sum'] ;
    }
}


$confirmed_data_str ='';
$death_data_str ='';
$recovered_data_str ='';
foreach ($final_data as $date => $row) {
    $confirmed_data_str.= "'".$final_data[$date]['confirmed_sum']."', "; 
    $death_data_str.= "'".$final_data[$date]['death_sum']."', "; 
    $recovered_data_str.= "'".$final_data[$date]['recover_sum']."', "; 
}

$confirmed_data_array = array_column($final_data, 'confirmed_sum');
$death_data_array = array_column($final_data, 'death_sum');
$recovered_data_array = array_column($final_data, 'recover_sum');

//----------------regression --------//
$reg_confirm = array();
$reg_death = array();
$reg_recover = array();
foreach ($confirmed_data_array as $key => $value) {
    $reg_confirm[] = array($key,$value);
}
foreach ($death_data_array as $key => $value) {
    $reg_death[] = array($key,$value);
}
foreach ($recovered_data_array as $key => $value) {
    $reg_recover[] = array($key,$value);
}

//y = Ar^x, retunr A, r
$eqt_confirm  = exponentialRegression($reg_confirm);
$last_key = array_key_last ( $reg_confirm );

for ($i=1; $i < 10; $i++) { 
    $reg_confirm[$last_key+$i] = array($last_key+$i, (int)($eqt_confirm[0] * pow($eqt_confirm[1], ($last_key+$i))));
}

foreach ($final_data as $date => $row) {
    $confirmed_data_str.= "'".$final_data[$date]['confirmed_sum']."', "; 
    $death_data_str.= "'".$final_data[$date]['death_sum']."', "; 
    $recovered_data_str.= "'".$final_data[$date]['recover_sum']."', "; 
}
//----------------regression --------//





$first_confirmed = key(array_filter($confirmed_data_array)); 
$first_death = key(array_filter($death_data_array)); 
$first_recover = key(array_filter($recovered_data_array)); 

$labels_str = substr($labels_str, 0, -2);
$confirmed_data_str = substr($confirmed_data_str, 0, -2);
$death_data_str = substr($death_data_str, 0, -2);
$recovered_data_str = substr($recovered_data_str, 0, -2);


$dataJsStr='labels: [ '.$labels_str.' ],
            datasets: [{
                label: "Confirmed Cases",
                backgroundColor: \'blue\',
                borderColor: \'blue\',
                data: [  '.$confirmed_data_str.' ],
                fill: false,
            },
            {
                label: "Death",
                backgroundColor: \'red\',
                borderColor: \'red\',
                data: [  '.$death_data_str.' ],
                fill: false,
            },
            {
                label: "Recovered",
                backgroundColor: \'green\',
                borderColor: \'green\',
                data: [  '.$recovered_data_str.' ],
                fill: false,
            }
            ]
        ';
$optionJsStr = "    responsive: true,
                    maintainAspectRatio: true,
                    aspectRatio: 2,
					legend: {
						position: 'top',
					},
					title: {
						display: true,
						text: 'COVID 19 Statisticks in ".$country."'
					}";    
$str = chart('myChart','line',$dataJsStr,$optionJsStr);  
//$str = '-';






print  '
<div class="row">
<div class="col-md-3">
<div class="card">
  <img src="'.$country_data[0]['flag'].'" class="card-img-top" alt="'.$country.'" srcset="'.$country_data[0]['flag'].'" border="1">
  <div class="card-body">
    <h5 class="card-title">'.$country.'</h5>
    <p class="card-text">Country Code: '.$country_data[0]['alpha2Code'].'</p>
    <p class="card-text">Region: '.$country_data[0]['region'].'</p>
    <p class="card-text">First Confirmed Date: '.$first_confirmed.'</p>
    <p class="card-text">First Death Date: '.$first_death.'</p>
    <p class="card-text">First Recovery Date: '.$first_recover.'</p>
  </div>
 
</div>
</div>
<div class="col-md-9">
'.main_collapse_box('date_wise_report',"Statisticks for ". $country, $str, 'primary',true).'
</div>
</div><hr>';

$latest_confirmed = array_filter($confirmed_data_array);
if(!empty($latest_confirmed))$latest_confirmed = end($latest_confirmed);else $latest_confirmed =0;
$latest_death =  array_filter($death_data_array);
if(!empty($latest_death))$latest_death = end($latest_death);else $latest_death =0;
$latest_recover = array_filter($recovered_data_array);
if(!empty($latest_recover))$latest_recover = end($latest_recover);else $latest_recover =0;


print '
<div class="row">
<div class="col-md-4">'.general_card('Confirmed', 'text-white bg-primary',  $latest_confirmed, 'Confirmed').'</div>
<div class="col-md-4">'.general_card('Deaths', 'text-white bg-danger',  $latest_death, 'Deaths').'</div>
<div class="col-md-4">'.general_card('Recovered', 'text-white bg-success', $latest_recover,  'Recovered').'</div>
</div>
';

print '
<script type="text/javascript">

    $(document).ready(function() {
        document.title = "'.$country. ' - '.APP_SUBTITLE.' ";
    });

</script>
';

include('footer.php');
?>