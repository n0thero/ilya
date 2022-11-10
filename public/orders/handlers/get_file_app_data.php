<?
$file_name = __DIR__ . "/../../../database/orders/orders.json";

$file_data = rtrim(file_get_contents($file_name));

$orders = !empty($file_data)
? json_decode($file_data, true)
: [];

header('Content-Type: application/json');
return json_encode($orders);