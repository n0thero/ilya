<?
include __DIR__ . "/handlers/common_functions.php";
include __DIR__ . "/handlers/get_user_by_keycard.php";

$file_name = __DIR__ . "/../../database/orders/orders.json";

$file_data = rtrim(file_get_contents($file_name));

if (empty($file_data)) {
  $file_data = '[]';
}

if (!empty($_COOKIE['unique_key'])) {
  $current_user_is_admin = get_user_by_keycard($_COOKIE['unique_key']);
} else {
  $current_user_is_admin = null;
}


$orders = !empty($file_data)
  ? json_decode($file_data, true)
  : [];

$random = rand(1, 10000);

$message_styles = !empty($orders)
  ? 'style="display: none"'
  : '';
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

<? if ($current_user_is_admin['is_admin'] === false): ?>
  <p>
    У вас нет доступа к данной странице
  </p>
<? else: ?>

  <p class="no_orders" <?= $message_styles ?>>
    На сегодня заявок нет :(
  </p>

  <? if (!empty($orders)): ?>

    <table class="orders_table">
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
        <tr class="table_list">
          <td><?= $order['name_user'] ?></td>
          <td><?= $order['idea'] ?></td>
          <td><?= $order['time_order'] ?></td>
          <td>
            <button class="delete_button"
                    data-hash="<?= $order['hash'] ?>">Удалить
            </button>
          </td>
        </tr>
      <? endforeach; ?>
      </tbody>
    </table>

  <? endif; ?>

<? endif; ?>

<script src="https://code.jquery.com/jquery-3.6.1.js"></script>
<script src="js/orders.js"></script>
</body>
</html>