<?
function jlog(...$obj): void
{
  ?>
  <script>
    <? foreach ($obj as $item): ?>
    <? if (is_null($item)): ?>
    console.log('<?= __FUNCTION__ ?>: Object is null.');
    <? else: ?>
    console.log(<?= json_encode($item) ?>);
    <? endif; ?>
    <? endforeach; ?>
  </script>
  <?
}

function showLog($data): void
{
  echo '<pre>';
  var_dump($data);
  echo '</pre>';
}

function getDataFromJson(string $file_name): array
{
  $file_data = rtrim(file_get_contents($file_name));

  if (empty($file_data)) {
    $file_data = '[]';
  }

  $file_json_decode = json_decode($file_data, true);

  return !empty($file_json_decode)
    ? $file_json_decode
    : [];
}

function saveDataToJson(string $target_file_name, $data_to_save): void
{
  $file = fopen($target_file_name, 'w');
  fwrite($file, json_encode($data_to_save, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
  fclose($file);
}

function appendDataToJsonArray($file_name, $data_to_append)
{

}

function response(array $result): void
{
  header('Content-Type: application/json');

  echo json_encode($result, JSON_UNESCAPED_UNICODE);

  die;
}
