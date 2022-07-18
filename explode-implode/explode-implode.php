<!DOCTYPE>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Explode e Implode</title>
</head>
<body>
<h2>

<?php

$name = "My name is Fernando dos Santos";

$explod = explode(" ", $name);

$strn = strlen($name);


echo "<pre>";
print_r($strn);

echo "<pre>";

print_r($explod);

$cars = array(
  'Toyota',
  'Ferrari',
  'Porsche'
);


$implod = implode(', ', $cars);

print_r($implod);
?>
</body>
</html>