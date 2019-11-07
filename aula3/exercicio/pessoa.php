<?php

    class Pessoa{

        protected $nome;
        protected $idade;
        protected $cpf;

        public function __construct($nome = "", $idade=0, $cpf=""){
            $this->nome = $nome;
            $this->idade = $idade;
            $this->cpf = $cpf;
        }

        public function setNOme($nome){
            $this->nome = $nome;
        }
        public function getNome(){
            return $this->nome;
        }

        public function setIdade($idade){
            $this->idade = $idade;
        }
        public function getIdade(){
            return $this->idade;
        }

        public function setCpf($cpf){
            $this->cpf = $cpf;
        }
        public function getCpf(){
            return $this->cpf;
        }

        public function getHtml(){
            return "<p>Nome: " . $this->nome . ", " . 
                    " Idade: " . $this->idade . ", ".
                    " CPF: " . $this->cpf . "</p>";
        }
    }


?>