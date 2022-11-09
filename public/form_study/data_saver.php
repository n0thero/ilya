<?
include_once __DIR__ . "/common_functions.php";

$file_name = __DIR__ . "/orders.json";

$file = fopen($file_name, 'w');
fwrite($file, $_POST['data_to_save']);
fclose($file);
