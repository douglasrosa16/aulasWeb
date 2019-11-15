<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "alunos";

$con = new mysqli($host, $user, $password, $database);

if (! $con->connect_errno) {

  if (isset($_POST['nome']) && $_POST['nome'] != '' && 
      isset($_POST['id_disciplina']) &&  $_POST['id_disciplina'] != '') 
  {
    $nome = $_POST['nome'];
    $id_disciplina = $_POST['id_disciplina'];
    $sql = "UPDATE disciplina SET nome=? WHERE id_disciplina=?";
    $stmt = $con->prepare($sql);
    if ($stmt) {
      $stmt->bind_param("si",$nome, $id_disciplina);
      $stmt->execute();
      $stmt->close();
    }
  }

  $con->close();
  
  header("Location: disciplinas.php");
}
else
  echo "<h1>Erro de conexão</h1>";
?>