<?php

    require_once("db.php");
    require_once("alunosDAO.php");
    require_once("alunos.php");

    $db = new Db("localhost","root","","alunos");

    if($db->connect()){
        $dao = new alunosDAO($db);

    if(count($_POST) && (isset($_POST['nome']) != "")){
        $a = new Aluno(null, $_POST['nome'],$_POST['cidade'], $_POST['idade']);
        $dao->inserir($a);
    }else{
        $dao->imprimirAlunos();
    }


    }else{
        echo "Não foi possível estabelecer sua conexão";
    }


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Alunos</title>
</head>
<body>

    <form action="alunos_view.php" method="POST">
        Nome <input type="text" name="nome" required></br>
        Idade <input type="number" name="idade" ></br>
        Cidade<input type="text" name="cidade"></br>
        <button type="submit">Enviar</button>
    </form>
    <a href="alunos_view.php?op=imprimir">Imprimir</a>

</body>
</html>