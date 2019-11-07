<?php
/*
Construa uma página html com um formulário contendo um input e um botão. 
O usuário deve entrar com um número inteiro e apertar o botão. 
Constua um script PHP que receba o valor digitado no formulário e imprima o seguinte padrão, baseado no número digitado:
    ex: 3
    saída: *
           **
           ***
           **
           *
*/
    $number = $_POST['number'];
    $aux = "*";
    for($i=0;$i<$number;$i++){
        for($j=0;$j<$i;$j++){
            echo $aux;
        }        
        echo "<br>";
    }
    for($i=$number;$i>0;$i--){
        for($j=0;$j<$i;$j++){
            echo $aux;
        }        
        echo "<br>";
    }
    


?>



