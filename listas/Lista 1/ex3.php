<?php
/*
Crie um array contendo os seguintes valores: 
78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 65, 74, 62, 62, 65, 64, 68, 73, 75, 79, 73.
Calcule a média dos valores. 
Crie um array para as temperaturas menores que a média. 
Crie um array para as temperaturas maiores ou igual a média. 
Imprima os vetores.
*/

$valores = array(78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 65, 74, 62, 62, 65, 64, 68, 73, 75, 79, 73);

$media = 0;
foreach($valores as $v){
    $media = $media + $v;
}
$media = $media / count($valores);
$maiorM = array();
$ArrMenor = array();
foreach($valores as $v){
    if ($v >= $media){
        array_push($maiorM, $v);
    }else{
        array_push($ArrMenor, $v);
    }
}
echo "Média = $media \n";
echo "Temperaturas maior ou igual a média: \n";
var_dump($maiorM);

echo "Temperaturas menor que a média: \n";
var_dump($ArrMenor);







?>