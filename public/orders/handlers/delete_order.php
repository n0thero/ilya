<?
include __DIR__ . "/common_functions.php";    // в этот файл подключается другой файл, и это путь к нему

header('Content-Type: application/json');  // заголовок, чтобы браузер понял, какой формат
                                                 // данных ему вернется обратно с сервера
$file_name = __DIR__ . "/../../../database/orders/orders.json";    //переменной file_name присваивается название
                                                                  // файла json . тип данных - строка
$file_data = rtrim(file_get_contents($file_name));   // переменной file_data присваивается содержимое файла, лежащего по адресу
                                                    // file_name в виде строки и удаляются лишние пробелы . тип данных - строка

if (empty($file_data)) {  // если в файле пусто, то он - пустой массив в формате json [] . тип данных - строка
  $file_data = '[]';
}

$orders = json_decode($file_data, true); // новая переменная, которой присваивается
                                            // раскодированный массив
$filtered_orders = array_filter(       // новая переменная, которой присваивается результат фильтрации
  $orders,                            // массива orders.

  function ($order_to_filter) {         // функция, которая возвращает все объекты массива, за исключение того,
    return intval($order_to_filter['hash']) !== intval($_POST['hash']);  // у которого в параметре hash такое же |->тип данных - число (потому что стоит inval)
  }                                                              //значение, которое отправил браузер.
);

$file = fopen($file_name, 'w');
fwrite($file, json_encode($filtered_orders, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
fclose($file);


echo json_encode(['status' => 'success']);





