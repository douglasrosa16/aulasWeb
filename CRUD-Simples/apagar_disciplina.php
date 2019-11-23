<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "alunos";

  $con = new mysqli($host, $user, $password, $database);

  if (! $con->connect_errno) {
    if (isset($_GET['apagar_disciplina']) && isset($_GET['id_disciplina'])) {
      if ($_GET['apagar_disciplina']==true) {
        $id = $_GET['id_disciplina'];
        $sql = "DELETE FROM disciplina WHERE id_disciplina=?";
        $stmt = $con->prepare($sql);
        if ($stmt) {
          $stmt->bind_param("s",$id);
          $stmt->execute();
          $stmt->close();
        }
      }
    }
    $con->close();

    header("Location: disciplinas.php");
  }
  else
    echo "<h1>Erro de conexão</h1>";
