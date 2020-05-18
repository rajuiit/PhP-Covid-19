<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>


<div class="container-fluid">

<?php
$html = file_get_contents('https://www.worldometers.info/coronavirus/'); //get the html returned from the following url
$dom = new DOMDocument();
libxml_use_internal_errors(TRUE); //disable libxml errors



if(!empty($html)){

$dom->loadHTML($html);

$element = $dom->getElementById('main_table_countries_today');

    // Get the HTML as a string
$string = $element->C14N();

echo $string;
}

?>

</div>