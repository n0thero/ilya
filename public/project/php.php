<?

include_once __DIR__ . '/common_functions.php';

$a = [1, 2];
$b = [3];

showlog(array_merge($a, $b));
jlog(array_merge($a, $b));


$c = [
  'name' => 'олег',
  'возраст' => 'старый'
];

$d = [
  'name' => 'тиньков',
  'жена' => 'красавица'
];

showlog(array_merge($c, $d));
jlog(array_merge($c, $d));

$e = [
  [
    'name' => 'олег'
  ]
];

$f = [
  [
    'name' => 'тиньков'
  ]
];

showlog(array_merge($e, $f));
jlog(array_merge($e, $f));

