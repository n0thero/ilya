<?
include_once __DIR__ . "/common_functions.php";

header('Content-Type: application/json');

$file_name = __DIR__ . '/../../database/dynamic/name.json';

$file_data = rtrim(file_get_contents($file_name));

if (empty($file_data)) {
    $file_data = '[]';
}

$file_data_converted = json_decode($file_data, true);

$result_to_save = array_merge(
    $file_data_converted, [
    [
        'name' => $_POST['name'],
        'sex' => $_POST['sex'],
        'hash' => $_POST['hash']
    ]
]);

$file = fopen($file_name, 'w');
fwrite($file, json_encode($result_to_save, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
fclose($file);

echo json_encode(['status' => 'success']);
