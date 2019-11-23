<?php

//Construa um script PHP que imprima a seguinte tabela: Até 100
//Ex: 1   2   3   4   5   6   7   8   9   10 
//Ex: 11  12  13  14  15  16  17  18  19  20 
//Posso fazer um for que percorre tudo e verifica se são 10 itens e imprime no HTML

for($i=1; $i<=10; $i++){
    echo "<table>";
    echo "<tr>";
    echo "<td>". $i ."</td>";
    echo "<tr>";
    echo "</table>";
}
?>