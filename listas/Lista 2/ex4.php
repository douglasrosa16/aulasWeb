<?php 

    Class exercicio{

        public function printTable($arrayComposto){
            echo "<table>";
            foreach($arrayComposto as $indice => $valor){
                echo "<tr>";
                foreach($valor as $t){
                    echo "<td>$t</td>";
                }
                echo"</tr>";
           
            }
            
            echo "</table>";
            
            
        }

    }

?>
<!--Impressão dos resultados-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
    table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    }
    </style>
    <title>Exercício 4</title>
</head>
<body>
    
</body>
</html>