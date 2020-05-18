
<?Php
require "config.php";// Database connection

?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["bar"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Date', 'Male', 'Female'],
          <?php 
 $query = "SELECT date, male, female FROM corona_final";

 $exec = mysqli_query($connection,$query);
while($row = mysqli_fetch_array($exec)){
echo "['".$row['date']."', '".$row['male']."',".$row['female'].", ],";
 }
 ?>
        ]);

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          },
          bars: 'verticle' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('piechart'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 1200px; height: 700px;"></div>
  </body>
</html>