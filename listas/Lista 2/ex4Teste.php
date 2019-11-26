<?php
/*Crie uma função printTable que receba um array composto, sendo que cada elemento pode
conter um número variável de colunas. Pegue o maior número de colunas e imprima uma
tabela conforme o exemplo abaixo. No último elemento das linhas com número menores de
colunas, utilize “colspan” para adequar o a tabela:
*/
require_once("ex4.php");

$teste = new exercicio();

$a = array ( 
 1 => array( "Joao da Silva", "Rondonopolis", 25 ), 
 2 => array( "Maria da Silva", "Rondonopolis", 22, "Brasil", "Futebol" ), 
 3 => array( "Jose da Silva", "Ciudad del Este", 23, "Paraguai" ), 
 4 => array( "Olavo da Silva", 26 ) 
); 

$teste->printTable($a);
 
 //(utilize: style="background: white" ou style="background: gray" para as linhas)
 ?>
