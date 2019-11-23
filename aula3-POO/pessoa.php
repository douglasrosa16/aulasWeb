<?php
class Pessoa {
    //Atributos da classe
    public $nome;
    public $idade;

    //Métodos da classe
    public function setNome($nome){
        $this->nome = $nome;
    }
    
    public function getNome(){
        return $this->nome;
    }

    public function setidade($idade){
        $this->idade = $idade;
    }

    public function getidade(){
        return $this->idade;
    }

    public function __sleep(){
        return array_keys(get_object_vars($this));
    }

    public function __wakeup(){
        
    }
    
}
?>