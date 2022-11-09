<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Тестовая платформа</title>
</head>
<body>

<form id="project_form"
      action="project_saver.php">

  <input type="text"
         name="project_text"
         autofocus
         placeholder="Пишите что хотите"
         required>
  <br>
  <br>
  <input type="number"
         name="age"
         placeholder="Сколько вам лет"
         required>
  <br>
  <br>
  <textarea name="textarea"
            cols="30"
            rows="10"></textarea>
  <br>
  <br>
  <button>Отправить</button>

</form>

<script src="https://code.jquery.com/jquery-3.6.1.js"></script>
<script src="project.js"></script>
</body>
</html>