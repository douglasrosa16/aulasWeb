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

    $sql = "UPDATE aluno set idade = idade+1 WHERE nome = 'Wellen'";
    
    if($con->query($sql)){
        echo "Registro Alterado com sucesso <br>";
    }else{
        echo "Erro ao alterar o registro";
    }

    echo "<hr>";
    $sql = "SELECT * FROM aluno";
    $res = $con->query($sql); //Pego o resultado Inteiro do SQL
    //$res -> vou retornar o resultado da SQL ou False caso ocorra erro
    if ($res){
        //Vou pegar cada linha do SQL
        while($a = $res->fetch_assoc()){
            //var_dump($a);
            //echo "$a[0], $a[1], $a[2], $a[3] <br>"; //ID - Nome - Idade - Cidade - Pegar dados separadamente
            //Pegar Coluna por Coluna
            echo $a['id_aluno'] . ", ";
            echo $a['nome']. ", ";
            echo $a['idade']. ", ";
            echo $a['cidade']. ", ";
            echo "<br>";           
        }
    }else{
        echo "Erro na execução do SQL";
    }
    $sql = "SELECT * FROM aluno WHERE nome=\"Wellen\" ";
    $res = $con->query($sql);
    if ($res){
        echo "<p> Foram encontrados: $res->num_rows registros</p>";
    }
    echo "<hr>";





    //bind_param e bind_result
//Novas Formas de Passar parâmetros dentro do SQL
    $sql = "SELECT nome, idade FROM aluno WHERE cidade like ? and idade > ?";

    $cidade = "%Pedra%";
    $idade = 21;
    $stmt = $con->prepare($sql); //Verifica se estão corretos
    if ($stmt){
        $stmt->bind_param("si", $cidade, $idade); //Passar os tipos dos parâmetros
        $stmt->execute();
        $stmt->bind_result($res_nome, $res_idade);
        $res = $stmt->store_result();

        if($stmt->num_rows > 0){
            echo "<ol>";
            while($stmt->fetch()){
                echo "<li>Nome: $res_nome, Idade: $res_idade</li>";
            }
            echo "<ol>";
        }else{
            echo "Nenhum registro encontrado";
        }
        $stmt->close();
    }else{
        echo "Deu ruim";
    }


    //Inserção com Parâmetros
    $sql = "INSERT INTO aluno (nome, idade, cidade) VALUES (?,?,?)";
    $stmt = $con->prepare($sql);
    if($stmt){
        //"sis" -> String, Inteiro e String
        $stmt->bind_param("sis", $nome, $idade, $cidade);
        $nome = "Douglas";
        $idade = 15+1;
        $cidade = "Juina";

        if ($stmt->execute()){
            echo "\nOpa, você acabou de inserir"; 
        }else{
            echo "Tente outra vezzz";
        }
    $stmt->close();
    }else{
        echo "Agasain";
    }

}else{
    echo "Erro ao conectar com o MYSQL!<br>";
}

?>