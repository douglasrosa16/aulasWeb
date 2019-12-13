<?php
    
    require_once(__DIR__ . '/../model/produto.php');
    require_once(__DIR__ . '/../dao/departamentoDAO.php');
    require_once(__DIR__ . '/../db/db.php');


    // Classe para persistencia de Produtos
    // DAO - Data Access Object
    class ProdutoDAO {
        
        private $connection;

        public function __construct(Db $db) {
            $this->connection = $db;
        }
        
        public function getProdutoByID($idProduto) {
            $sql = "SELECT id_produto, nome, preco, id_departamento from produto where id_produto = ?";
            
            if ($this->connection->isConnected()) {
                
                $stmt = $this->connection->prepare($sql);
                $stmt->bind_param('i',$idProduto);
                $stmt->execute();
                $stmt->bind_result($idProduto, $nome, $preco, $idDepartamento);
        
                $res = $stmt->store_result();
                if ($stmt->num_rows > 0) {
                    $stmt->fetch();

                    $depDAO = new DepartamentoDAO($this->connection);  
                    $dep = $depDAO->getDepartamentoByID($idDepartamento);

                    return new Produto($idProduto, $nome, $preco, $dep);
                }
                $stmt->close();
            }
            return null;
        }

        public function insereProduto(Produto $produto) {
            
            $sql = "INSERT INTO produto (nome, preco, id_departamento) " .
                   "VALUES( ?, ?, ?) ";
            
            if ($this->connection->isConnected()) {
                
                $stmt = $this->connection->prepare($sql);
                
                if (isset($stmt)) {
                    $nome           = $produto->getNome();
                    $preco          = $produto->getPreco();
                    $idDepartamento = $produto->getDepartamento()->getIdDepartamento();

                    $stmt->bind_param('sdi', $nome, $preco, $idDepartamento);
                    if ($stmt->execute()) {
                        $lastID = $this->connection->getLastID();
                        $produto->setIdProduto($lastID);
                        return $produto;
                    }

                    $stmt->close();
                }
            }
            return null;
        }

        public function apagarProduto(Produto $produto) {
            $sql = "DELETE from produto where id_produto = ?";
            
            if ($this->connection->isConnected() && isset($produto)) {
                $idProduto = $produto->getIdProduto(); 
                $stmt = $this->connection->prepare($sql);
                $stmt->bind_param('i',$idProduto);
                return $stmt->execute();
            }
            return false;
        }

        public function salvarProduto(Produto $produto) {
            
            $sql = "UPDATE produto SET nome = ?, preco = ?, " . 
                   "id_departamento = ? WHERE id_produto = ?";
            
            if ($this->connection->isConnected()) {
                
                $stmt = $this->connection->prepare($sql);
                
                if (isset($stmt)) {
                    $nome           = $produto->getNome();
                    $preco          = $produto->getPreco();
                    $idDepartamento = $produto->getDepartamento()->getIdDepartamento();
                    $idProduto      = $produto->getIdProduto();

                    $stmt->bind_param('sdii', $nome, $preco, $idDepartamento, $idProduto);
                    if ($stmt->execute()) {
                        return true;
                    }
                }
            }
            return false;
        }

        
        public function getProdutos() {
            $sql = "SELECT id_produto, nome, preco, id_departamento from produto ";
            $produtos = array(); 
            if ($this->connection->isConnected()) {
                
                $stmt = $this->connection->prepare($sql);
                $stmt->execute();
                $stmt->bind_result($idProduto, $nome, $preco, $idDepartamento);
        
                $res = $stmt->store_result();
                if ($stmt->num_rows > 0) {

                    while ($stmt->fetch()) {
                        $depDAO = new DepartamentoDAO($this->connection);  
                        $dep = $depDAO->getDepartamentoByID($idDepartamento);
                        $produtos[] = new Produto($idProduto, $nome, $preco, $dep);
                    }
                }
                $stmt->close();
            }
            return $produtos;
        }


    };

?>
