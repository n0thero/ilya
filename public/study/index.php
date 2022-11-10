<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>STUDY</title>
</head>
<body>

<style>
  #first {
    color: red
  }

  li {
    color: green
  }

  .important_element {
    color: blue;
  }

  .one_more_class {
    font-weight: bold;
  }

  .important_element.one_more_class {
    text-decoration: underline;
  }

</style>

<h1>
  Hello stranger
</h1>

<ul>
  <li class="" id="first">first</li>
  <li class="important_element one_more_class">second</li>
  <li class="one_more_class">third</li>
  <li class="important_element">fourth</li>
</ul>


<form name="my">
  <label for="one">First input</label>
  <input name="one"
         id="one"
         value="1">
  <br>
  <label for="two">Second input</label>
  <input name="two"
         id="two"
         value="2">
</form>

<form>
  <input type="radio" name="age" value="10" id="age1">
  <input type="radio" name="age" value="20" id="age2">
<!--  <label for="age1">?</label>-->
<!--  <label for="age2">?2</label>-->
</form>

<select id="select" multiple>
  <option value="apple">Яблоко</option>
  <option value="pear" selected>Груша</option>
  <option value="banana" selected>Банан</option>
</select>


<script src="study.js"></script>
</body>
</html>