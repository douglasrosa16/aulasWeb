<?php

  require_once('db.php');
  require_once('product.php');

  class ProductDAO {
    
    private $con;

    public function __construct(Db $con) {
      $this->con = $con;
    }

    //Obter um array de produtos da tabela 'products'
    public function getProdutos() {
        if ($this->con->isConnected()) {    
          $sql = "SELECT id, name FROM products";
          $stmt = $this->con->prepare($sql);
          if ($stmt) {
            if ($stmt->execute()) {
              $stmt->bind_result($id, $name);
              $stmt->store_result();
              $produtos = [];
              while($stmt->fetch()) {
                $produtos[] = new Product($id, $name);
              }
              $stmt->close();
              return $produtos;
            }
          }
        }
        return [];
      }  

    //Buscar um Produto pelo ID
    public function buscarProduto($id){
      if($this->con->isConnected()){
        $sql = "SELECT id, name FROM products WHERE id = ?";
        $stmt = $this->con->prepare($sql);
        if($stmt){
          $stmt->bind_param("i",$id);
          if ($stmt->execute()){            
            $stmt->bind_result($id, $name);
            $stmt->store_result();
            $produto = null; 
            if($stmt->num_rows > 0){
              $stmt->fetch();
              $produto = new Product($id, $name);
            }
            $stmt->close();
            return $produto;
          }          
        }else{
          echo "Não foi possível executar esse comando";
        }
      }else{
        echo "Você não está conectado!";
        return null;
      }
    }

    //Inserir um novo produto
    public function inserir(Product $d) {
      if ($this->con->isConnected()) {
        $sql = "INSERT INTO products (name) VALUES(?)";
        $stmt = $this->con->prepare($sql);
        if ($stmt) {
          $nome = $d->getName();
          $stmt->bind_param('s',$nome);
          if ($stmt->execute()) {
            $id = $this->con->getLastID();
            $d->setId($id);
            $stmt->close();
            return $d;
          }
          $stmt->close();
        }
      }
      return null;      
    }

    
  }

?>