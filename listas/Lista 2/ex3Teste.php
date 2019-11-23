<?php 

    require_once("ex3.php");

    //Valores em ordem Crescente
    $valores = [];
    $valores[] = 1;
    $valores[] = 2;
    $valores[] = 3;
    $valores[] = 4;
    $valores[] = 5;
    $valores[] = 6;
    $valores[] = 7;
    $valores[] = 8;
    $valores[] = 9;
    $valores[] = 10;
    //Inserção de novos valores em aleatório
    $valores[] = random_int(1, 10);
    $valores[] = random_int(1, 10);

    $resultado = [];

    $teste = new exercicio();
    $resultado[] = $teste->ordenar($valores); 
    echo "Valores ordenados";
    echo "<pre>";
    var_dump($resultado);
    echo "</pre>";
    
?>