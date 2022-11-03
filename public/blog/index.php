<?
include_once __DIR__ . "/common_functions.php";

$file_name = __DIR__ . "/app_data.json";

$file_data = rtrim(file_get_contents(getDataFileName()));

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
  <title>My Blog</title>
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

<h1>
  Мой персональный Блог
</h1>

<form id="blog_body">

  <input type="text"
         id="blog_name"
         autofocus
         placeholder="Название"
         required>
  <br>

  <label for="story">Событие</label>
  <br>
  <textarea id="story"
            cols="30"
            rows="10"></textarea>
  <br>
  <button>Отправить</button>

</form>

<button id="clear_button" onclick="if (confirm('Точно удалить?')) {
  location.href = '/blog/clear_file.php';
}">
  Удалить запись
</button>


<? if (empty($posts)): ?>
  <p>
    Блог не заполнен
  </p>
<? else: ?>

<!--  <table>-->
<!--    <thead>-->
<!--    <tr>-->
<!--      <td>Название</td>-->
<!--      <td>История</td>-->
<!--      <td>Дата создания</td>-->
<!--      <td>hash</td>-->
<!--    </tr>-->
<!--    </thead>-->
<!--    <tbody>-->
<!--    --><?// foreach ($posts as $post): ?>
<!--      <tr>-->
<!--        <td>--><?//= $post['blog_name'] ?><!--</td>-->
<!--        <td>--><?//= $post['story'] ?><!--</td>-->
<!--        <td>--><?//= $post['time_post'] ?><!--</td>-->
<!--        <td>--><?//= $post['hash'] ?><!--</td>-->
<!--      </tr>-->
<!--    --><?// endforeach; ?>
<!--    </tbody>-->
<!--  </table>-->

<? endif; ?>





<script src="https://code.jquery.com/jquery-3.6.1.js"></script>
<script src="script.js"></script>
</body>
</html>
