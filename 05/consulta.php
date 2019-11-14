<?php
//Para conectar no Banco de Dados
$database = "alunos";
$user = "root";
$password = "";
$host = "localhost";

$con = new mysqli($host, $user, $password, $database);

if(!$con->connect_errno){

    $nomePar = $_GET['nome'];
    if(!Empty($nomePar)){
        echo "Tem valor";
        $sql = "SELECT id_disciplina, nome FROM disciplina WHERE nome like ?";
    }
    $sql = "SELECT id_disciplina, nome FROM disciplina";
    
    $stmt = $con->prepare($sql);
    if($stmt){
        if(!Empty($nomePar)){
            echo "Sim sim sim";
            $stmt->bind_param("s",$nomePar);
        }
        $stmt->execute();
        $stmt->bind_result($id, $nome);
        $res = $stmt->store_result();
        if($stmt->num_rows > 0){
            echo "<h2>Resultado da consulta</h2>";
            echo "<ul>";
            while($stmt->fetch()){
                echo "<li>";
                echo "Id: $id - Nome: $nome";
                //$link = "editar.php?id_disciplina=$id&nome=$nome";
                //echo "<a href=\"$link\"> - Editar </a>";
                echo "</li>";
            }
    }else{
        echo "Nenhum registro foi encontrado";
    }
        echo "</ul>";
    }
    $stmt->close();
}else{
    echo "Falha na conexão";
}



?>