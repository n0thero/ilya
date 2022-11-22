<?
include_once __DIR__ . '/../common_functions.php'

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Vault 76</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<? include_once __DIR__ . '/components/header.php' ?>

<div>
  <h1>Добро пожаловать на страницу убежища</h1>
  <br>
  <p>Здесь вы можете ознакомиться с нащими условиями, чтобы стать жителем убежища</p>
  <br>
  <p>Заполните анкету и мы рассмотрим вашу кандидатуру</p>
</div>

<form id="order_on_vault">
  <label for="name">Ваше имя</label>
  <br>
  <input type="text"
  id="name"
  placeholder="Имя"
  >
  <br>
  <br>
  <label for="sex">Ваш пол</label>
  <select name="sex" id="sex">
    <option disabled selected>--</option>
    <option value="male">male</option>
    <option value="female">female</option>
  </select>
  <br>
  <br>
  <label for="special">Опишите чем вы полезны убежищу</label>
  <br>
  <textarea name="special" id="special" cols="30" rows="10"></textarea>
  <br>
  <br>
  <button>Отправить</button>

</form>
<br>
<br>
<br>

<div>
  <button id="button_to_form" onclick="if (confirm('Для перехода на следующуюю страницу, нужен доступ Смотрителя. Пройдите авторизацию')) {
    location.href = 'admin_pass.php';
  }">
    Вход для Смотрителя</button>
</div>


<script src="https://code.jquery.com/jquery-3.6.1.js"></script>
<script src="js/vault76.js"></script>
</body>
</html>
