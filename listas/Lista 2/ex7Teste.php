<?php

  session_start();  //Preciso sempre STARTar minha SESSION
  if(count($_POST)){
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $cpf = $_POST['cpf'];
    
    $dados = [
      'nome' => $nome,
      'idade' => $idade,
      'cpf' => $cpf
    ];
    $_SESSION['dados'][] = $dados;
  }
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>

  <table>
    <tr>
      <td>Nome</td>
      <td>Idade</td>
      <td>CPF</td>
    </tr>
    <?php
    if (isset($_SESSION['dados'])) {
      echo "<pre>";
      foreach ($_SESSION['dados'] as $p) {
        echo "<tr>";
        echo "<td>" . $p['nome']     . "</td>";
        echo "<td>" . $p['idade']    . "</td>";
        echo "<td>" . $p['cpf']    . "</td>";
        echo "</tr>";
      }
      echo "</pre>";
    }
    ?>
  </table>

</body>
