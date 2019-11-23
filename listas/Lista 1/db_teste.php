<?php
//Para conectar no Banco de Dados
$database = "alunos";
$user = "root";
$password = "";
$host = "localhost";

//Interface do Banco de Dados com PHP
$con = new mysqli($host, $user, $password, $database);

//Verificar se Ocorreu algum erro na conexão
if (!$con->connect_errno){
    echo "Conectado ao MYSQL! <br>";
}else{
    echo "Erro ao conectar com o MYSQL!<br>";
}

?>