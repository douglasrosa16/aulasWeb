<?php

require_once("pessoa.php");

class Cliente extends Pessoa{
    
    protected $pontosDeFidelidade;

    public function __construct($nome = "", $idade = 0, $cpf = "", $pontos = 0){
        parent::__construct($nome, $idade, $cpf);
        $this->pontosDeFidelidade = $pontos;
        
    }

    public function setPontos($pontos){
        $this->pontosDeFidelidade = $pontos;
    }

    public function getPontos(){
        return $this->pontosDeFidelidade;
    }
    
}

?>