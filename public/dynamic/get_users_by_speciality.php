<?
include_once __DIR__ . "/common_functions.php";

$specialists = getDataFromJson(__DIR__ . '/../../database/dynamic/name.json');

$filtered_users = array_filter($specialists, function ($user) {
    return $user['special'] === $_GET['special'];
});

$filtered_users = array_values($filtered_users);

response([
    'status' => 'success',
    'result' => $filtered_users
]);
