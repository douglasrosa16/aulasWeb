<?php
/*1. Crie uma função que receba dois parâmetros: um array de strings e uma string. Remova
todos elementos do array que são iguais a string passada como parâmetro (utilize o unset).
Retorne o array como resultado. */

Class exercicio{

    public function removeIguais($arrayString, $nome){
        foreach($arrayString as $array){
            if($array == $nome){
                var_dump($array);
                unset($array);
            }
        }
        return $arrayString;

    }


}
?>