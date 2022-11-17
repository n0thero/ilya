<?

include_once __DIR__ . '/common_functions.php';

$a = [1, 2];
$b = [3];

showLog(array_merge($a, $b));
jlog(array_merge($a, $b));


$c = [
  'name' => 'олег',
  'возраст' => 'старый'
];

$d = [
  'name' => 'тиньков',
  'жена' => 'красавица'
];

showLog(array_merge($c, $d));
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

showLog(array_merge($e, $f));
jlog(array_merge($e, $f));

