<?
include_once __DIR__ . "/common_functions.php";

$file_name = __DIR__ . "/../../database/dynamic/name.json";

$file_data = rtrim(file_get_contents($file_name));

if (empty($file_data)) {
  $file_data = '[]';
}

$user_avatars = !empty($file_data)
  ? json_decode($file_data, true)
  : [];


$message_styles = empty($users)
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
  <title>Загрузка аватара</title>
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
<h1>Choose your fighter</h1>

<p class="no_users" <?= $message_styles ?>>
  Бойцов нет
</p>


<form action="avatar_saver.php"
      id="add_avatar"
      enctype="multipart/form-data"
      method="post">

  <label for="user_hash">Выберите пользователя</label>
  <br>
  <select name="user_hash" id="user_hash">
    <? foreach ($user_avatars as $avatar): ?>
      <option value="<?= $avatar['hash'] ?>">
        <?= $avatar['name'] . ', пол - ' . $avatar['sex'] ?>
      </option>
    <? endforeach; ?>
  </select>
  <br>
  <br>
  <label for="avatar">Загрузите аватарку</label>
  <br>
  <input type="file"
         name="avatar"
         id="avatar">
  <br>
  <br>
  <button>Отправить</button>

</form>

<script src="https://code.jquery.com/jquery-3.6.1.js"></script>
</body>
</html>
