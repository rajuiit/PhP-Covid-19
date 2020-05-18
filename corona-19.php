
<html>
<head>
<title>Corona Update for Bangladesh</title>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="style.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

<script type="text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>

  <script src="data.js"></script>

</head>
<body >

  <div class="container">


<h2>COVID-19: Summary of Bangladesh (DATA SOURCE: IEDCR, DGHS)   <b>Sponsor: <a href="https://proconf.org" target="_blank"> PROCONF</a></b></h2> 
<br>


<?Php
require "config.php";// Database connection

 

$result = mysqli_query($connection,"SELECT max(total_affected) as total FROM corona");
$row1 = mysqli_fetch_array($result);


$result1 = mysqli_query($connection,"SELECT max(total_deaths) as total1 FROM corona");
$deaths = mysqli_fetch_array($result1);

$result2 = mysqli_query($connection,"SELECT max(total_recovered) as total2 FROM corona");
$recover = mysqli_fetch_array($result2);


$result3 = mysqli_query($connection,"SELECT max(total_qua) as total3 FROM quarantine");
$qua = mysqli_fetch_array($result3);



$result4 = mysqli_query($connection,"SELECT max(total_relea_qua) as total4 FROM quarantine");
$qua_release = mysqli_fetch_array($result4);



$result5 = mysqli_query($connection,"SELECT max(total_iso) as total5 FROM quarantine");
$iso = mysqli_fetch_array($result5);


$result6 = mysqli_query($connection,"SELECT max(total_releas_iso) as total6 FROM quarantine");
$iso_relea = mysqli_fetch_array($result6);


  ?>


              <section class="jumbotron text-center">

                <div class="container-fluid">
                  <div class="row">

                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-2 mb-2">
                      <div class="card bg-primary text-white shadow-lg rounded h-100">
                        <div class="card-body">
                          <h5 class="card-title">Total Cases</h5>
                          <p class="card-text">
                            <span class="btn btn-secondary"><?php echo $row1["total"]; ?> </span>
                          </p>
                        </div>
                        <!--<div class="card-footer">
                          <small>
                            Today's cases: 
                          </small>
                        </div>-->
                      </div>
                    </div>
                    <!-- ./col-12 ./col-sm-12 ./col-md-12 ./col-lg-12 ./col-xl-2 ./mb-2 -->

                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-2 mb-2">
                      <div class="card bg-danger text-white shadow-lg rounded h-100">

                        <div class="card-body">
                          <h5 class="card-title">Total Deaths</h5>
                          <p class="card-text">
                         <span class="btn btn-secondary"> <?php echo $deaths["total1"]; ?> </span>
                          </p>
                        </div>
                        <!--<div class="card-footer">
                          <small>
                            Today's deaths: <span id="today_deaths"></span>
                          </small>
                        </div>-->
                      </div>
                    </div>
                    
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-2 mb-2">
                      <div class="card bg-success text-white shadow-lg rounded h-100">
                        <div class="card-body">
                          <h5 class="card-title">Total Recovered</h5>
                          <p class="card-text">
                          <span class="btn btn-secondary"> <?php echo $recover["total2"]; ?> </span>
                          </p>
                        </div>
                        <!--<div class="card-footer">
                          <small>
                            Affected Countries: <span id="total_countries"></span>
                          </small>
                        </div>-->
                      </div>
                    </div>


                     <!-- ./col-12 ./col-sm-12 ./col-md-12 ./col-lg-12 ./col-xl-2 ./mb-2 -->
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-2 mb-2">
                      <div class="card bg-info text-white shadow-lg rounded h-100">
                        <div class="card-body">
                          <h5 class="card-title">Active Cases</h5>
                          <p class="card-text">
                            <span class="btn btn-secondary"><?php echo ($row1["total"]-($deaths["total1"]+$recover["total2"])); ?></span>
                          </p>
                        </div>
                        <!--<div class="card-footer">
                          <small>
                            Deaths / Million: <span id="total_deaths_per_million"></span>
                          </small>
                        </div>-->
                      </div>
                    </div>


                 <!-- ./col-12 ./col-sm-12 ./col-md-12 ./col-lg-12 ./col-xl-2 ./mb-2 -->
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-2 mb-2">
                      <div class="card bg-dark text-white shadow-lg rounded h-100">
                        <div class="card-body">
                          <h5 class="card-title">Closed Cases</h5>
                          <p class="card-text">
                            <span class="btn btn-secondary"><?php echo (($deaths["total1"]+$recover["total2"])); ?></span>
                          </p>
                        </div>
                       <!-- <div class="card-footer">
                          <small>
                            Deaths / Million: <span id="total_deaths_per_million"></span>
                          </small>
                        </div>-->
                      </div>
                    </div>
                    <!-- ./col-12 ./col-sm-12 ./col-md-12 ./col-lg-12 ./col-xl-2 ./mb-2 -->
                    <!-- ./col-12 ./col-sm-12 ./col-md-12 ./col-lg-12 ./col-xl-2 ./mb-2 -->
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-2 mb-2">
                      <div class="card bg-secondary text-white shadow-lg rounded h-100">
                        <div class="card-body">
                          <h5 class="card-title">Total Tests</h5>
                          <p class="card-text">
                            <span class="btn btn-secondary">Coming Soon</span>
                          </p>
                        </div>
                        <!--<div class="card-footer">
                          <small>
                            Tests per million: <span id="total_tests_per_million"></span>
                          </small>
                        </div>-->
                      </div>
                    </div>
                    <!-- ./col-12 ./col-sm-12 ./col-md-12 ./col-lg-12 ./col-xl-2 ./mb-2 -->
                  </div>
                  <!-- ./row -->



                  <div class="row">

                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-2 mb-2">
                      <div class="card bg-info text-white shadow-lg rounded h-100">
                        <div class="card-body">
                          <h5 class="card-title">Total Male</h5>
                          <p class="card-text">
                            <span class="btn btn-secondary">Coming Soon</span>
                          </p>
                        </div>
                        <!--<div class="card-footer">
                          <small>
                            Today's cases: 
                          </small>
                        </div>-->
                      </div>
                    </div>
                    <!-- ./col-12 ./col-sm-12 ./col-md-12 ./col-lg-12 ./col-xl-2 ./mb-2 -->

                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-2 mb-2">
                      <div class="card bg-info text-white shadow-lg rounded h-100">

                        <div class="card-body">
                          <h5 class="card-title">Total Female</h5>
                          <p class="card-text">
                         <span class="btn btn-secondary"> Coming Soon</span>
                          </p>
                        </div>
                        <!--<div class="card-footer">
                          <small>
                            Today's deaths: <span id="today_deaths"></span>
                          </small>
                        </div>-->
                      </div>
                    </div>
                    
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-2 mb-2">
                      <div class="card bg-info text-white shadow-lg rounded h-100">
                        <div class="card-body">
                          <h5 class="card-title">Total Quarantine</h5>
                          <p class="card-text">
                          <span class="btn btn-secondary"><?php echo $qua["total3"]; ?> </span>
                          </p>
                        </div>
                        <!--<div class="card-footer">
                          <small>
                            Affected Countries: <span id="total_countries"></span>
                          </small>
                        </div>-->
                      </div>
                    </div>


                     <!-- ./col-12 ./col-sm-12 ./col-md-12 ./col-lg-12 ./col-xl-2 ./mb-2 -->
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-2 mb-2">
                      <div class="card bg-info text-white shadow-lg rounded h-100">
                        <div class="card-body">
                          <h5 class="card-title">Recovered Quarantine</h5>
                          <p class="card-text">
                            <span class="btn btn-secondary"><?php echo $qua_release ["total4"]; ?></span>
                          </p>
                        </div>
                        <!--<div class="card-footer">
                          <small>
                            Deaths / Million: <span id="total_deaths_per_million"></span>
                          </small>
                        </div>-->
                      </div>
                    </div>


                 <!-- ./col-12 ./col-sm-12 ./col-md-12 ./col-lg-12 ./col-xl-2 ./mb-2 -->
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-2 mb-2">
                      <div class="card bg-info text-white shadow-lg rounded h-100">
                        <div class="card-body">
                          <h5 class="card-title">Total Isolation</h5>
                          <p class="card-text">
                            <span class="btn btn-secondary"><?php echo $iso["total5"]; ?></span>
                          </p>
                        </div>
                       <!-- <div class="card-footer">
                          <small>
                            Deaths / Million: <span id="total_deaths_per_million"></span>
                          </small>
                        </div>-->
                      </div>
                    </div>
                    <!-- ./col-12 ./col-sm-12 ./col-md-12 ./col-lg-12 ./col-xl-2 ./mb-2 -->
                    <!-- ./col-12 ./col-sm-12 ./col-md-12 ./col-lg-12 ./col-xl-2 ./mb-2 -->
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-2 mb-2">
                      <div class="card bg-info text-white shadow-lg rounded h-100">
                        <div class="card-body">
                          <h5 class="card-title">Recovered Isolation</h5>
                          <p class="card-text">
                            <span class="btn btn-secondary"><?php echo $iso_relea["total6"]; ?></span>
                          </p>
                        </div>
                        <!--<div class="card-footer">
                          <small>
                            Tests per million: <span id="total_tests_per_million"></span>
                          </small>
                        </div>-->
                      </div>
                    </div>
                    <!-- ./col-12 ./col-sm-12 ./col-md-12 ./col-lg-12 ./col-xl-2 ./mb-2 -->
                  </div>
                  <!-- ./row -->

                </div>
              </section>





<br>
<br>
<h4>Confirmed Cases and Deaths by IEDCR stands for Institute of Epidemiology, Disease Control and Research</h4>

<p>The coronavirus COVID-19 is affecting 193 countries and territories around the world and 1 international conveyance (the Diamond Princess cruise ship harbored in Yokohama, Japan). The day is reset after midnight GMT+0. In the following result, you will get total summary of Corona Virus in Bangladesh</p>

<?Php
require "config.php";// Database connection

if($stmt = $connection->query("SELECT * FROM corona")){

echo "No of records : ".$stmt->num_rows."<br>";
$php_data_array = Array(); // create PHP array



echo ' <div class="table-responsive"><table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Sl.</th>
                 <th>Date</th>
                <th>Total Affected</th>
                <th>New Affected</th>
                <th>Total Deaths</th>
                <th>New Deaths</th>
                <th>Total Recovered</th>
                <th>New Recovered</th>
                <th>Male</th>
                <th>Female</th>
                 <th>Active cases</th>
                
            </tr>
        </thead>
        <tbody>';

        while ($row = $stmt->fetch_row()) {
           echo "<tr>
                <td>$row[0]</td>
                <td>$row[10]</td>
                <td class='table-warning'>$row[1]</td>
                  <td>$row[2]</td>
                <td>$row[3]</td>
                <td class='table-danger'>+$row[4]</td>
                  <td>$row[5]</td>
                <td>$row[6]</td>
                <td>$row[7]</td>
                  <td>$row[8]</td>
                <td>$row[9]</td>  
            </tr>";
             $php_data_array1[] = $row;
   
     }
            

           echo' </tbody>
        <tfoot>
            <tr>
                

            </tr>
        </tfoot>
    </table></div>';
}else{
echo $connection->error;
}

if($stmt1 = $connection->query("SELECT * FROM corona order by date desc LIMIT 10")){

$php_data_array3 = Array(); // create PHP array
while ($r = $stmt1->fetch_row()) {

$php_data_array3[] = $r;
}
}



  ?>

  <br>
<br>
<h4>Confirmed Quarantine and Isolation by IEDCR stands for Institute of Epidemiology, Disease Control and Research</h4>

<p>The coronavirus COVID-19 is affecting 193 countries and territories around the world and 1 international conveyance (the Diamond Princess cruise ship harbored in Yokohama, Japan). The day is reset after midnight GMT+0. In the following result, you will get total summary of Corona Virus in Bangladesh</p>

  <?php


  if($stmt = $connection->query("SELECT * FROM quarantine")){

  echo "No of records : ".$stmt->num_rows."<br>";
$php_data_array = Array(); // create PHP array



echo ' <div class="table-responsive"><table id="example1" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Sl.</th>
                 <th>Date</th>
                <th>Total Quarantine</th>
                <th>New Quarantine</th>
                <th>New Release from Quarantine</th>
                <th>Total Release from Quarantine</th>
                <th>Total Isolation</th>
                <th>New Isolation</th>
                <th>New Release from Isolation</th>
                <th>Total Release from Isolation </th>
                
                
            </tr>
        </thead>
        <tbody>';

        while ($row = $stmt->fetch_row()) {
           echo "<tr>
                <td>$row[0]</td>
                <td>$row[9]</td>
                <td class='table-warning'>$row[1]</td>
                  <td>$row[2]</td>
                <td>$row[3]</td>
                <td>$row[4]</td>
                  <td>$row[5]</td>
                <td>$row[6]</td>
                <td>$row[7]</td>
                  <td>$row[8]</td>
                  
            </tr>";
             $php_data_array2[] = $row;
   
     }
            

           echo' </tbody>
        <tfoot>
            <tr>
                

            </tr>
        </tfoot>
    </table></div>';
}else{
echo $connection->error;
}

//print_r( $php_data_array);
// You can display the json_encode output here. 
//echo json_encode($php_data_array); 

// Transfor PHP array to JavaScript two dimensional array 
echo "<script>
        var my_2d = ".json_encode($php_data_array3)."
        var my_2d2 = ".json_encode($php_data_array2)."


$(document).ready(function() {
    $('#example').DataTable({'columnDefs': [ {
      'targets'  : 'no-sort',
      'orderable': false,
    }]});
} );

$(document).ready(function() {
    $('#example1').DataTable({'columnDefs': [ {
      'targets'  : 'no-sort',
      'orderable': false,
    }]});
} );




  
</script>";
?>



                  <div class="row">

                    <div class="col-sm-6">
                    <div class="card">
                     <h5 class="card-header">Total Cases by Date</h5>
                       <div class="card-body">
                        <p class="card-text"><div id="curve_chart_total_case"></div></p>

                         </div>
                     </div>
                    </div>
                    <!-- ./col-12 ./col-sm-12 ./col-md-12 ./col-lg-12 ./col-xl-2 ./mb-2 -->

                    <div class="col-sm-6">
                      <div class="card">
                        <h5 class="card-header">Total Deaths by Date</h5>
                        <div class="card-body">
                        <p class="card-text"><div id="curve_chart_total_death"></div></p>
   
                         </div>
                       </div>
                    </div>


               </div>

         
          
                    




<br><br>



<h2> World Summary Covid-19</h2>

      <section class="jumbotron text-center">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-2 mb-2">
                      <div class="card bg-info text-white shadow-lg rounded h-100">
                        <div class="card-body">
                          <h5 class="card-title">Total Cases</h5>
                          <p class="card-text">
                            <span id="total_cases"></span>
                          </p>
                        </div>
                        <div class="card-footer">
                          <small>
                            Today's cases: <span id="today_cases"></span>
                          </small>
                        </div>
                      </div>
                    </div>
                    <!-- ./col-12 ./col-sm-12 ./col-md-12 ./col-lg-12 ./col-xl-2 ./mb-2 -->
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-2 mb-2">
                      <div class="card bg-danger text-white shadow-lg rounded h-100">
                        <div class="card-body">
                          <h5 class="card-title">Total Deaths</h5>
                          <p class="card-text">
                            <span id="total_deaths"></span>
                            <small>
                              (<span id="total_deaths_percent"></span>%)
                            </small>
                          </p>
                        </div>
                        <div class="card-footer">
                          <small>
                            Today's deaths: <span id="today_deaths"></span>
                          </small>
                        </div>
                      </div>
                    </div>
                    <!-- ./col-12 ./col-sm-12 ./col-md-12 ./col-lg-12 ./col-xl-2 ./mb-2 -->
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-2 mb-2">
                      <div class="card bg-dark text-white shadow-lg rounded h-100">
                        <div class="card-body">
                          <h5 class="card-title">Cases / Million</h5>
                          <p class="card-text">
                            <span id="total_cases_per_million"></span>
                          </p>
                        </div>
                        <div class="card-footer">
                          <small>
                            Deaths / Million: <span id="total_deaths_per_million"></span>
                          </small>
                        </div>
                      </div>
                    </div>
                    <!-- ./col-12 ./col-sm-12 ./col-md-12 ./col-lg-12 ./col-xl-2 ./mb-2 -->
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-2 mb-2">
                      <div class="card bg-success text-white shadow-lg rounded h-100">
                        <div class="card-body">
                          <h5 class="card-title">Total Recovered</h5>
                          <p class="card-text">
                            <span id="total_recovered"></span>
                            <small>
                              (<span id="total_recovered_percent"></span>%)
                            </small>
                          </p>
                        </div>
                        <div class="card-footer">
                          <small>
                            Affected Countries: <span id="total_countries"></span>
                          </small>
                        </div>
                      </div>
                    </div>
                    <!-- ./col-12 ./col-sm-12 ./col-md-12 ./col-lg-12 ./col-xl-2 ./mb-2 -->
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-2 mb-2">
                      <div class="card bg-warning text-white shadow-lg rounded h-100">
                        <div class="card-body">
                          <h5 class="card-title">Active Cases</h5>
                          <p class="card-text">
                            <span id="total_active"></span>
                          </p>
                        </div>
                        <div class="card-footer">
                          <small>
                            Critical cases: <span id="total_critical"></span>
                          </small>
                        </div>
                      </div>
                    </div>
                    <!-- ./col-12 ./col-sm-12 ./col-md-12 ./col-lg-12 ./col-xl-2 ./mb-2 -->
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-2 mb-2">
                      <div class="card bg-secondary text-white shadow-lg rounded h-100">
                        <div class="card-body">
                          <h5 class="card-title">Total Tests</h5>
                          <p class="card-text">
                            <span id="total_tests"></span>
                          </p>
                        </div>
                        <div class="card-footer">
                          <small>
                            Tests per million: <span id="total_tests_per_million"></span>
                          </small>
                        </div>
                      </div>
                    </div>
                    <!-- ./col-12 ./col-sm-12 ./col-md-12 ./col-lg-12 ./col-xl-2 ./mb-2 -->
                  </div>
                  <!-- ./row -->


                </div>
              </section>




              <div class="row">
                <div class="col-md-12">

                  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h4>Worldwide COVID-19 All Data</h4>
                  </div>

                  <div class="table-responsive">
                    <table id="corona_country_table" class="table table-striped table-bordered table-sm">
                      <thead>
                        <tr>
                          <th class="no-sort">Flag</th>
                          <th>Country</th>
                          <th>Cases</th>
                          <th class="table-info">Today Cases</th>
                          <th>Cases / Million</th>
                          <th>Deaths</th>
                          <th class="table-danger">Today Deaths</th>
                          <th>Deaths / Million</th>
                          <th>Tests</th>
                          <th>Tests / Million</th>
                          <th>Recovered</th>
                          <th>Active</th>
                          <th>Critical</th>
                        </tr>
                      </thead>
                      <tbody id="corona_country_rows">
                      </tbody>
                    </table>
                  </div>
                  <!-- ./table-responsive -->
                </div>
                <!-- ./col-md-12 -->
              </div>




<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>




<script type="text/javascript">


      // Load the Visualization API and the corechart package.
      google.charts.load('current', {packages: ['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(drawChartdeath);
	  
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Dates');
        data.addColumn('number', 'Cases');
		   
		
        for(i = 0; i < my_2d.length; i++)
    data.addRow([my_2d[i][10], parseInt(my_2d[i][1])]);
  
       var options = {
          title: '',
          curveType: 'function',
		      width: 600,
          height: 400,
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart_total_case'));
        chart.draw(data, options);
       }



       function drawChartdeath() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Dates');
        data.addColumn('number', 'Deaths');
    
        for(i = 0; i < my_2d.length; i++)
    data.addRow([my_2d[i][10], parseInt(my_2d[i][3])]);
       var options = {
          title: '',
          curveType: 'function',
          width: 600,
          height: 400,
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart_total_death'));
        chart.draw(data, options);
       }



       function drawChartThana() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Month');
        data.addColumn('number', 'Cases');
       
    
        for(i = 0; i < my_2d.length; i++)
    data.addRow([my_2d[i][0], parseInt(my_2d[i][1])]);
       var options = {
          title: '',
          curveType: 'function',
          width: 600,
          height: 400,
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart_total_case'));
        chart.draw(data, options);
       }



       function drawChartdeathDistrict() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Month');
        data.addColumn('number', 'Deaths');
    
        for(i = 0; i < my_2d.length; i++)
    data.addRow([my_2d[i][0], parseInt(my_2d[i][1])]);
       var options = {
          title: '',
          curveType: 'function',
          width: 600,
          height: 400,
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart_total_death'));
        chart.draw(data, options);
       }


	///////////////////////////////
</script>
</div>
  <footer class="footer fixed-bottom py-1 bg-light border-top shadow-sm small">
      <div class="container-fluid">
        <div class="float-md-left">
          Data Source: <a target="_blank" href=""></a>
          <small class="text-muted">
            Updated at: <span class="updated_at"></span>
          </small>
        </div>
        <div class="float-md-right">
          Developed by
          <a target="_blank" href="https://sites.google.com/view/mdmahfujurrahman" title="Ahmedur Rahman Shovon">Md. Mahfujur Rahman</a>
          
        </div>
      </div>
    </footer>

</body></html>







