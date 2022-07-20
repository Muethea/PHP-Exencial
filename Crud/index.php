<?php

include 'dbconect.php';

if (isset($_POST['btnsave'])) {

  $pname = $_POST['nome'];
  $psobrenome = $_POST['sobrenome'];

  if (!empty($pname && $psobrenome)) {
    $insert = $pdo->prepare("insert into c_estudantes(nome, sobrenome)values(:nome,:sobrenome)");

    $insert->bindParam('nome', $pname);
    $insert->bindParam('sobrenome', $psobrenome);
    $insert->execute();

    if ($insert->rowCount()) {

      echo "Inseridos com sucesso";
    } else {

      echo "Falha na insercao";
    }
  } else {
    echo "Canpus Vazios";
  }
} //This is end savebutton

if (isset($_POST['btnupdate'])) {

  $pname = $_POST['nome'];
  $psobrenome = $_POST['sobrenome'];
  $id = $_POST['txtid'];

  if (!empty($pname && $psobrenome)) {
    $update = $pdo->prepare("update c_estudantes set nome=:pname,sobrenome=:psobrenome where id =" . $id);

    $update->bindParam(':pname', $pname);
    $update->bindParam(':psobrenome', $psobrenome);

    $update->execute();

    if ($update->rowCount()) {

      echo "Alterado com sucesso";
    } else {
      echo "Falha na alteracao";
    }
  } else {
    echo "Campus Vazios ";
  }
} //This is end savebutton


if (isset($_POST['btndelete'])) {

  $delete = $pdo->prepare("delete from c_estudantes where id =" . $_POST['btndelete']);

  $delete->execute();
} else {

  echo "Impossivel deletar";
}



?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro</title>

</head>

<body>


  <form class="formulario" action="" method="post">
    <?php

    if (isset($_POST['btnedit'])) {

      $select = $pdo->prepare("select * from c_estudantes where id=" . $_POST['btnedit']);
      $select->execute();

      if ($select) {
        $row = $select->fetch(PDO::FETCH_OBJ);
        echo '

   <p>
   <input class="inputinfo" type="text" name="nome" value="' . $row->nome . '">

 </p>

 <p>
   <input class="inputinfo" type="text" name="sobrenome" value="' . $row->sobrenome . '">
 </p>
 <input  type="hidden" value="' . $row->id . '" name="txtid" >

 <button type="submit" name="btnupdate">Salvar</button>

 <button type="submit" name="btncancel">Cancelar</button>

   
   ';
      }
    } else {
      echo '
  <p>
  <input class="inputinfo" type="text" name="nome" placeholder="Digite seu Nome">

</p>

<p>
  <input class="inputinfo" type="text" name="sobrenome" placeholder="Digite o seu sobrenome">
</p>

<input id="save" type="submit" value="Cadastrar-se" name="btnsave">
  
  ';
    }

    ?>
    <h2>Cadastro de Estudantes</h2>


    <br>

    <table id="names" border="1">
      <thead>
        <th>ID</th>
        <th>Nome</th>
        <th>Sobrenome</th>
        <th>EDIT</th>
        <th>DELETE</th>

      </thead>
      <tbody>
        <?php
        $select = $pdo->prepare("select * from c_estudantes");
        $select->execute();

        while ($row = $select->fetch(PDO::FETCH_OBJ)) {
          echo '
        <tr>
        <td>' . $row->id . '</td>
        <td>' . $row->nome . '</td>
        <td>' . $row->sobrenome . '</td>
        <td>   <button type="submit" value ="' . $row->id . '" name="btnedit">Edit</button></td>
        <td>   <button type="submit" value ="' . $row->id . '" name="btndelete">Delete</button></td>
     
     
        </tr>
        ';
        }

        ?>
      </tbody>
    </table>
  </form>

</body>

</html>