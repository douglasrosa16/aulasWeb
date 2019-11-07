<?php

require_once("Departamento.php");

class Produto{

    private $nome;
    private $preco;
    private $departamento;

    public function __construct($nome = "", $preco = 0, Departamento $departamento = null){
        $this->nome = $nome;
        $this->preco = $preco;
        $this->departamento = $departamento;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getnome(){
        return $this->nome;
    }

    public function setPreco($preco){
        $this->preco = $preco;
    }

    public function getPreco(){
        return $this->preco;
    }
    public function setDepartamento(Departamento $departamento){
        $this->departamento = $departamento;
    }

    public function getDepartamento(){
        return $this->departamento;
    }


}

?>