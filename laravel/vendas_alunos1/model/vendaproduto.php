<?php

    require_once(__DIR__ . '/produto.php');

    class VendaProduto {
        
        private $idvenda;
        private $produto;
        private $quantidade;
        private $desconto;
        private $totalProduto;

        public function __construct($idvenda, Produto $produto, $quantidade, 
                                    $desconto, $totalProduto) {
            $this->idvenda      = $idvenda;
            $this->produto      = $produto;
            $this->quantidade   = $quantidade;
            $this->desconto     = $desconto;
            $this->totalProduto = $totalProduto;
        }
        
        public function setIdVenda($idvenda) {
            $this->idvenda        = $idvenda;
        }

        public function setProduto(Produto $produto) {
            $this->produto      = $produto;
        }

        public function setQuantidade($quantidade) {
            $this->quantidade   = $quantidade;
        }

        public function setDesconto($desconto) {
            $this->desconto     = $desconto;
        }

        public function setTotalProduto($totalProduto) {
            $this->totalProduto = $totalProduto;
        }

        public function getIdVenda() {
            return $this->idvenda;
        }

        public function getProduto() {
            return $this->produto;
        }

        public function getQuantidade() {
            return $this->quantidade;
        }

        public function getDesconto() {
            return $this->desconto;
        }

        public function getTotalProduto() {
            return $this->totalProduto;
        }
    };
?>
