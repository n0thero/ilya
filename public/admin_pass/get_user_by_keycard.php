<?
include_once __DIR__ . "/common_functions.php";

//ini_set('display_errors', true);
//ini_set('error_reporting', E_ALL);

function get_user_by_keycard($key_card)
{
    $keycards_file_name = __DIR__ . "/keycards.json";

    $keycards_file_data = rtrim(file_get_contents($keycards_file_name));

    if (empty($keycards_file_data)) {
        $keycards_file_data = '[]';
    }

    $users_keycards = json_decode($keycards_file_data, true);

    $filtered_user_keycards = array_filter(
        $users_keycards,
        function ($user_to_filter) use ($key_card) {
            return $user_to_filter['user_key_card'] === $key_card;
        }
    );

    if (empty($filtered_user_keycards)) {
        return null;
    }

    $user_login_row = reset($filtered_user_keycards);

    $user_unique_login = $user_login_row['user_login'];

    // Теперь получим пользователей:

    $users_file_name = __DIR__ . "/admin_pass.json";

    $users_file_data = rtrim(file_get_contents($users_file_name));

    if (empty($users_file_data)) {
        $users_file_data = '[]';
    }

    $users = json_decode($users_file_data, true);
}


