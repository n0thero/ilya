<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Динамическое добавление в таблицу</title>
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

<form action="add_dynamic.php"
      id="add_form">

  <input type="text"
  id="name"
  autofocus
  placeholder="Имя"
  required>
  <br>
  <br>

  <input type="text"
  id="sex"
  placeholder="Пол"
  required>
  <br>
  <br>
  <button>Отправить</button>
  <br>
  <br>
  <br>
  <br>

  <table class="info_table">
    <thead>
    <tr>
      <td>Имя</td>
      <td>Пол</td>
      <td>Действие</td>
    </tr>
    </thead>
    <tbody>
    <tr>
      <td></td>
      <td></td>
      <td>
        <button class="delete_button">Удалить</button>
      </td>
    </tr>
    </tbody>
  </table>

</form>


<script src="https://code.jquery.com/jquery-3.6.1.js"></script>
<script src="dynamic.js"></script>
</body>
</html>
