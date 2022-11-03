<?
function getDataFileName() {
  return __DIR__ . "/app_data.json";
}

function jlog(...$obj)
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

