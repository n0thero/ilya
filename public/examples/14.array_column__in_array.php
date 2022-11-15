<?
include_once __DIR__ . "/common_functions.php";

$users = [
[
'login' => 'вася',
'age' => 1001
],
[
'login' => 'петя',
'age' => 20
],
];

$logins = array_column($users, 'login');
jlog($logins);
if (in_array('вася', $logins)) {
jlog('вася на месте');
} else {
jlog('нет васи(');
}