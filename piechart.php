
<html>
<head>
<title>Corona Update for Bangladesh</title>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

</head>
<body >

  <div class="container">

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="#">Features</a>
      <a class="nav-item nav-link" href="#">Graph Summary</a>
      
    </div>
  </div>

</nav>

<br>
<br>




<div class="row">

  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Coronavirus Cases:</h5>
        <p class="card-text">Total Affected: 33</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Deaths:</h5>
        <p class="card-text">Total Deaths: 2</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>

   <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Recovered:</h5>
        <p class="card-text">Total Recovered: 5</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>


</div>

<br>
<br>

<div class="row">
 <div class="col-sm-6">
<div class="card">
  <div class="card-header">
    ACTIVE CASES
  </div>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
</div>

<div class="col-sm-6">
<div class="card">
  <div class="card-header">
    CLOSED CASES
  </div>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
</div>


</div>




<h1>Confirmed Cases and Deaths by Local Area, Thana, or District</h1>

<p>The coronavirus COVID-19 is affecting 193 countries and territories around the world and 1 international conveyance (the Diamond Princess cruise ship harbored in Yokohama, Japan). The day is reset after midnight GMT+0. In the following result, you will get total summary of Corona Virus in Bangladesh</p>

<?Php
require "config.php";// Database connection



 $query = "SELECT * FROM total_confirmed_worldwide where id in (SELECT MAX(id)
    FROM total_confirmed_worldwide
    GROUP BY code)";
$php_data_array1=Array();
 $exec = mysqli_query($connection,$query);



 while($row = mysqli_fetch_array($exec)){

$remove[] = "'";
$remove[] = '"';
$remove[] = "-"; // just as another example

$row = str_replace( $remove, "", $row);

$php_data_array1[] = $row;

 }
 




if($stmt = $connection->query("SELECT month,sale,profit FROM chart_data_column")){

  echo "No of records : ".$stmt->num_rows."<br>";
$php_data_array = Array(); // create PHP array



echo '<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Month</th>
                <th>Sale</th>
                <th>Profit</th>
                
            </tr>
        </thead>
        <tbody>';

        while ($row = $stmt->fetch_row()) {
           echo "<tr>
                <td>$row[0]</td>
                <td>$row[1]</td>
                <td>$row[2]</td>
               
            </tr>";
             $php_data_array[] = $row;
   
     }
            

           echo' </tbody>
        <tfoot>
            <tr>
                <th>Month</th>
                <th>Sale</th>
                <th>Profit</th>

            </tr>
        </tfoot>
    </table>';
}else{
echo $connection->error;
}

  
//print_r( $php_data_array);
// You can display the json_encode output here. 
//echo json_encode($php_data_array); 

// Transfor PHP array to JavaScript two dimensional array 
echo "<script>
        var my_2d = ".json_encode($php_data_array)."
        var my_2d1 = ".json_encode($php_data_array1)."


$(document).ready(function() {
    $('#example').DataTable();
} );

</script>";
?>

<div class="row">

<div class="col-sm-6">
<div class="card">
  <h5 class="card-header">Total Cases by Months</h5>
  <div class="card-body">
    <p class="card-text"><div id="curve_chart_total_case"></div></p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
</div>

<div class="col-sm-6">
<div class="card">
  <h5 class="card-header">Total Deaths by Months</h5>
  <div class="card-body">
    <p class="card-text"><div id="curve_chart_total_death"></div></p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
</div>

</div>











<br><br>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>




<script type="text/javascript">


      // Load the Visualization API and the corechart package.
      google.charts.load('current', {packages: ['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(drawChartdeath);
    
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Month');
        data.addColumn('number', 'Sale');
        data.addColumn('number', 'Profit');
       
    
       for(i = 0; i < my_2d.length; i++)
       data.addRow([my_2d[i][0],parseInt(my_2d[i][1]), parseInt(my_2d[i][2])]);
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
        data.addColumn('string','Date');

       for(i = 0; i < my_2d1.length; i++)
       data.addRow([my_2d1[i][3], parseInt(my_2d1[i][4])]);

       var options = {
          title: '',
          curveType: 'function',
          width: 600,
          height: 400,
          pointSize: 2,
          legend: { position: 'bottom' },
          
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart_total_death'));
        chart.draw(data, options);
       }






       

  ///////////////////////////////
</script>
</div>
</body></html>







