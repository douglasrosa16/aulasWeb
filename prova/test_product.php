<?php

    require_once("product.php");

    $produto1 = new Product(0,"Mouse");
    $produto2 = new Product(1,"Teclado");
    $produto3 = new Product(2,"Monitor");
    $produto4 = new Product(3,"Placa de Video");
    $produto5 = new Product(4,"Placa mãe");

    $arrayProdutos = [];
    $arrayProdutos[] = $produto1;
    $arrayProdutos[] = $produto2;
    $arrayProdutos[] = $produto3;
    $arrayProdutos[] = $produto4;
    $arrayProdutos[] = $produto5;

    function imprimeArray($arrayProdutos){
        echo "<pre>";
        foreach($arrayProdutos as $prod){
            echo "ID: " . $prod->getId() . " - ";
            echo "Name: " . $prod->getName() . "<br>";
        }
    }

    imprimeArray($arrayProdutos);


?>