<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Отзывы</title>
  <link rel="stylesheet" href="https://d.mp5.space/dev.css">
</head>
<body>

<h1>Отзывы</h1>

<?
for ($number = 0; $number < 10; $number++) {
  include __DIR__ . '/replies.php';
}
?>

</body>
</html>