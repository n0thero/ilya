<?
include_once __DIR__ . "/common_functions.php";

// in_array(что ищешь, в чём ищешь)
// array_column(массив, название колонки таблицы)

$hashes = [3, 4, 5, 7, 8];

$random_hash = rand(0, 9);

jlog($random_hash);

while (in_array($random_hash, $hashes)) {
  echo 'Привет';
  $random_hash = rand(0, 9);
  jlog($random_hash);
}

echo $random_hash;