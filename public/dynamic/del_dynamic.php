<?
include_once __DIR__ . "/common_functions.php";

$file_name = __DIR__ . "/../../database/dynamic/name.json";

$people = getDataFromJson($file_name);

$filtered_people = array_filter($people,
  function ($people_to_filter) {
    return intval($people_to_filter['hash']) !== intval($_POST['hash']);
  });

saveDataToJson($file_name, $filtered_people);

response(['status' => 'success']);