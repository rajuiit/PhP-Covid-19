<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([

          ['Activities', 'Today'],
          
            <?php 
 $query = "";

 $exec = mysqli_query($connection,$query);



 while($row = mysqli_fetch_array($exec)){

$remove[] = "'";
$remove[] = '"';
$remove[] = "-"; // just as another example

$FileName = str_replace( $remove, "", $row['entity']);
echo "['".$FileName."',".$row['total_cases'].",".$row['total_cases'].", ],";
 }
 ?>
         ]);

        var options = {
          title: 'Corona Virus Daily Activities',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
  </body>
</html>