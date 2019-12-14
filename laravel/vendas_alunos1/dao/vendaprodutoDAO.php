<?php
    require_once(__DIR__ . '/../model/venda.php');
    require_once(__DIR__ . '/../model/produto.php');
    require_once(__DIR__ . '/../model/vendaproduto.php');
    require_once(__DIR__ . '/produtoDAO.php');
    require_once(__DIR__ . '/../db/db.php');

    // Classe para persistencia de Venda Produto 
    // DAO - Data Access Object
    class VendaProdutoDAO {
        
        private $connection;

        public function __construct(Db $db) {
            $this->connection = $db;
        }
        
        public function getVendaProdutosByVenda(Venda $venda) {
            $sql = "SELECT id_produto, quantidade, desconto, total_produto ".
                   "FROM venda_produto WHERE id_venda = ?";
            $vendaProdutos = array();

            if (!isset($venda))
                return $vendaProdutos;

            if ($this->connection->isConnected()) {
                
                $stmt = $this->connection->prepare($sql);
                $idVenda = $venda->getIdVenda();
                $stmt->bind_param('i',$idVenda);
                $stmt->execute();
                $stmt->bind_result($idProduto, $quantidade, 
                                   $desconto, $totalProduto);
        
                $res = $stmt->store_result();

                if ($stmt->num_rows > 0) {
                    while ($stmt->fetch()) {
                        $produtoDAO = new ProdutoDAO($this->connection);
                        if (isset($idProduto)) {
                            $produto = $produtoDAO->getProdutoByID($idProduto);
                            if (isset($produto))
                                $vendaProdutos[] =  new VendaProduto($idVenda, 
                                                                     $produto,
                                                                     $quantidade,
                                                                     $desconto,
                                                                     $totalProduto);
                        }
                    }
                }
                $stmt->close();
            }
            return $vendaProdutos;
        }

        public function insereVendaProduto(VendaProduto $vendaProduto) {
            
            $sql = "INSERT INTO venda_produto ".
                   "(id_venda, id_produto, quantidade, desconto," .
                   " total_produto) VALUES (?,?,?,?,?) ";
            
            if (!isset($vendaProduto))
                return null;

            if ($this->connection->isConnected()) {
                
                $stmt = $this->connection->prepare($sql);
                
                if (isset($stmt)) {
                    $idVenda      = $vendaProduto->getIdVenda();
                    $idProduto    = $vendaProduto->getProduto()->getIdProduto();
                    $quantidade   = $vendaProduto->getQuantidade();
                    $desconto     = $vendaProduto->getDesconto();
                    $totalProduto = $vendaProduto->getTotalProduto();

                    $stmt->bind_param('iiidd', $idVenda, $idProduto, 
                                               $quantidade, $desconto, 
                                               $totalProduto);

                    if ($stmt->execute()) {
                        return $vendaProduto;
                    }

                    $stmt->close();
                }
            }
            return null;
        }

        public function apagaVendaProduto(VendaProduto $vendaProduto) {
            $sql = "DELETE from venda_produto where id_venda = ? " . 
                   "and id_produto = ?";

            if (!isset($vendaProduto))
                return false;
            if ($this->connection->isConnected()) {
                $idVenda    = $vendaProduto->getIdVenda(); 
                $idProduto  = $vendaProduto->getProduto()->getIdProduto(); 
                $stmt       = $this->connection->prepare($sql);
                $stmt->bind_param('ii',$idVenda, $idProduto);
                return $stmt->execute();
            }

            return false;
        }

        public function salvaVendaProduto(VendaProduto $vendaProduto) {
            
            $sql = "UPDATE venda_produto SET desconto = ?, " . 
                   "quantidade = ?, total_produto = ? " . 
                   "WHERE id_venda = ? and id_produto = ?";
            
            if ($this->connection->isConnected()) {
                
                $stmt = $this->connection->prepare($sql);
                
                if (isset($stmt)) {
                    $idProduto  = $vendaProduto->getProduto()->getIdProduto();
                    $total      = $vendaProduto->getTotalProduto();
                    $idVenda    = $vendaProduto->getIdVenda();
                    $desconto   = $vendaProduto->getDesconto();
                    $quantidade = $vendaProduto->getQuantidade();

                    $stmt->bind_param('didii', $desconto, $quantidade, 
                                      $total, $idVenda, $idProduto);
                    return $stmt->execute();
                }
            }
            return false;
        }

        public function existe(VendaProduto $vendaProduto) {

            $sql = "SELECT id_venda, id_produto, total_produto FROM ".
                   "venda_produto WHERE id_venda = ? and id_produto = ?";

            if ($this->connection->isConnected()) {
                
                $idProduto  = $vendaProduto->getProduto()->getIdProduto();
                $idVenda    = $vendaProduto->getIdVenda();

                $stmt = $this->connection->prepare($sql);
                $stmt->bind_param('ii', $idVenda, $idProduto);
                $stmt->execute();
                $stmt->store_result();
                $res = $stmt->num_rows > 0;
                $stmt->close();
                return $res;
            }

            return false;
        }

    };

?>
