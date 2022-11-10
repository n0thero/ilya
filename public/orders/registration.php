<?
include_once __DIR__ . "/handlers/get_user_by_keycard.php";
include_once __DIR__ . "/handlers/common_functions.php";

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
  <title>Регистрация</title>
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

<? if (!empty($current_user)): ?>
  <h1>Привет <?= $current_user['name'] ?>!</h1>
<?
  jlog($current_user);
  ?>
  <button onclick="location.href = 'order_list.php'">
    Перейти к заявкам
  </button>
  <br>
  <a href="handlers/logout.php">Выйти</a>
<? else: ?>

<h1>Создайте аккаунт жителя убежища</h1>

<form id="registration">

  <label for="firstname">Имя</label>
  <br>
  <input type="text"
         id="firstname"
         autofocus
         placeholder="Имя"
         required>
  <br>

  <label for="login">Логин</label>
  <br>
  <input type="text"
  id="login"
  placeholder="Логин"
  required>
  <br>

  <label for="password">Пароль</label>
  <br>
  <input type="password"
  id="password"
  placeholder="Пароль"
  required>
  <br>
  <br>

  <button>Стать жителем убежища</button>

</form>

<? endif; ?>

<script src="https://code.jquery.com/jquery-3.6.1.js"></script>
<script src="js/registration.js"></script>
</body>
</html>