<?
include_once __DIR__ . "/common_functions.php";


$hashes = [3, 4, 5];

$random_hash = rand(0, 9);

jlog($random_hash);

while (in_array($random_hash, $hashes)) {
  echo 'Привет';
  $random_hash = rand(0, 9);
  jlog($random_hash);
}

echo $random_hash;