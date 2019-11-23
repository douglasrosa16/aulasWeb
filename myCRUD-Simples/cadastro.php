<?php
//Para conectar no Banco de Dados
$database = "alunos";
$user = "root";
$password = "";
$host = "localhost";

$con = new mysqli($host, $user, $password, $database);

if(!$con->connect_errno){
    if(isset($_POST['nome']) && ($_POST['nome'] != '')){
        $nome = $_POST['nome'];
        $sql = "INSERT INTO disciplina (nome) VALUES (?)";
        $stmt = $con->prepare($sql);

        if($stmt){
            $stmt->bind_param("s", $nome);
            $stmt->execute();      
            $stmt->close();
        }
    }

    $sql = "SELECT id_disciplina, nome FROM disciplina";
    $stmt = $con->prepare($sql);
    if($stmt){
        if($stmt->execute()){
            $stmt->bind_result($id, $nome);
            $res = $stmt->store_result();
            // echo "<ul>";
            // while($stmt->fetch()){
            //     echo "<li>ID: $id - Nome: $nome</li>";
            // }
            // echo "</ul>";
        }
        $stmt->close();
    }

}else{
    echo "Falha na conexão";
}



?>