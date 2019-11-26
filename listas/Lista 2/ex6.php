<?php
/*Crie um php que identifica se parâmetros de um formulário qualquer lhe foram enviados via
POST ou GET (pode-se utilizar a função count).*/
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Verifica FORM</title>
</head>
<body>
  <form method="GET" action="ex6Teste.php">
  Informe seu nome
  <input type="text" name="nome">
  <button type="submit">Enviar dados</button>
  </form>
  <form method="POST" action="ex6Teste.php">
  Informe seu endereço
  <input type="text" name="end">
  <button type="submit">Enviar dados</button>
  </form>
</body>
</html>