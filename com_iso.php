
<html>
<head>
<title>plus2net.com : Pie chart using data from MySQL table</title>
</head>
<body >
<?Php
require "config.php";

if($stmt = $connection->query("SELECT * FROM quarantine_final")){

  echo "No of records : ".$stmt->num_rows."<br>";
$php_data_array_sum = Array(); // create PHP array
 
while ($row = $stmt->fetch_row()) {
   
   $php_data_array_sum[] = $row; // Adding to array
   }
echo "</table>";
}else{
echo $connection->error;
}
//print_r( $php_data_array);
// You can display the json_encode output here. 


// Transfor PHP array to JavaScript two dimensional array 
echo "<script>
        var my_2d = ".json_encode($php_data_array_sum)."
</script>";
?>


<div id="curve_chart"></div>
<br><br>
<a href=https://www.plus2net.com/php_tutorial/chart-line-database.php>Column Chart from MySQL database</a>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
    data.addColumn('number', 'Total Recover from Isolation');

   
    for(i = 0; i < my_2d.length; i++)
    data.addRow([my_2d[i][11], parseInt(my_2d[i][7]),parseInt(my_2d[i][10]),parseInt(my_2d[i][9])]);


       var options = {
          title: 'Comparison of Quarantine',
        curveType: 'function',
        width: 1300,
        height: 500,
        pointSize: 4,
        legend: { position: 'top' }
        };





        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
        chart.draw(data, options);
       }
  ///////////////////////////////
</script>
</body></html>







