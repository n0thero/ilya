<?
$elements = [
  100,
  500,
  [
    'name' => 'Vasya'
  ]
];

  echo '<pre>';

  foreach ($elements as $element) {
    echo "Элемент: <br>";
    var_dump($element);
    echo "<br><br>";
  }
  ?>

</pre>
