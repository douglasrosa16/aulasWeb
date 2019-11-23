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
    $s1 = "<h1>Hello ";
    $s2 = "World! </h1>";
    echo $s1 . $s2 ;
    echo "$s1 $s2";
    echo '$s1 $s2';

    $i = 100;
    $soma = $i + 100;
    $sub = $i -10;
    $mul = $i * 2;
    $div = $i / 3;
    $resto = $i % 3;
    printf(
        "<br> %d  <br> %d <br> %d <br> %d <br> %f <br>",
        $i, $soma, $sub, $mul, $div);

    echo "Teste";

    // Comentario de uma linha
    /* 
        Comentario de mais de uma linha
    */


    $b = $i == 0;
    $b = $i >= 0;
    $b = $i > 0;
    $b = $i < 0;
    $b = $i <= 0;
    $b = $i != 0;
    $b = ($i <= 0) && ($i > -1) || ($i == 1);
    $b = ! $b;

    if ($b == 0) {

    }
    else {

    }

    $s = "Prog. Web";
    $f = 5.11;
    $i = 100;

    if (is_string($s)) {

    }
    if (is_bool($b)) {

    }
    if (is_float($f)) {

    }
    if (is_integer($i)) {

    }

    //////////////

    $i = 1;
    $i++;
    $i--;
    $i += 1; // $i = $i + 1
    $b = true;
    $s = ($b) ? "String1" : "String2";



?>
    <!--  Comentario Html -->
</body>
</html>