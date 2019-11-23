<?php

require_once('vendedor.php');
require_once('cliente.php');
require_once('vendaproduto.php');


    Class Venda{
        
        private $cliente;
        private $vendedor;
        private $itens;
        private $total;

        public function __construct(Cliente $cliente=null, Vendedor $vendedor=null){
            $this->cliente = $cliente;
            $this->vendedor = $vendedor;
            $this->itens = [];
            $this->total = 0;
        }

        public function addItem(VendaProduto $i){
            $this->itens[] = $i; //Adicionar itens no Array
            $this->total += $i->getProduto()->getPreco() * $i->getQuantidade();
        }

        public function setCliente($cliente){
            $this->cliente = $cliente;
        }

        public function getCliente(){
            return $this->cliente;
        }

        public function setVendedor($vendedor){
            $this->vendedor = $vendedor;
        }

        public function getVendedor(){
            return $this->vendedor;
        }

        public function setItens($itens){
            $this->itens = $itens;
        }

        public function getItens(){
            return $this->itens;
        }
        
        public function getTotal(){
            return $this->total;
        }
    }


?>