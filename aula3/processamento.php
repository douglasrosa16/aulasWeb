<?php

require_once('pessoa.php');

    $pessoa1 = new Pessoa;
    $pessoa1->setNome($_POST['nome']);
    $pessoa1->setIdade($_POST['idade']);    
    echo "Dados enviados com sucesso";
    var_dump($pessoa1);


if (isset($_GET['nome']) and isset($_GET['idade'])){
   echo "Ola mundo";
}


?>
