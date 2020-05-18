
<html>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>


<?php  

// create a new cURL resource
$ch = curl_init();
// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, "https://www.worldometers.info/coronavirus/");
curl_setopt($ch, CURLOPT_HEADER, 0);
// grab URL and pass it to the browser
$output = curl_exec($ch);

// close cURL resource, and free up system resources
curl_close($ch);

 ?> 


</html>