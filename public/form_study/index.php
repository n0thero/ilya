<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Form Study</title>
  <link rel="stylesheet" href="https://d.mp5.space/dev.css">
  <style>
    *{
      white-space: normal;
    }
  </style>
</head>
<body>
<h1>
  Введите Ваши данные
</h1>

<form id="personal_data">

  <label for="name">Имя</label>
  <br>
  <input type="text"
         id="name"
         autofocus
         required>
  <br>

  <label for="email">email</label>
  <br>
  <input type="email"
         id="email"
         required>
  <br>

  <label for="phone">Телефон</label>
  <br>
  <input type="text"
         id="phone"
         required>
  <br>
  <button>Отправить</button>


</form>


<script src="script.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.js"></script>
</body>
</html>