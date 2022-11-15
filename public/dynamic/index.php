<?
include_once __DIR__ . "/common_functions.php";

$file_name = __DIR__ . "/../../database/dynamic/name.json";

$file_data = rtrim(file_get_contents($file_name));

if (empty($file_data)) {
  $file_data = '[]';
}

$info_table = !empty($file_data)
  ? json_decode($file_data, true)
  : [];
?>
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

</form>

<table class="info_table"
       style="display: <?= empty($info_table) ? 'none' : 'table' ?>">
  <thead>
  <tr>
    <td>Имя</td>
    <td>Пол</td>
    <td>Действие</td>
  </tr>
  </thead>
  <tbody>
  <? foreach ($info_table as $info): ?>
    <tr class="table_list">
      <td><?= $info['name'] ?></td>
      <td><?= $info['sex'] ?></td>
      <td>
        <button class="delete_button"
                data-hash="<?= $info['hash'] ?>">Удалить
        </button>
      </td>
    </tr>
  <? endforeach; ?>
  </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.6.1.js"></script>
<script src="dynamic.js"></script>
</body>
</html>
