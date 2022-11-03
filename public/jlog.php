<?

function jlog($item)
{
    ?>
  <script>
      <? if (is_null($item)): ?>
      console.log('<?= __FUNCTION__ ?>: Object is null.');
      <? else: ?>
      console.log(<?= json_encode($item) ?>);
      <? endif; ?>
  </script>
    <?
}
