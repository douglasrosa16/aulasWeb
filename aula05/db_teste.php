<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "alunos";

$con = new mysqli($host, $user, $password, $database);

if (!$con->connect_errno) {
  echo "Conectado ao MySQL! <BR>";

  // Insert

  $sql = "INSERT INTO aluno (nome, idade, cidade) " .
         "VALUES ('Marcos', 50, 'Curitiba') ";

  if ($con->query($sql)) {
    echo "Registro inserido com sucesso <br>";
  }
  else {
    echo "Erro ao inserir registro <br>";
  }

  // Update

  $sql = "UPDATE aluno set idade=idade+1 WHERE nome='Marcos'";

  if ($con->query($sql)) {
    echo "Registro alterado com sucesso <br>";
  }
  else {
    echo "Erro ao alterar registro <br>";
  }

  // Select

  $sql = "SELECT * FROM aluno";
  $res = $con->query($sql);
  if ($res) {
    while ($a = $res->fetch_row() ) {
      //var_dump($a);
      echo "$a[0], $a[1], $a[2], $a[3] <br> ";
    }
  }
  else {
    echo "Erro na execucao do SQL <br>";
  }
  
  echo "<hr>";

  $sql = "SELECT * FROM aluno";
  $res = $con->query($sql);
  if ($res) {
    while ($a = $res->fetch_assoc() ) {
      //var_dump($a);
      echo $a['id_aluno'] . ", ";
      echo $a['nome'] . ", ";
      echo $a['idade'] . ", ";
      echo $a['cidade'];
      echo " <br> ";
    }
  }
  else {
    echo "Erro na execucao do SQL <br>";
  }
  
  echo "<hr>";

  $nome = "Marcos";
  $sql = "SELECT * FROM aluno where nome=\"$nome\"  " ;
  $res = $con->query($sql);
  if ($res) {
    echo "<p> Foram encontrados: $res->num_rows registros</p>";
  }

  echo "<hr>";

  // bind_param e bind_result

  $sql = "SELECT nome, idade FROM aluno " . 
         "WHERE cidade like ? and idade > ? " ;
  $cidade = "%Curi%";
  $idade = 54;
  $stmt = $con->prepare( $sql );
  if ($stmt) {
    $stmt->bind_param("si", $cidade, $idade); // f para float
    $stmt->execute();
    $stmt->bind_result($res_nome, $res_idade);
    $res = $stmt->store_result();

    if ($stmt->num_rows > 0)  {
      echo "Foram encontrados: $stmt->num_rows registros:";
      echo "<ol>";
      while ($stmt->fetch()) {
        echo "<li>Nome: $res_nome, Idade: $res_idade </li>";
      }
      echo "</ol>";
    }
    else
      echo "Não encontrou nenhum registro <br>";
    
    $stmt->close();
  }

  echo "<hr>";

  //

  $sql = "INSERT INTO aluno (nome, idade, cidade) VALUES(?, ?, ?)";
  $stmt = $con->prepare( $sql );
  
  if ($stmt) {
    // "sis" -> string, inteiro, string
    $stmt->bind_param("sis", $nome, $idade, $cidade);

    $nome = "Adriana";  $idade = 23;  $cidade = "Rondonopolis";
    if ($stmt->execute())
      echo "* Registro Inserido <br>";
    else
      echo "* Erro ao Inserir o registro <br>";

    $nome = "Paulo";  $idade = 60;  $cidade = "Foz do Iguacu";
    if ($stmt->execute())
      echo "* Registro Inserido <br>";
    else
      echo "* Erro ao Inserir o registro <br>";

    $nome = "Beatriz";  $idade = 44;  $cidade = "Cascavel";
    if ($stmt->execute())
      echo "* Registro Inserido <br>";
    else
      echo "* Erro ao Inserir o registro <br>";
    
    $stmt->close();
  }
  else
    echo "Erro no SQL <br>";

  $con->close();

}
else {
  echo "Erro ao conectar com o MySQL.";
}