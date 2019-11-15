<?php

    Class Disciplina{

        private $id;
        private $nome;

        public function __construct($id=null, $nome=null){
            $this->id = $id;
            $this->nome = $nome;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }

        public function getNome(){
            return $this->nome;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getId(){
            return $this->id;
        }



    }   