<?
include_once __DIR__ . "/save_new_keycard.php";
include_once __DIR__ . "/common_functions.php";

header('Content-Type: application/json');

$users_file_name = __DIR__ . '/../../../database/orders/users.json';

$users_file_data = file_get_contents($users_file_name);

$users = json_decode($users_file_data, true);

foreach ($users as $user) {

//  $bool_login = $user['login'] === $_REQUEST['login'];
//  jlog($bool_login);

//  continue; // перейти к следующему элементу в foreach

  $login_is_same = $user['login'] === $_REQUEST['login']; 

  $password_is_same = $user['password'] === $_REQUEST['password'];

  if ($login_is_same && $password_is_same) {

    $random_key = rand(10000, 99999);

    saveNewKeyCard($user['login'], $random_key);
//    saveNewKeyCard($_REQUEST['login'], $random_key); // так как они равны, обе строки кода одинаковые

    setcookie(
      'unique_key',
      $random_key,
      time() + (60 * 60 * 24 * 7),
      '/');

    $result = [
      'status' => 'success',
      'message' => 'Привет ' . $_REQUEST['login'] . ' Твой пароль - это ' . $_REQUEST['password']
    ];

    $response_string = json_encode($result, JSON_UNESCAPED_UNICODE);

    echo $response_string;

    die;
  }
}

echo json_encode([
  'status' => 'failed',
  'message' => 'Пользователь не найден'
], JSON_UNESCAPED_UNICODE);
