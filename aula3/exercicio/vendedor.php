<?php

require_once("pessoa.php");

    Class Vendedor extends Pessoa{

        protected $salario;

        public function __construct($nome = "", $idade=0, $cpf="", $salario = 0){
            parent::__construct($nome, $idade, $cpf);
            $this->salario = $salario;
        }

        public function setSalario($salario){
            $this->salario = $salario;
        }

        public function getSalario(){
            return $this->salario;
        }
    }

?>