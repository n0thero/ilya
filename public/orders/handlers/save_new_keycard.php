<?
/**
 * Сохраняет переданные логин и ключ в базу.
 */
function saveNewKeyCard($login, $key_card)
{

    $file_name = __DIR__ . '/../../../database/orders/keycards.json';

    $file_data = rtrim(file_get_contents($file_name));

    if (empty($file_data)) {
        $file_data = '[]';
    }

    $file_data_converted = json_decode($file_data, true);

    $result_to_save = array_merge(
        $file_data_converted, [
        [
            'user_login' => $login,
            'user_key_card' => $key_card,
        ]
    ]);

    $file = fopen($file_name, 'w');
    fwrite($file, json_encode($result_to_save, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    fclose($file);
}

function deleteAllKeyCards()
{
    $file_name = __DIR__ . '/../../../database/orders/keycards.json';

    $file = fopen($file_name, 'w');
    fwrite($file, json_encode([]));
    fclose($file);
}

// Код ниже 10 раз добавит рандомных людей
/*
for ($i = 0; $i < 10; $i++) {
    $random_key = rand(10000, 99999);
    saveNewKeyCard('vasya' . $random_key, 123 . $random_key);
}
*/
