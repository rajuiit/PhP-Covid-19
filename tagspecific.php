
<?php
$html = file_get_contents('http://www.area-codes.com/exchange/exchange.asp?npa=229&nxx=428');
$table = null;
$needle = 'AreaCode/Prefix 229-428 Details';
foreach($html->find('h3') as $marker) {
    if($marker->innertext == $needle) {
        $table = $marker->next_sibling();
        break;
    }
}

$data = array();
if($table) {
    foreach($table->children() as $k => $tr) {
        foreach($tr->children as $td) {
            $data[$k][] = $td->innertext;
        }
    }
}

echo '<pre>';
print_r($data);

?>