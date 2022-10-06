<?
include_once __DIR__ . "/common_functions.php";

$file_name = __DIR__ . "/app_data.json";

$file_data = file_get_contents(getDataFileName());

$clients = !empty($file_data)
    ? json_decode($file_data, true)
    : [];

$random = rand(1, 10000);
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>App: Server + JS</title>
  <link rel="stylesheet" href="https://d.mp5.space/dev.css">
  <style>
      * {
          white-space: normal;
      }

      table {
          font-size: 12px;
          border-collapse: collapse;
      }

      table thead td {
          background-color: rgb(100, 100, 100);
      }

      td {
          padding: 2px 4px;
          max-width: 150px;
          border: 1px solid rgba(150, 150, 150);
      }

  </style>
</head>
<body>
<script>
  window.server_data = JSON.parse('<?= $file_data ?>');
</script>

<h1 class="small-red">
  Учет выживших в Vault 76
</h1>

<form id="biology">

  <label for="input1">Firstname</label>
  <br>
  <input type="text"
         id="input1"
         value="Vasya_<?= $random ?>"
         autofocus
         required>

  <br>

  <label for="input2">Lastname</label>
  <br>
  <input type="text"
         id="input2"
         value="B_<?= $random ?>"
         required>

  <br>

  <label for="input3">Age</label>
  <br>
  <input type="number"
         id="input3"
         value="<?= rand(15, 50) ?>">

  <br>

  <label for="input_sex">Sex</label>
  <br>
  <select id="input_sex">
    <option value="null">--</option>
    <option value="m">Male</option>
    <option value="f">Female</option>
    <option value="g">Gul</option>
  </select>
  <br>
  <label for="input_description">S.P.E.C.I.A.L.</label>
  <br>
  <textarea id="input_description"
            cols="30"
            rows="10"></textarea>
  <br>
  <button>Submit</button>

</form>

<button id="clear_button" onclick="if (confirm('Точно удалить?')) {
  location.href = '/app/clear_file.php';
}">
  Clear database
</button>

<button id="delete_last_person">
  Delete last added
</button>

<? if (empty($clients)): ?>
  <p>
    No clients today in our vault.
  </p>
<? else: ?>

  <table>
    <thead>
    <tr>
      <td>First name</td>
      <td>Surname</td>
      <td>Age</td>
      <td>Sex</td>
      <td>S.P.E.C.I.A.L.</td>
      <td>hash</td>
    </tr>
    </thead>
    <tbody>
    <? foreach ($clients as $client): ?>
    <tr>
      <td><?= $client['firstname'] ?></td>
      <td><?= $client['lastname'] ?></td>
      <td><?= $client['age'] ?></td>
      <td><?= $client['sex'] ?></td>
      <td><?= $client['special'] ?></td>
      <td><?= $client['hash'] ?></td>
    </tr>
    <? endforeach; ?>
    </tbody>
  </table>

<? endif; ?>

<script src="https://code.jquery.com/jquery-3.6.1.js"></script>
<script src="script.js"></script>
</body>
</html>
