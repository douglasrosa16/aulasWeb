<?php
  // var_dump($_GET);
  $id   = $_GET['id_disciplina'];
  $nome = $_GET['nome'];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Editar Disciplina</title>
</head>
<body>
  <form action="atualizar_disciplina.php" method="POST">
    <input type="hidden" name="id_disciplina" 
           value="<?php echo $id;?>">
    Nome: 
    <input type="text" name="nome"  value="<?php echo $nome;?>">
    <br><br>
    <input type="submit" value="Enviar">
    <input type="reset" value="Cancelar">
  </form>
</body>
</html>