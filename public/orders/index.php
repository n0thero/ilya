<?
include __DIR__ . "/handlers/common_functions.php";

$file_name = __DIR__ . "/../../database/orders/orders.json";

$file_data = rtrim(file_get_contents($file_name));

if (empty($file_data)) {
  $file_data = '[]';
}

$posts = !empty($file_data)
  ? json_decode($file_data, true)
  : [];

$random = rand(1, 10000);
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Заявка на разработку</title>
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

<h1>
  Я начинающий программист
</h1>

<h2>
  Хочу взять вашу идею и реализовать ее своим потанцевалом
</h2>

<h3>
  Заполните заявку на мои эксперименты, я с вами свяжусь в ближайшее время
</h3>

<form id="order">

  <label for="name_user">Как к вам обращаться</label>
  <br>
  <input type="text"
  id="name_user"
  autofocus
  placeholder="Ваше имя"
  required>
  <br>

  <laber for="idea">Опишите вашу потребность</laber>
  <br>
  <textarea id="idea" cols="30" rows="10"></textarea>
  <br>
  <button>Отправить</button>

</form>
<br>
<br>
<br>

<button id="button_to_form" onclick="if (confirm('Для перехода на следующую страницу потребуется авторизация. Точно перейти?')) {
  location.href = 'admin_pass.php';
}">
  Перейти в заявки
</button>


<script src="https://code.jquery.com/jquery-3.6.1.js"></script>
<script src="js/create_order.js"></script>
</body>
</html>
