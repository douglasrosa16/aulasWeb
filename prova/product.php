<?php

    class Product{

        private $id;
        private $name;

        public function __construct($id=0, $name=""){
            $this->id = $id;
            $this->name = $name;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getId(){
            return $this->id;
        }

        public function setName($name){
            $this->name = $name;
        }

        public function getName(){
            return $this->name;
        }





    }


?>