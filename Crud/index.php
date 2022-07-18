<?php

include 'dbconect.php';

if (isset($_POST['btnsave'])) {
  $pname = $_POST['txtname'];
  $price = $_POST['txtprice'];

  if (!empty($pname && $price)) {

    $insert = $pdo->prepare("insert into tbl_product (productname,productprice)value(:name, :price)");
    $insert->bindParam(':name', $pname);
    $insert->bindParam(':price', $price);

    $insert->execute();

    if ($insert->rowCount()) {
      echo 'Insert sucessful';
    } else {
      echo 'Insert Fail';
    }
  } else {
    echo 'Faikds are Empty';
  }
}




?>


<h2>PHP PDO CRUD OPRATIONS</h2>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <form action="" method="post">
    <p><input type="text" name="txtname" placeholder="ProductName"></p>
    <p><input type="text" name="txtprice" placeholder="productPrice"></p>

    <input type="submit" value="Save" name="btnsave">
  </form>
</body>

</html>

<hr>

<?php

$select = $pdo->prepare("select * from tbl_product");

$select->execute();
echo "<pre>";
$row = $select->fetch();
print_r($row);



?>