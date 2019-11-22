<?php
  class Aluno {
    private $id;
    private $nome;
    private $cidade;
    private $idade;

    public function __construct($id=null, $nome=null, $cidade=null, $idade=null)
    {
      $this->id = $id;
      $this->nome = $nome;
      $this->cidade = $cidade;
      $this->idade = $idade;
    }
    public function setNome($nome) {
      $this->nome = $nome;
    }

    public function getNome() {
      return $this->nome;
    }
    
    public function setId($id) {
      $this->id = $id;
    }
    
    public function getId() {
      return $this->id;
    }
    
    public function setCidade($cidade){
        $this->cidade = $cidade;
    }
    
    public function getCidade(){
        return $this->cidade;
    }
    
    public function setIdade($idade){
        $this->idade = $idade;
    }
    
    public function getIdade(){
        return $this->idade;
    }
  }