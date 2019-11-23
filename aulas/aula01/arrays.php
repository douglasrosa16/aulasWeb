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

$a = [];
$a[] = 1;
$a[] = 2;
$a[] = 3;
$a[] = 4;
$a[] = "PHP";
$a[] = "Teste";
$a[] = 3.1415;
var_dump($a);

echo "<BR>";

// Arrays associativos
$b[0] = 100;
$b[4] = 500;
$b["a"] = 50;
$b["PHP"] = "Teste";
var_dump($b);
echo "<br>";

$c = [10,20,30];
var_dump($c);
echo "<br>";
$c = [ 0=>10, 1=>20, 2=>30];
var_dump($c);

$c = ["valor 0" => 10, "valor 1" => 20, "valor 2" => 30];
echo "<br>";
var_dump($c);
echo "<br>";

$pessoas["joao"] = [
    "idade"  => 50,
    "cidade" => "SP",
    "altura" => 1.71
];
$pessoas["maria"] = [
    "idade"  => 50,
    "cidade" => "SP",
    "altura" => 1.71
];                      
echo "Cidade do Joao: " . $pessoas["joao"]["cidade"];

$pessoas2["joao"]["idade"] = 50;
$pessoas2["joao"]["cidade"] = "SP";
$pessoas2["joao"]["altura"] = 1.71;
$pessoas2["maria"]["idade"] = 20;
$pessoas2["maria"]["cidade"] = "ROO";
$pessoas2["maria"]["altura"] = 1.51;

echo "<hr>";
echo "<h1> Numero de pessoas: " . count($pessoas) . 
     "</h1>";

?>

</body>
</html>