<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h2>
    <?php

    $name = 'VistCount';

    $content = $_COOKIE['VistCount'] + 1;

    $expire = time() + (60 * 60);

    setcookie($name, $content, $expire);

    ?>

    <?php

    echo "<pre>";
    print_r($_COOKIE);


    ?>
  </h2>

  <h1>Cookeis</h1>
</body>

</html>