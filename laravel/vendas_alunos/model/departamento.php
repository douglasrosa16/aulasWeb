<?php

class Departamento {

    private $idDepartamento;
    private $nome;

    public function __construct($idDepartamento, $nome)
    {
        $this->idDepartamento = $idDepartamento;
        $this->nome = $nome;
    }

    public function setIdDepartamento($idDepartamento) {
        $this->idDepartamento = $idDepartamento;
    }
    
    public function getIdDepartamento() {
        return $this->idDepartamento;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function getNome() {
        return $this->nome;
    }
}

?>