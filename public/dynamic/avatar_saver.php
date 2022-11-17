<?
include_once __DIR__ . "/common_functions.php";

showLog($_FILES['avatar']['tmp_name']);

move_uploaded_file($_FILES['avatar']['tmp_name'], __DIR__ . '/../uploads/' . $_POST['speciality'] . '.jpg');
?>
<img src="/uploads/<?= $_POST['speciality'] . '.jpg' ?>" alt="Ваш аватар">
