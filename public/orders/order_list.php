<?
include __DIR__ . "/handlers/common_functions.php";

$file_name = __DIR__ . "/../../database/orders/orders.json";

$file_data = rtrim(file_get_contents($file_name));

if (empty($file_data)) {
  $file_data = '[]';
}

$orders = !empty($file_data)
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
  <title>Заявки</title>
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
<script>
  window.server_data = JSON.parse('<?= $file_data ?>');
</script>

<? if (empty($orders)): ?>
<p>
  На сегодня заявок нет :(
</p>
<? else: ?>

<table>
  <thead>
  <tr>
    <td>Имя</td>
    <td>Заявка</td>
    <td>Время заявки</td>
    <td>Действие</td>
  </tr>
  </thead>
  <tbody>
  <? foreach ($orders as $order): ?>
  <tr>
    <td><?= $order['name_user']?></td>
    <td><?= $order['idea']?></td>
    <td><?= $order['time_order']?></td>
    <td>
      <button class="delete_button"
              data-hash="<?= $order['hash'] ?>">Удалить</button>
    </td>
  </tr>
  <? endforeach; ?>
  </tbody>
</table>

<? endif; ?>

<script src="https://code.jquery.com/jquery-3.6.1.js"></script>
<script src="js/database.js"></script>
<script src="js/orders.js"></script>
</body>
</html>
