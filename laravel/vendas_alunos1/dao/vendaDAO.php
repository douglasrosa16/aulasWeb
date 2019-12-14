<?php

    require_once(__DIR__ . '/../model/cliente.php');
    require_once(__DIR__ . '/../model/venda.php');
    require_once(__DIR__ . '/../model/vendaproduto.php');
    require_once(__DIR__ . '/../model/produto.php');
    require_once(__DIR__ . '/../db/db.php');
    require_once(__DIR__ . '/vendaprodutoDAO.php');
    require_once(__DIR__ . '/clienteDAO.php');


    // Classe para persistencia de Vendas 
    // DAO - Data Access Object
    class VendaDAO {
        
        private $connection;

        public function __construct(Db $db) {
            $this->connection = $db;
        }
        
        public function getVendaByID($idVenda) {
            $sql = "SELECT id_venda, id_cliente, total ".
                   "FROM venda WHERE id_venda = ?";
            
            if ($this->connection->isConnected()) {
                
                $stmt = $this->connection->prepare($sql);
                $stmt->bind_param('i',$idVenda);
                $stmt->execute();
                $stmt->bind_result($idVenda, $idCliente, $total);
        
                $res = $stmt->store_result();
                if ($stmt->num_rows > 0) {
                    $stmt->fetch();
                    $clienteDAO = new ClienteDAO($this->connection);
                    if (isset($idCliente)) {
                        $cliente = $clienteDAO->getClienteByID($idCliente);
                        if (isset($cliente)) {
                            $venda = new Venda( $idVenda, $cliente, $total);
                            $vendaProdutoDAO = new VendaProdutoDAO($this->connection);
                            $venda->setProdutos( $vendaProdutoDAO->getVendaProdutosByVenda($venda) );
                            $stmt->close();
                            return $venda;
                        }
                    }
                }
                $stmt->close();
            }
            return null;
        }

        public function insereVenda(Venda $venda) {
            
            $sql = "INSERT INTO venda (id_cliente, total) VALUES(?,?)";
            
            if (!isset($venda))
                return null;

            if ($this->connection->isConnected()) {
                
                $stmt = $this->connection->prepare($sql);
                
                if (isset($stmt)) {
                    $idCliente = $venda->getCliente()->getIdCliente();
                    $total     = $venda->getTotal();

                    $stmt->bind_param('id', $idCliente, $total);

                    if ($stmt->execute()) {
                        $lastID = $this->connection->getLastID();
                        $venda->setIdVenda($lastID);
                        $this->salvaProdutos($venda);
                        $stmt->close();

                        return $venda;
                    }

                    $stmt->close();
                }
            }
            return null;
        }
        
        private function salvaProdutos(Venda $venda) {
            if ($this->connection->isConnected()) {
                $vendaProdutos = $venda->getProdutos(); 
                $vendaProdutoDAO = new VendaProdutoDAO($this->connection);

                foreach($vendaProdutos as $prod) {
                    $prod->setIdVenda($venda->getIdVenda());

                    if ($vendaProdutoDAO->existe($prod))
                        $vendaProdutoDAO->salvaVendaProduto($prod);
                    else
                        $vendaProdutoDAO->insereVendaProduto($prod);
                }
            }
        }

        public function apagaVenda(Venda $venda) {
            $sql = "DELETE from venda where id_venda = ?";
            
            if ($this->connection->isConnected()) {
                $idVenda = $venda->getIdVenda(); 
                $stmt = $this->connection->prepare($sql);
                $stmt->bind_param('i',$idVenda);
                $res = $stmt->execute();
                $stmt->close();
                return $res;
            }
            return false;
        }

        public function salvaVenda(Venda $venda) {
            
            $sql = "UPDATE venda SET id_cliente = ?, total = ? " . 
                   "WHERE id_venda = ?";
            if ($this->connection->isConnected()) {
                
                // salvar os produtos da venda
                $this->salvaProdutos($venda);
                
                $stmt = $this->connection->prepare($sql);
                
                if (isset($stmt)) {
                    $idCliente = $venda->getCliente()->getIdCliente();
                    $total     = $venda->getTotal();
                    $idVenda   = $venda->getIdVenda();

                    $stmt->bind_param('idi', $idCliente, $total, $idVenda);
                    $res = $stmt->execute();
                    $stmt->close();
                    return $res;
                }
            }
            return false;
        }

        public function getVendas() {
            $sql = "SELECT id_venda, id_cliente, total FROM venda";
            $res = array();

            if ($this->connection->isConnected()) {
                
                $stmt = $this->connection->prepare($sql);
                $stmt->execute();
                $stmt->bind_result($idVenda, $idCliente, $total);
                $stmt->store_result();

                if ($stmt->num_rows > 0) {
                    $clienteDAO = new ClienteDAO($this->connection);
                    
                    while ($stmt->fetch()) {
                        if (isset($idCliente)) {
                            $cliente = $clienteDAO->getClienteByID($idCliente);
                            if (isset($cliente))
                                $res[] = new Venda($idVenda, $cliente, $total);
                        }
                    }
                }

                $stmt->close();
            }

            return $res;
        }

    };

?>
