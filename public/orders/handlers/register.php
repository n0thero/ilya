<?
include_once __DIR__ . "/common_functions.php";
include_once __DIR__ . "/save_new_keycard.php";

header('Content-Type: application/json');

$users_file_name = __DIR__ . '/../../../database/orders/users.json';

$users_file_data = file_get_contents($users_file_name);

$users = json_decode($users_file_data, true);

$filtered_user_by_login = array_filter(
  $users,
  function ($user_to_filter) {
    return $user_to_filter['login'] === $_REQUEST['login'];
  }
);

if (!empty($filtered_user_by_login)) {

  $result = [
    'status' => 'failed',
    'message' => 'Пользователь с таким логином уже существует'
  ];

  $response_string = json_encode($result, JSON_UNESCAPED_UNICODE);

  echo $response_string;
  return;
}

function saveNewUser($firstname, $login, $password)
{

  $file_name = __DIR__ . '/../../../database/orders/users.json';

  $file_data = rtrim(file_get_contents($file_name));

  if (empty($file_data)) {
    $file_data = '[]';
  }

  $file_data_converted = json_decode($file_data, true);

  $result_to_save = array_merge(
    $file_data_converted, [
    [
      'name' => $firstname,
      'login' => $login,
      'password' => $password,
      'is_admin' => false
    ]
  ]);

  $file = fopen($file_name, 'w');
  fwrite($file, json_encode($result_to_save, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
  fclose($file);
}

saveNewUser($_REQUEST['firstname'], $_REQUEST['login'], $_REQUEST['password']);

$random_key = rand(10000, 999999);

saveNewKeyCard($_REQUEST['login'], $random_key);

setcookie(
  'unique_key',
  $random_key,
  time() + (60 * 60 * 24 * 7),
  '/');


$result = [
  'status' => 'success',
  'message' => 'Вижу у тебя все получилось, сталкер.'
];

$response_string = json_encode($result, JSON_UNESCAPED_UNICODE);

echo $response_string;


//foreach ($users as $user) {
//
//  $name_is_same = $user['firstname'] === $_REQUEST['firstname'];
//
//  $login_is_same = $user['login'] === $_REQUEST['login'];
//
//  $password_is_same = $user['password'] === $_REQUEST['password'];
//
//  if ($name_is_same && $login_is_same && $password_is_same) {
//
//    $random_key = rand(10000, 999999);
//
//    saveNewKeyCard($user['login'], $random_key);
//
//    setcookie(
//      'unique_key',
//      $random_key,
//    time() + (60 * 60 * 24 * 7),
//      '/');
//
//    $result = [
//      'status' => 'success',
//      'message' => 'Привет ' . $_REQUEST['firstname'] . ' Твой пароль - это ' . $_REQUEST['password']
//    ];
//
//    $responce_string = json_encode($result, JSON_UNESCAPED_UNICODE);
//
//    echo $responce_string;
//
//    die;
//  }
//}

/*echo json_encode([
  'status' => 'failed',
  'message' => 'Пользователь с таким логином уже существует'
], JSON_UNESCAPED_UNICODE);
*/