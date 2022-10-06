<?
include_once __DIR__ . "/common_functions.php";

$file_name = __DIR__ . "/app_data.json";

$file = fopen($file_name, 'w');
fwrite($file, json_encode([]));
fclose($file);
?>
<script>
  location.href = '/app/';
</script>