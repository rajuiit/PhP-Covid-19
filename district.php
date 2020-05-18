
<?Php
require "config.php";// Database connection

?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['District', 'Total Cases'],
          <?php 
 $query = "SELECT district,cases FROM district";

 $exec = mysqli_query($connection,$query);
while($row = mysqli_fetch_array($exec)){
echo "['". $row['district']."',".$row['cases'].", ],";
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

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 1200px; height: 700px;"></div>
  </body>
</html>