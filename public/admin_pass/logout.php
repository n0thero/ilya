<?

setcookie(
  'unique_key',
  '111',
  time() + (-60 * 60),
  '/'
);

header('Location: /admin_pass/?logged_out=1');