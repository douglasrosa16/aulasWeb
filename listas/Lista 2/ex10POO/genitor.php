<?php
    require_once("pessoa.php");
    require_once("filho.php");

    class genitor extends pessoa{

        private $filhos;//Um array de filhos 

        public function __construct($filhos=""){
          $this->filhos; //declarando array
        }

        public function addFilho(filho $f){
          //Adicionar um filho (vou passar um objeto aqui dentro)
          $this->filhos[] = $f;
        }

        public function removeFilho(filho $f){
          //Remover filho, vou ter que ver como passar um objeto e excluir ele do array
        }

        public function getFilhos(){
          //Imprimir TODOS os filhos, fazer um forach para isso
          foreach($this->filhos as $f){
            echo $f; //Cada filho do array
          }
        }

        public function setFilhos(filho $f){
          //Setar filhos, pelo o que eu entendi são mais de um (talvez um array?)
          $this->filhos[] = $f;
        }





    }



?>