<?
include_once __DIR__ . "/common_functions.php";

showlog($_FILES['avatar']['tmp_name']);

move_uploaded_file($_FILES['avatar']['tmp_name'], __DIR__ . '/../uploads/' . $_POST['user_hash'] . '.jpg');
?>
<img src="/uploads/<?= $_POST['user_hash'] . '.jpg' ?>" alt="Ваш аватар">
