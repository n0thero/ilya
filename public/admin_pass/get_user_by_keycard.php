<?
include_once __DIR__ . "/common_functions.php";

ini_set('display_errors', true);
ini_set('error_reporting', E_ALL);

function get_user_by_keycard($key_card)
{
  $file_name = __DIR__ . "/keycards.json";

  $file_data = rtrim(file_get_contents($file_name));

  if (empty($file_data)) {
    $file_data = '[]';
  }

  $users_keycards = json_decode($file_data, true);

  $filtered_user_keycards = array_filter(
    $users_keycards,
    function ($user_to_filter) use ($key_card) {
      return $user_to_filter['user_key_card'] === $key_card;
    }
  );

  if (empty($filtered_user_keycards)) {
    $filtered_user_keycards = null;
  }

  return [];
}


