<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php

$a = [10,20,30,40,50];
$a = array(10,20,30,40,50);

echo "<ul>";
for ($i=0; $i<count($a); $i++) {
    echo "<li> Item " . $a[ $i ] . "</li>\n";
}
echo "</ul>";


$i=0;
while( $i < count( $a )) {
    echo "$a[$i] <br>";
    $i++;
}

echo "<hr>";

foreach($a as $valor) {
    echo "$valor <br>";
}

echo "<hr>";
$a = [2=>"dois", "quatro"=>50, 30=>100, "vinte"=>20];
foreach ($a as $indice => $valor) {
    echo $a[ $indice ] . " <br>";
}

$pessoas["nome"] = "Maria";
$pessoas["idade"] = 15;
$pessoas["cidade"] = "Curitiba";

echo "<br><br>";
foreach ($pessoas as $indice => $valor) {
    echo "$indice: $valor <br>";
}


$pessoas1["joao"]["idade"] = 50;
$pessoas1["joao"]["cidade"] = "SP";
$pessoas1["joao"]["altura"] = 1.71;
$pessoas1["maria"]["idade"] = 20;
$pessoas1["maria"]["cidade"] = "ROO";
$pessoas1["maria"]["altura"] = 1.51;
/*
  nome: joao
  idade: 50
  cidade: SP
  altura: 1.71

  nome: maria ...
*/

echo "<hr>";

foreach($pessoas1 as $nome => $dados ) {
    echo "Nome: $nome <br>";
    foreach($dados as $ind=>$valor) {
        echo "$ind: $valor <br>";
    }
    echo "<br>";
}



?>

</body>
</html>