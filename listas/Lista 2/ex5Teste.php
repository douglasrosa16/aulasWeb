<?php

//Crie uma função que faça um “merge” entre dois arrays ordenados e retorne o array resultante

    require_once("ex5.php");

    $array1 = [1,2,3,4,5,6,7];
    $array2 = [4,2,1,4,5,3,7];

    //Ordenando arrays
    sort($array1);
    sort($array2);

    $teste = new exercicio();
    $valores = $teste->merge($array1, $array2);
    var_dump($valores);





?>