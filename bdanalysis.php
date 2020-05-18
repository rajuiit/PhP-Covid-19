<html>
<head>
<title>Corona Update for Bangladesh</title>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="style.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

<script type="text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.0.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <script src="data.js"></script>

  <script src="https://awesome-table.com/AwesomeTableInclude.js"></script>

<link rel="stylesheet" type="text/css" href="jquery-jvectormap-2.0.5.css">
  <script src="jquery-jvectormap-2.0.5.min.js"></script>
    <script src="world.js"></script>
  


  <style type="text/css">
  .hide-embed {
    position: relative;
    width: 100%;
    min-height: 40px;
    background-color: #fff;
    bottom: 40px;
     }
    </style>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    
</head>



<body>

<div class="container">

<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
  <a class="navbar-brand" href="#">COVID-19</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
      <li class="nav-item">
        <a class="nav-link" href="index.php" tabindex="-1" aria-disabled="true">World</a>
      </li>


      <li class="nav-item">
        <a class="nav-link" href="index_final.php">Bangladesh<span class="sr-only">(current)</span></a>
      </li>
    <!--   <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->


      <li class="nav-item">
        <a class="nav-link" href="bdanalysis.php" tabindex="-1" aria-disabled="true">BD Analysis</a>
      </li>    


      <li class="nav-item">
        <a class="nav-link" href="analysis.php" tabindex="-1" aria-disabled="true">World Analysis</a>
      </li>

    </ul>
   
  </div>
</nav>





<!-- <div class="row">

<div class="col-xs-12 col-sm-12 col-lg-12" style="display: flex; flex-direction: column;">
<div style="text-align: center">
<div data-type="AwesomeTableView" data-filters="" data-viewID="-M5Jdg2PsV02VVkpZ9EZ"></div>
</div>
</div>
</div> -->



<h2>COVID-19: Analysis of Bangladesh (DATA SOURCE: IEDCR, DGHS) <a href="analysis.php" target="_blank">See World Analysis</a></h2> 


<?php
require "config.php";// Database connection
if($stmt = $connection->query("SELECT * FROM corona_final")){

$php_data_array_sum = Array(); // create PHP array
 
while ($row = $stmt->fetch_row()) {
   
   $php_data_array_sum[] = $row; // Adding to array
   }

}else{
echo $connection->error;
}
//print_r( $php_data_array);
// You can display the json_encode output here. 


// Transfor PHP array to JavaScript two dimensional array 
echo "<script>
        var my_2d_sum = ".json_encode($php_data_array_sum)."
</script>";
?>

<div class="row">
<div class="col-xs-12 col-sm-12 col-lg-12">
<div style="text-align: center">
<div id="curve_chart"></div>
</div>
</div>
</div>






<div class="row">
<div class="col-xs-12 col-sm-12 col-lg-12">
<div style="text-align: center">
<div id="curve_chart_daily"></div>
</div>
</div>
</div>



<br><br>


<?php
if($stmt = $connection->query("SELECT * FROM corona_final")){

$php_data_array_daily = Array(); // create PHP array
 
while ($row = $stmt->fetch_row()) {
   
   $php_data_array_sum_daily[] = $row; // Adding to array
   }
echo "</table>";
}else{
echo $connection->error;
}
//print_r( $php_data_array);
// You can display the json_encode output here. 


// Transfor PHP array to JavaScript two dimensional array 
echo "<script>
        var my_2d_daily = ".json_encode($php_data_array_sum_daily)."
</script>";
?>


<script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {packages: ['corechart']});
      google.charts.setOnLoadCallback(drawChart);
    
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        
    data.addColumn('string', 'Date');
    data.addColumn('number', 'Daily Cases');
    data.addColumn('number', 'Daily Deaths');
    data.addColumn('number', 'Daily Recover');

   
    for(i = 0; i < my_2d_daily.length; i++)
    data.addRow([my_2d_daily[i][12], parseInt(my_2d_daily[i][2]),parseInt(my_2d_daily[i][4]),parseInt(my_2d_daily[i][6])]);


       var options = {
          title: 'Daily Cases, Affected, Recovered',
        curveType: 'function',
        height: 500,
        pointSize: 4,
        legend: { position: 'top' }
        };
        var chart = new google.visualization.LineChart(document.getElementById('curve_chart_daily'));
        chart.draw(data, options);
       }
  ///////////////////////////////
</script>


<div class="row">
<div class="col-xs-12 col-sm-12 col-lg-12">
<div style="text-align: center">
<div id="curve_chart_test_daily"></div>
</div>
</div>
</div>




<script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {packages: ['corechart']});
      google.charts.setOnLoadCallback(drawSumChart);
    
      function drawSumChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        
    data.addColumn('string', 'Date');
    data.addColumn('number', 'Total Cases');
    data.addColumn('number', 'Total Deaths');
    data.addColumn('number', 'Total Recover');

   
    for(i = 0; i < my_2d_sum.length; i++)
    data.addRow([my_2d_sum[i][12], parseInt(my_2d_sum[i][1]),parseInt(my_2d_sum[i][3]),parseInt(my_2d_sum[i][5])]);


       var options = {
        title: 'Total Cases, Affected, Recovered',
        curveType: 'function',
        
        height: 500,
        pointSize: 4,
        legend: { position: 'top' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
        chart.draw(data, options);
       }
  ///////////////////////////////
</script>

<?php

if($stmt = $connection->query("SELECT * FROM corona_final")){

$php_data_array_test = Array(); // create PHP array
 
while ($row = $stmt->fetch_row()) {
   
   $php_data_array_test[] = $row; // Adding to array
   }

}else{
echo $connection->error;
}
//print_r( $php_data_array);
// You can display the json_encode output here. 


// Transfor PHP array to JavaScript two dimensional array 
echo "<script>
        var my_2d_test = ".json_encode($php_data_array_test)."
</script>";
?>


<script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {packages: ['corechart']});
      google.charts.setOnLoadCallback(drawChart);
    
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        
    data.addColumn('string', 'Date');
    data.addColumn('number', 'Daily Test');
    data.addColumn('number', 'Daily Cases');
    


   
    for(i = 0; i < my_2d_test.length; i++)
    data.addRow([my_2d_test[i][12], parseInt(my_2d_test[i][11]),parseInt(my_2d_test[i][2])]);


       var options = {
          title: 'Daily Cases and Test',
        curveType: 'function',
      
        height: 500,
        pointSize: 4,
        legend: { position: 'top' }
        };





        var chart = new google.visualization.LineChart(document.getElementById('curve_chart_test_daily'));
        chart.draw(data, options);
       }
  ///////////////////////////////
</script>


<?php
if($stmt = $connection->query("SELECT * FROM quarantine_final")){

$php_data_array_sum_qua = Array(); // create PHP array
 
while ($row = $stmt->fetch_row()) {
   
   $php_data_array_sum_qua[] = $row; // Adding to array
   }
echo "</table>";
}else{
echo $connection->error;
}
//print_r( $php_data_array);
// You can display the json_encode output here. 


// Transfor PHP array to JavaScript two dimensional array 
echo "<script>
        var my_2d_qua = ".json_encode($php_data_array_sum_qua)."
</script>";
?>

<div class="row">
<div class="col-xs-12 col-sm-12 col-lg-12">
<div style="text-align: center">
<div id="curve_chart_qua"></div>
</div>
</div>
</div>

<div class="row">
<div class="col-xs-12 col-sm-12 col-lg-12">
<div style="text-align: center">
<div id="curve_chart_iso"></div>
</div>
</div>
</div>


<script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {packages: ['corechart']});
      google.charts.setOnLoadCallback(drawChart);
    
      function drawChart() {

        // Create the data table.
    var data = new google.visualization.DataTable();
        
    data.addColumn('string', 'Date');
    data.addColumn('number', 'Total Quarantine');
    data.addColumn('number', 'Active Quarantine');
    data.addColumn('number', 'Total Recover from Quarantine');

   
    for(i = 0; i < my_2d_qua.length; i++)
    data.addRow([my_2d_qua[i][11], parseInt(my_2d_qua[i][1]),parseInt(my_2d_qua[i][5]),parseInt(my_2d_qua[i][4])]);


       var options = {
          title: 'Comparison of Quarantine',
        curveType: 'function',
        height: 500,
        pointSize: 4,
        legend: { position: 'top' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart_qua'));
        chart.draw(data, options);
       }
  ///////////////////////////////
</script>




<?php
if($stmt = $connection->query("SELECT * FROM quarantine_final")){

$php_data_array_sum_iso = Array(); // create PHP array
 
while ($row = $stmt->fetch_row()) {
   
   $php_data_array_sum_iso[] = $row; // Adding to array
   }
echo "</table>";
}else{
echo $connection->error;
}
//print_r( $php_data_array);
// You can display the json_encode output here. 


// Transfor PHP array to JavaScript two dimensional array 
echo "<script>
        var my_2d_iso= ".json_encode($php_data_array_sum_iso)."
</script>";
?>

<script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {packages: ['corechart']});
      google.charts.setOnLoadCallback(drawChart);
    
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        
    data.addColumn('string', 'Date');
    data.addColumn('number', 'Total Isolation');
    data.addColumn('number', 'Active Isolation');
    data.addColumn('number', 'New Isolation');

   
    for(i = 0; i < my_2d_iso.length; i++)
    data.addRow([my_2d_iso[i][11], parseInt(my_2d_iso[i][6]),parseInt(my_2d_iso[i][10]),parseInt(my_2d_iso[i][7])]);


       var options = {
          title: 'Comparison of Isolation',
        curveType: 'function',
        height: 500,
        pointSize: 4,
        legend: { position: 'top' }
        };





        var chart = new google.visualization.LineChart(document.getElementById('curve_chart_iso'));
        chart.draw(data, options);
       }
  ///////////////////////////////
</script>


    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['District', 'Total Cases'],
          <?php 
 $query = "SELECT district,cases FROM district";

 $exec = mysqli_query($connection,$query);
while($row1 = mysqli_fetch_array($exec)){
echo "['". $row1['district']."',".$row1['cases'].",],";
 }
 ?>
        ]);

        var options = {
          title: 'District Wise Total Cases',
          legend: 'none',
          pieSliceText: 'label',
          
          slices: {  4: {offset: 0.2},
                    12: {offset: 0.3},
                    14: {offset: 0.4},
                    15: {offset: 0.5},
          },
        };

        var chart = new google.visualization.PieChart(document.getElementById('district1'));
        chart.draw(data, options);
      }
    </script>

<div class="row">
<div class="col-xs-12 col-sm-12 col-lg-12">
<div style="text-align: center">
 <div id="district1" style="height: 500px;"></div>
</div>
</div>
</div>





</div>
  <?php include('footer.php');?>
</body></html>







