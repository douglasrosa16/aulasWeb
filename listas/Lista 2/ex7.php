<?php
/*. Crie um formulário com os campos “nome”, “idade” e “CPF”. Direcione esse conteúdo para
um script PHP que deve armazená-lo na sessão. Utilize o CPF para indexar o array utilizado
para armazenar o conteúdo. Mostre todos os conteúdos que foram postados anteriormente. */
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
  <form action="ex7Teste.php" method="POST">
    Informe seu nome <input type="text" name="nome" placeholder="Informe o nome"></br>
    Informe sua idade <input type="number" name="idade"></br>
    Informe o CPF <input type="text" name="cpf"></br>
    <button type="submit">Enviar</button>
  </form>
  <?php  ?>
</body>
</html>