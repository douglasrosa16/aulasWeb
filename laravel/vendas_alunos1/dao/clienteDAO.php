<?php

    require_once(__DIR__ . '/../model/cliente.php');
    require_once(__DIR__ . '/../db/db.php');


    // Classe para persistencia de Clientes 
    // DAO - Data Access Object
    class ClienteDAO {
        
        private $connection;

        public function __construct(Db $db) {
            $this->connection = $db;
        }
        
        public function getClienteByID($idCliente) {
            $sql = "SELECT id_cliente, nome, endereco, telefone, ".
                   " email FROM cliente WHERE id_cliente = ?";
            
            if ($this->connection->isConnected()) {
                
                $stmt = $this->connection->prepare($sql);
                $stmt->bind_param('i',$idCliente);
                $stmt->execute();
                $stmt->bind_result($idCliente, $nome, 
                    $endereco, $telefone, $email);
        
                $res = $stmt->store_result();
                if ($stmt->num_rows > 0) {
                    $stmt->fetch();
                    return new Cliente( $idCliente, $nome, 
                                        $endereco, $telefone, $email );
                }
                $stmt->close();
            }
            return null;
        }

        public function insereCliente(Cliente $cliente) {
            
            $sql = "INSERT INTO cliente (nome, endereco, " . 
                   " telefone, email) VALUES(?,?,?,?)";
            
            if ($this->connection->isConnected()) {
                
                $stmt = $this->connection->prepare($sql);
                
                if (isset($stmt)) {
                    $nome     = $cliente->getNome();
                    $endereco = $cliente->getEndereco();
                    $telefone = $cliente->getTelefone();
                    $email    = $cliente->getEmail();

                    $stmt->bind_param('ssss', 
                                      $nome, $endereco, $telefone, $email);

                    if ($stmt->execute()) {
                        $lastID = $this->connection->getLastID();
                        $cliente->setIdCliente($lastID);
                        return $cliente;
                    }

                    $stmt->close();
                }
            }
            return null;
        }

        public function apagarCliente(Cliente $cliente) {
            $sql = "DELETE from cliente where id_cliente = ?";
            
            if ($this->connection->isConnected()) {
                $idCliente = $cliente->getIdCliente(); 
                $stmt = $this->connection->prepare($sql);
                $stmt->bind_param('i',$idCliente);
                return $stmt->execute();
            }
            return false;
        }

        public function salvarCliente(Cliente $cliente) {
            
            $sql = "UPDATE cliente SET nome = ?, endereco= ?, " . 
                   "telefone = ?, email = ? WHERE id_cliente = ?";
            
            if ($this->connection->isConnected()) {
                
                $stmt = $this->connection->prepare($sql);
                
                if (isset($stmt)) {
                    $idCliente = $cliente->getIdCliente();
                    $nome      = $cliente->getNome();
                    $endereco  = $cliente->getEndereco();
                    $telefone  = $cliente->getTelefone();
                    $email     = $cliente->getEmail();

                    $stmt->bind_param('ssssi', $nome, $endereco, 
                                      $telefone, $email, $idCliente);
                    if ($stmt->execute()) {
                        return true;
                    }
                }
            }
            return false;
        }

        public function getClientes() {
            $sql = "SELECT id_cliente, nome, endereco, telefone, ".
                   " email FROM cliente";
            
            $res = array();

            if ($this->connection->isConnected()) {
                
                $stmt = $this->connection->prepare($sql);
                $stmt->execute();
                $stmt->bind_result($idCliente, $nome, 
                    $endereco, $telefone, $email);
        
                $stmt->store_result();
                if ($stmt->num_rows > 0) {
                    while ($stmt->fetch()) {
                        $res[] = new Cliente($idCliente, $nome, 
                                             $endereco, $telefone, 
                                             $email);
                    }
                }
                $stmt->close();
            }
            return $res;
        }

    };

?>
