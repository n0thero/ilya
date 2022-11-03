<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Получить ответ сервера в AJAX</title>
</head>
<body>

<button id="go"
        autofocus>Нажимай</button>

<script src="https://code.jquery.com/jquery-3.6.1.js"></script>
<script>

  $('#go').on('click', function () {

    $.ajax({
      url: '6.server_response.php',
      method: 'get',
      data: {
        my_name: 'cool guy',
        my_age: 18
      }
    })
        .done(data => {

          console.log(data)

          if (data.status === 'success') {
            console.log(data.message);
          }
        });

  });

</script>
</body>
</html>
