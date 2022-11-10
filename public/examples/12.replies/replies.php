<?
$names = ['Олег', 'Вася', 'Петя'];
$replies = [
  'Класс',
  'ВСё ок',
  'Отстой',
  'Можно было получше'
];

$random_name = $names[rand(0, count($names) - 1)];
$reply = $replies[rand(0, count($replies) - 1)];

?>

<div>
  <h2>
    <?= $random_name ?>
  </h2>
  <p>
    <?= $reply ?>
  </p>
</div>

