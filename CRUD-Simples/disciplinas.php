<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cadastro de Disciplina</title>
</head>
<body>

<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "alunos";

  $con = new mysqli($host, $user, $password, $database);

  if (! $con->connect_errno) {
    if (isset($_POST['nome']) && $_POST['nome'] != '') {
      $nome = $_POST['nome'];
      $sql = "INSERT INTO disciplina (nome) VALUES(?)";
      $stmt = $con->prepare($sql);
      if ($stmt) {
        $stmt->bind_param("s",$nome);
        $stmt->execute();
        $stmt->close();
      }
    }

    $sql = "select id_disciplina, nome from disciplina";
    $stmt = $con->prepare($sql);
    if ($stmt) {
      if ($stmt->execute()) {
        $stmt->bind_result($id, $nome);
        $res = $stmt->store_result();
        echo "<ul>";
        while ($stmt->fetch()) {
          echo "<li>";
          echo "ID: $id - Nome: $nome";
          $link = "editar_disciplina.php?id_disciplina=$id&nome=$nome";
          echo "<a href=\"$link\">[Editar]</a>";
          $link = "apagar_disciplina.php?apagar_disciplina=true&id_disciplina=$id";
          echo "<a href=\"$link\">[Apagar]</a>";
          echo "</li>";
        }
        echo "</ul>";
      }
      $stmt->close();
    }

    $con->close();
  }
  else
    echo "<h1>Erro de conexão</h1>";
?>
  <hr>
  <a href="nova_disciplina.php">[Nova Disciplina]</a>
</body>
</html>



