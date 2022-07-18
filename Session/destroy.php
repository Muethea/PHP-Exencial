  <h2>This view.php</h2>

  <?php
  session_start();
  $name = $_SESSION['name'] = 'Fernando';
  $age = $_SESSION['age'] = 24;
  $country = $_SESSION['country'] = 'Mozambique';

  echo "<pre>";
  echo $name . "<br>";
  echo $age . "<br>";
  echo $country . "<br>";