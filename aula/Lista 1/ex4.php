<?php
/*
Construa um script PHP com um formulário HTML, conforme exemplo abaixo. Ao apertar o 
botão, imprima o nome digitado no input desse modo: “Hello, Joao!”. Faça o exercício 
utilizando o método POST e o método GET.
*/
//Com método GET
    $nome = $_GET['nome'];
    $mensagem = "Hello,".$nome;
    echo "$mensagem";

//Com método Post 
/*
    $nome = $_POST['nome'];
    mensagem = "Hello,".$nome;

*/
?>