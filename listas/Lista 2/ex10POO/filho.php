<?php

    require_once("pessoa.php");
    require_once("genitor.php");
    class filho extends pessoa{

        private $pai;
        private $mae;

        public function __construct($pai=null, $mae=null){
          $this->pai = $pai;
          $this->mae = $mae;
        }

        public function setPai(genitor $pai){
          $this->pai = $pai;
        }

        public function getPai(){
          return $this->pai;
        }

        public function setMae(genitor $mae){
          $this->mae = $mae;
        }

        public function getMae(){
          return $this->mae;
        }


    }




?>