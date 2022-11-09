<?
include_once __DIR__ . "/common_functions.php";

header('Content-Type: application/json');

$file_name = __DIR__ . "/../../../database/orders/orders.json";

$file_data = rtrim(file_get_contents($file_name));

if (empty($file_data)) {
  $file_data = '[]';
}

$file_data_converted = json_decode($file_data, true);

$result_to_save = array_merge(
  $file_data_converted, [
    [
      'hash' => $_POST['hash'],
      'time_order' => $_POST['time_order'],
      'name_user' => $_POST['name_user'],
      'idea' => $_POST['idea']
    ]
  ]);

$file = fopen($file_name, 'w');
fwrite($file, json_encode($result_to_save), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
fclose($file);
