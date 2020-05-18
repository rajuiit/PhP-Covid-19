<?Php
require "config.php";// Database connection

?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {
        'packages':['geochart'],
        // Note: you will need to get a mapsApiKey for your project.
        // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
        'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
      });
      google.charts.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {

        var data = google.visualization.arrayToDataTable([
          ['Country', 'Total Cases', 'Total Deaths'],
  <?php 
 $query = "SELECT id, entity,code, total_cases FROM total_confirmed_worldwide where id in (SELECT MAX(id)
    FROM total_confirmed_worldwide
    GROUP BY code)";

 $exec = mysqli_query($connection,$query);



 while($row = mysqli_fetch_array($exec)){

$remove[] = "'";
$remove[] = '"';
$remove[] = "-"; // just as another example

$FileName = str_replace( $remove, "", $row['entity']);
echo "['".$FileName."',".$row['total_cases'].",".$row['total_cases'].", ],";
 }
 ?>]);

        var options = {colorAxis: {colors: ['#00853f', '#e31b23', '#e7711c','green', 'blue', 'red']}};

        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="regions_div" style="width: 900px; height: 500px;"></div>
  </body>
</html>
