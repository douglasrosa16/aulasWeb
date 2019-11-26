<?php

    class exercicio{

        public function merge($array1, $array2){
            $arrayResultante = [];//Declaração de um array que será o resultado da união
            $arrayResultante = array_merge($array1, $array2); //Une dois arrays, coloca o segundo array no final do primeiro      
            return $arrayResultante;
        }

        
    }

?>