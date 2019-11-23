<?php

require_once('produto.php');

class VendaProduto{

    private $produto;
    private $quantidade;
    private $desconto;

    public function __construct(Produto $produto=null, $quantidade=0, $desconto=0)
    {
        $this->produto = $produto;
        $this->desconto = $desconto;
        $this->quantidade = $quantidade;
    }

    public function setProduto(Produto $produto){
        $this->produto = $produto;
    }

    public function getProduto(){
        return $this->produto;
    }

    public function setDesconto($desconto){
        $this->desconto = $desconto;
    }

    public function getDesconto(){
        return $this->desconto;
    }

    public function setQuantidade($quantidade){
        $this->quantidade = $quantidade;
    }

    public function getQuantidade(){
        return $this->quantidade;
    }


}




?>