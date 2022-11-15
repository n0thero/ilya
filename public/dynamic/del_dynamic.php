<?
include_once __DIR__ . "/common_functions.php";

header('Content-Type: application/json');

$file_name = __DIR__ . "/../../database/dynamic/name.json";

$file_data = rtrim(file_get_contents($file_name));

if (empty($file_data)) {
  $file_data = '[]';
}

$people = json_decode($file_data, true);

$filtered_people = array_filter($people,
  function ($people_to_filter) {
    return intval($people_to_filter['hash']) !== intval($_POST['hash']);
  });

$file = fopen($file_name, 'w');
fwrite($file, json_encode($filtered_people, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
fclose($file);


echo json_encode(['status' => 'success']);