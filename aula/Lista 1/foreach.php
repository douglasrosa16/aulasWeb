<?php

$pessoas["nome"] = "Maria";
$pessoas["idade"] = "15";
$pessoas["cidade"] = "Curitiba";
//Pego o índice de Pessoas e o Valor
foreach($pessoas as $indice => $valor){
   // echo $indice . ":". $valor . "<br>";
    //echo "$indice: $valor <br>";
}

$pessoas1["joao"]["idade"] = 50;
$pessoas1["joao"]["cidade"] = "SP";
$pessoas1["joao"]["altura"] = 1.71;
$pessoas1["maria"]["idade"] = 20;
$pessoas1["maria"]["cidade"] = "ROO";
$pessoas1["maria"]["altura"] = 1.50;

foreach($pessoas1 as $nome => $dados){
    echo "Nome: $nome <br>";
    foreach($dados as $indice => $valor){
        echo "$indice: $valor <br>";
    }
    echo "<br>";
}
?>