<?
include_once __DIR__ . "/common_functions.php";

header('Content-Type: application/json');

if ($_POST['age'] < 18) {
  $blockage = [
    'status' => 'failed',
    'alarm' => 'ALARM! ALARM! LOLI! LOLI!'
  ];
  echo json_encode($blockage);
  return;
}

$file_name = __DIR__ . '/project_data.json';

$file_data = rtrim(file_get_contents($file_name));

if (empty($file_data)) {
  $file_data = '[]';
}

$file_data_converted = json_decode($file_data, true);

$result_to_save = array_merge(
  $file_data_converted, [
  [
    'text' => $_POST['message'],
    'age' => $_POST['age'],
    'info' => $_POST['info']
  ]
]);

$file = fopen($file_name, 'w');
fwrite($file, json_encode($result_to_save, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
fclose($file);

echo json_encode(['status' => 'success']);


