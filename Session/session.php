<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Session</title>
</head>

<body>
  <h2>
    <?php

    session_start();

    $name = $_SESSION['name'] = 'Fernando';
    $age = $_SESSION['age'] = 24;
    $country = $_SESSION['country'] = 'Mozambique';

    echo "<pre>";
    echo $name . "<br>";
    echo $age . "<br>";
    echo $country . "<br>";

    session_start();
    unset($_SESSION['name']);
    unset($_SESSION['age']);
    unset($_SESSION['country']);

    ?>
  </h2>
</body>

</html>