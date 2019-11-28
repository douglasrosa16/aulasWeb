<?php

  require_once("genitor.php");
  require_once("filho.php");

  class familia{

      private $filhos;
      private $pai;
      private $mae;

      public function __construct($filhos=[], $pai=null, $mae=null){
        $this->filhos = [];
        $this->pai = $pai;  
        $this->mae = $mae;        
      }

      public function setFilhos($newFilhos){
        $this->filhos = $newFilhos;
      }

      public function getFilhos(){
        return $this->filhos;
        /*foreach($this->filhos as $f){
          echo "Filhos: " . $f . "<br>";
        }*/
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