<?

setcookie(
  'unique_key',
  '111',
  time() + (-60 * 60),
  '/'
);

header('Location: /orders/admin_pass.php?logged_out=1');