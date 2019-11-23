<?php

class Departamento{

    private $nomeDepartamento;

    public function __construct($nomeDepartamento = ""){
        $this->nomeDepartamento = $nomeDepartamento;
    }

    public function setNome($nomeDepartamento){
        $this->nomeDepartamento = $nomeDepartamento;
    }

    public function getNome(){
        return $this->nomeDepartamento;
    }

}

?>