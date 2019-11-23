<?php

//Crie uma função que receba um array de strings e remova todos os elementos repetidos

    Class exercicio {
        /*
        --Para procurar um valor dentro do array
        if(in_array($valor, $arrayString)) {
            unset($arrayString[$indice]);
        }
        */

        public function repetidos($arrayString){
            $newArray = [];
            $newArray[] = array_unique($arrayString); //Remove todos os itens repetidos
            echo "Array Normal ";
            var_dump($arrayString);
            
            return $newArray;

        }


    }
    


?>