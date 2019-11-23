<?php


    require_once("ex1.php");

    $arrayString = ["Douglas, Oliveira, Rosa, Wellen, Douglas, Teste, Adao, Janice"];
    $nome = "Douglas";
    echo "<pre>";
    var_dump($arrayString);
    echo "</pre>";

    $teste = new exercicio();
    $teste->removeIguais($arrayString, $nome);


?>