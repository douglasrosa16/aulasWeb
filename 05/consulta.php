<?php
//Para conectar no Banco de Dados
$database = "alunos";
$user = "root";
$password = "";
$host = "localhost";

$con = new mysqli($host, $user, $password, $database);

if(!$con->connect_errno){

    $sql = "SELECT id_disciplina, nome FROM disciplina";
    $stmt = $con->prepare($sql);
    if($stmt){
        if($stmt->execute()){
            $stmt->bind_result($id, $nome);
            $res = $stmt->store_result();
            echo "<ul>";
            while($stmt->fetch()){
                echo "<li>";
                echo "ID: $id - Nome: $nome";
                //$link = "editar.php?id_disciplina=$id&nome=$nome";
                //echo "<a href=\"$link\"> - Editar </a>";
                echo "</li>";
            }
            echo "</ul>";
        }
        $stmt->close();
    }

}else{
    echo "Falha na conexão";
}



?>