<?
include_once __DIR__ . "/common_functions.php";

$file_name = __DIR__ . '/../../database/dynamic/name.json';

$file_data_converted = getDataFromJson($file_name);

$random_hash = rand(0, 9999);

while (in_array($random_hash, array_column($file_data_converted , 'hash'))) {
  $random_hash = rand(0, 9999);
}

$result_to_save = array_merge(
  $file_data_converted, [
  [
    'name' => $_POST['name'],
    'special' => $_POST['special'],
    'hash' => $random_hash
  ]
]);

saveDataToJson($file_name, $result_to_save);

response(['status' => 'success',
  'hash' => $random_hash]);

