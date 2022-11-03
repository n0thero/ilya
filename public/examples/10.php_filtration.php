<?

$users = [
  [
    'name' => 'олег',
    'class' => 'первый'
  ],
  [
    'name' => 'василий',
    'class' => 'второй'
  ],
  [
    'name' => 'кондратий',
    'class' => 'первый'
  ],
];

$first_class_users = array_filter($users, function ($user_to_filter) {
  return $user_to_filter['class'] === 'второй';
});

jlog($first_class_users); // результат поиска
jlog(count($first_class_users)); // количество элементов массива
jlog(reset($first_class_users)); // первый элемент в массиве, вне зависимости от его ключа
