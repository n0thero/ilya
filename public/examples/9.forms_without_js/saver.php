<?

$file = fopen(__DIR__ . "/order.txt", 'a+');

fwrite($file, "\r\n" . $_GET['my_name'] . ', Возраст: ' . $_GET['my_age']);

fclose($file);

echo 'Привет ' . $_REQUEST['my_name'] . '!';
