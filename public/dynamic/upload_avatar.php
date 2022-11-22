<?
include_once __DIR__ . "/common_functions.php";

$file_name = __DIR__ . "/../../database/dynamic/name.json";

$user_avatars = getDataFromJson($file_name);

$message_styles = empty($users)
  ? 'style="display: none"'
  : '';

//$expert_styles = empty($special)
//  ? 'style="display: none"'
//  : '';

$specialities = array_unique(array_column($user_avatars, 'special'));

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
<h1>Подбор нужного вам специалиста</h1>

<p class="no_users" <?= $message_styles ?>>
  Специалистов нет
</p>

<form action="avatar_saver.php"
      id="add_avatar"
      enctype="multipart/form-data"
      method="post">

  <label for="speciality">Выберите специальность</label>
  <br>
  <select name="speciality"
          id="speciality"
          autofocus>
    <option disabled selected>Не выбрано</option>
    <? foreach ($specialities as $special): ?>
      <option value="<?= $special ?>">
        <?= $special ?>
      </option>
    <? endforeach; ?>
  </select>
  <br>
  <br>
  <div class="hash-wrap" style="display: none">
    <label for="name_expert">Выберите исполнителя</label>
    <br>
    <select name="unique_user_key"
            id="name_expert"
            required>
    </select>
  </div>
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
<script src="dynamic.js"></script>
</body>
</html>

