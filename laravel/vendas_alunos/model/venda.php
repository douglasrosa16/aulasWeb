<?php
    
    require_once(__DIR__ . '/vendaproduto.php');
    require_once(__DIR__ . '/produto.php');
    require_once(__DIR__ . '/cliente.php');
    
    class Venda {
        
        private $idVenda;
        private $total;
        private $cliente;
        private $produtos;

        public function __construct($idVenda, Cliente $cliente, $total=0) {
            $this->idVenda = $idVenda;
            $this->cliente = $cliente;
            $this->total   = $total;
            $this->produtos = [];
        }

        public function setIdVenda($idVenda) {
            $this->idVenda = $idVenda;
        }

        public function setCliente($cliente) {
            $this->cliente = $cliente;
        }

        public function setTotal($total) {
            $this->total = $total;
        }

        public function setProdutos($produtos) {
            $this->produtos = $produtos;
        }

        public function addProduto(Produto $produto, int $quantidade, float $desconto) {
            $preco = $produto->getPreco() * $quantidade * (1 - $desconto);
            $p = new VendaProduto($this->idVenda, $produto, $quantidade, $desconto, $preco); 
            $this->produtos[] = $p;
            $this->total += $preco;
            echo "$this->total \n";
        }

        public function getIdVenda() {
            return $this->idVenda;
        }

        public function getCliente() {
            return $this->cliente;
        }

        public function getTotal() {
            return $this->total;
        }

        public function getProdutos() {
            return $this->produtos;
        }

    };
?>
