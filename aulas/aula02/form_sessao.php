<?php
session_start();

if (count($_POST) == 4) {
  $nome = $_POST['nome'];
  $idade = $_POST['idade'];
  $endereco = $_POST['endereco'];
  $email = $_POST['email'];

  $dados = [
    'nome' => $nome,
    'idade' => $idade,
    'endereco' => $endereco,
    'email' => $email
  ];

  $_SESSION['pessoas'][] = $dados;
}


// var_dump($_SESSION['pessoas']);
// session_destroy();

?>

<!DOCTYPE html>
<html lang="en">

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
      <td>Endereco</td>
      <td>Email</td>
    </tr>
    <?php
    if (isset($_SESSION['pessoas'])) {
      foreach ($_SESSION['pessoas'] as $p) {
        echo "<tr>";
        echo "<td>" . $p['nome']     . "</td>";
        echo "<td>" . $p['idade']    . "</td>";
        echo "<td>" . $p['endereco'] . "</td>";
        echo "<td>" . $p['email']    . "</td>";
        echo "</tr>";
      }
    }
    ?>
  </table>

</body>

</html>