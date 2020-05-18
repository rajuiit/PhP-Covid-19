

<?php

$url = 'https://www.worldometers.info/coronavirus/';
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, $url); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
$output = curl_exec($ch); 
curl_close($ch);
$output = preg_replace('/.*(<div id="main_table_countries_today"[^>]+>)/msi','$1',$output);
$output = preg_replace('/<hr.>.*/msi','',$output);
echo $output;





?>