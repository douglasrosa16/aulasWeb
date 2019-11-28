<?php
/*Crie uma função que receba um array de famílias, imprimindo todos os dados de cada
família: nome do pai, nome da mae, nome e idade de cada filho*/

    require_once("familia.php");

    class familias{

        //Impressão de Array de Familias
        public function imprimirFamilias($arrayFamilias){
            echo "<pre>";
            foreach($arrayFamilias as $indice => $valor1){
                echo "<pre>";   
                echo "Mãe: " . ($valor1->getMae()->getNome()) . "<br>";
                echo "Pai: " . ($valor1->getPai()->getNome()). "<br>";
                foreach($valor1->getFilhos() as $indice2=>$arr){                                    
                    echo "Filho: " . $arr->getNome() . "<br>";                   
                }
                echo "<hr>";
            }
            echo "</pre>";
        }


    }



?>