<?php
/*Crie uma função que receba um array de famílias, imprimindo todos os dados de cada
família: nome do pai, nome da mae, nome e idade de cada filho*/

    require_once("familia.php");

    class familias{

        //Impressão de Array de Familias
        public function imprimirFamilias($arrayFamilias){
            
            foreach($arrayFamilias as $indice => $valor1){
                echo "<pre>";
                echo "1º foreach";
                echo "<br>Indice = ".$indice;
                foreach($valor1 as $indice2=>$arr){
                    print_r($arr);
                    echo "2º foreach";
                    /*foreach($arr as $agoravai){
                        print_r($agoravai);
                        echo "3º foreach";
                    }*/
                }
            }
            echo "</pre>";
        }


    }



?>