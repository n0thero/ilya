<?
ini_set('display_errors', true);
ini_set('error_reporting', E_ALL);

include __DIR__ . "/handlers/common_functions.php";
include __DIR__ . "/handlers/get_user_by_keycard.php";

if (!empty($_COOKIE['unique_key'])) {
  $current_user = get_user_by_keycard(intval($_COOKIE['unique_key']));
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

    .button {
      display: inline-block;
      border-radius: 4px;
      background-color: #f4511e;
      border: none;
      color: #FFFFFF;
      text-align: center;
      font-size: 28px;
      padding: 20px;
      width: 400px;
      transition: all 0.5s;
      cursor: pointer;
      margin: 5px;
    }

    .button span {
      cursor: pointer;
      display: inline-block;
      position: relative;
      transition: 0.5s;
    }

    .button span:after {
      content: '\00bb';
      position: absolute;
      opacity: 0;
      top: 0;
      right: -20px;
      transition: 0.5s;
    }

    .button:hover span {
      padding-right: 25px;
    }

    .button:hover span:after {
      opacity: 1;
      right: 0;
    }

  </style>
</head>
<body>

<? if (!empty($current_user)): ?>
  <h1>Привет пользователь <?= $current_user['name'] ?>!</h1>
  <button onclick="location.href = 'order_list.php'">
    Перейти к заявкам
  </button>
  <br>
  <a href="handlers/logout.php">Выйти</a>
<? else: ?>

  <? if (isset($_GET['logged_out']) && $_GET['logged_out'] === '1'): ?>
  <p>
    Вы вышли из аккаунта.
  </p>
  <? endif; ?>

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


<div>
<h4>Первый раз у нас? Пройди простую форму регистрации</h4>
  <button class="button"
          style="vertical-align: middle"
          onclick="location.href = 'registration.php'">
    <span>Зарегистрироваться </span>
  </button>
</div>

<? endif; ?>

<script src="https://code.jquery.com/jquery-3.6.1.js"></script>
<script src="js/admin_pass.js"></script>
</body>
</html>
