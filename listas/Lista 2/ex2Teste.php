<?php

    require_once("ex2.php");

    $itens = []; //Declara o Array
    //Adiciona Itens ao Array
    $itens[]= "Douglas";
    $itens[]= "Douglas";
    $itens[]= "Wellen";
    $itens[]= "Wellen";
    $itens[]= "Adao";
    $itens[]= "Janice";
    $itens[]= "Adao";
    $itens[]= "Douglas";
    $itens[]= "Vanessa";
    $itens[]= "Diego";
    $itens[]= "Gabriel";
    $itens[]= "Wellen";
    $itens[]= "Douglas";

    $Array = [];

    $teste = new exercicio();
    $Array[] = $teste->repetidos($itens);

    echo "<pre>";
    var_dump($Array);
    echo "</pre>";

?>