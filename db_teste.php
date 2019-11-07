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

    $sql = "INSERT INTO aluno (nome, idade, cidade) VALUES ('Wellen', 20, 'Pedra preta')" ;

    //Retorna o Resultado
    if($con->query($sql)){
        echo "Registro inserido com sucesso <br>";
    }else{
        echo "Erro ao inserir o registro";
    }

    $sql = "SELECT * FROM aluno";
    $res = $con->query($sql); //Pego o resultado Inteiro do SQL
    //$res -> vou retornar o resultado da SQL ou False caso ocorra erro
    if ($res){
        //Vou pegar cada linha do SQL
        while($a = $res->fetch_row()){
            //var_dump($a);
            echo "$a[0], $a[1], $a[2], $a[3] <br>"; //ID - Nome - Idade - Cidade
        }
    }else{
        echo "Erro na execução do SQL";
    }
}else{
    echo "Erro ao conectar com o MYSQL!<br>";
}

?>