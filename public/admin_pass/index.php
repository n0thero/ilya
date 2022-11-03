<?
ini_set('display_errors', true);
ini_set('error_reporting', E_ALL);

include __DIR__ . "/common_functions.php";
include __DIR__ . "/get_user_by_keycard.php";



if (!empty($_COOKIE['unique_key'])) {
  $current_user = get_user_by_keycard($_COOKIE['unique_key']);
} else {
  $current_user = null;
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Авторизация</title>
  <link rel="stylesheet" href="https://d.mp5.space/dev.css">
  <style>
    * {
      white-space: normal;
    }

    table {
      font-size: 12px;
      border-collapse: collapse;
    }

    table thead td {
      background-color: rgb(100, 100, 100);
    }

    td {
      padding: 2px 4px;
      max-width: 150px;
      border: 1px solid rgba(150, 150, 150);
    }

  </style>
</head>
<body>

<? if (!empty($_COOKIE['unique_key'])): ?>
  <h1>Привет пользователь!</h1>
  <a href="logout.php">Выйти</a>
<? else: ?>
  <h1>Привет гость!</h1>
  <form id="authorization">

    <label for="login">Login</label>
    <br>
    <input type="text"
           id="login"
           autofocus
           placeholder="Ваш логин"
           required>
    <br>

    <label for="password">Password</label>
    <br>
    <input type="password"
           id="password"
           placeholder="Ваш пароль"
           required>
    <br>
    <br>
    <button>Готово</button>

  </form>
<? endif; ?>

<script src="https://code.jquery.com/jquery-3.6.1.js"></script>
<script src="admin_pass.js"></script>
</body>
</html>