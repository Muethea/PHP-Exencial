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
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro</title>

  <style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  .formulario {

    background: blanchedalmond;
    width: 500px;
    position: relative;
    left: 20rem;
    padding: 4rem;
    display: grid;
    border-radius: 3rem;
    margin-top: 150px;
    place-items: center;
    flex-direction: column;
    justify-content: center;

  }

  .formulario .inputinfo {
    padding-left: 12px;
    margin-top: 2rem;
    background: whitesmoke;
  }


  #save {
    cursor: pointer;
    margin-top: 3rem;
    background: black;
    color: white;
  }

  #save:hover {
    background: DarkBlue;
  }

  .formulario input {

    border: none;
    border-radius: 8px;

    width: 300px;
    height: 35px;
  }
  </style>
</head>

<body>

  <form class="formulario" action="" method="post">

    <h2>Cadastro de Estudantes</h2>
    <p>
      <input class="inputinfo" type="text" name="nome" placeholder="Digite seu Nome">

    </p>

    <p>
      <input class="inputinfo" type="text" name="sobrenome" placeholder="Digite o seu sobrenome">
    </p>

    <input id="save" type="submit" value="Cadastrar-se" name="btnsave">
  </form>
  <br>

  <table id="names">
    <thead>
      <th>id</th>
      <th>Nomes</th>
      <th>Sobre nomes</th>
      <th>EDIT</th>
      <th>DELITE</th>

    </thead>
    <tbody>
      <?php

      $select = $pdo->prepare("SELECT *from c_estudantes");

      $select->execute();
      while ($row = $select->fetch(PDO::FETCH_OBJ)) {

        echo '
        <tr>
        <td>' . $row->id . '</td>
        <td>' . $row->nome . '</td>
        <td>' . $row->sobrenome . '</td>
        
        <td>    <button type="submit" value =""' . $row->id . '">EDIT</button></td>
    
        <td>        <button type="submit" value =""' . $row->id . '">DELITE</button></td>


        </tr>
        
        ';
      }




      ?>
    </tbody>

  </table>
</body>

</html>