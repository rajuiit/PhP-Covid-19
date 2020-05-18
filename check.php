
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<?php
$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, "https://www.worldometers.info/coronavirus/");

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$output = curl_exec($curl);

curl_close($curl);

$start_point = strpos($output, 'Report coronavirus cases');

$end_point = strpos($output,'', $start_point);

$length = $end_point-$start_point;

$output = substr($output, $start_point, $length);

echo $output;
?>