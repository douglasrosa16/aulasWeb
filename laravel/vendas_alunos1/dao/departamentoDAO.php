<?php
    require_once(__DIR__ . '/../db/db.php');
    require_once(__DIR__ . '/../model/departamento.php');

    class DepartamentoDAO {

        private $connection;

        public function __construct(Db $db)
        {
            $this->connection = $db;
        }

        public function insereDepartamento(Departamento $dep) {
            if ($this->connection->isConnected()) {
                $sql = "INSERT INTO departamento (nome) VALUES (?)";
                $stmt = $this->connection->prepare($sql);
                if (isset($stmt)) {
                    $nome = $dep->getNome();
                    $stmt->bind_param("s", $nome);
                    if ($stmt->execute()) {
                        $lastID = $this->connection->getLastID();
                        $dep->setIdDepartamento($lastID);
                        $stmt->close();
                        return $dep;
                    }
                    $stmt->close();
                }
            }
            return null;
        }

        public function apagarDepartamento(Departamento $dep) {
            if ($this->connection->isConnected()) {
                $sql = "DELETE FROM departamento WHERE id_departamento = ?";
                $idDepartamento = $dep->getIdDepartamento();
                $stmt = $this->connection->prepare($sql);
                $stmt->bind_param("i", $idDepartamento );
                $res = $stmt->execute();
                $stmt->close();
                return $res;
            }
            return false;
        }

        public function salvarDepartamento(Departamento $dep) {
            if ($this->connection->isConnected()) {
                $sql = "UPDATE departamento SET nome=? WHERE id_departamento=?";
                $stmt = $this->connection->prepare($sql);
                if (isset($stmt)) {
                    $nome = $dep->getNome();
                    $idDepartamento = $dep->getIdDepartamento();
                    $stmt->bind_param("si", $nome, $idDepartamento);
                    $res = $stmt->execute();
                    $stmt->close();
                    return $res;
                }
            }
            return null;
        }

        public function getDepartamentos() {
            if ($this->connection->isConnected()) {
                $sql = "SELECT id_departamento, nome FROM departamento";
                $stmt = $this->connection->prepare($sql);
                if (isset($stmt)) {
                    $stmt->execute();
                    $stmt->bind_result($idDepartamento, $nome);
                    $res = $stmt->store_result();
                    $departamentos = [];
                    if ($stmt->num_rows > 0) {
                        while($stmt->fetch()) {
                            $departamentos[] = new Departamento($idDepartamento,$nome);
                        }
                    }
                    $stmt->close();
                    return $departamentos;
                }
            }
            return [];
        }
        
        public function getDepartamentoById($idDepartamento) {
            if ($this->connection->isConnected()) {
                $sql = "SELECT id_departamento, nome from departamento " .
                       "WHERE id_departamento = ?";
                $stmt = $this->connection->prepare($sql);
                if(isset($stmt)) {
                    $stmt->bind_param("i", $idDepartamento);
                    $stmt->execute();
                    $stmt->bind_result($id, $nome);
                    $stmt->store_result();
                    if ($stmt->num_rows>0) {
                        if ($stmt->fetch()) {
                            $dep = new Departamento($id, $nome);
                            $stmt->close();
                            return $dep;
                        }
                    }
                    $stmt->close();
                }
            }        
            return null;
        }
    }


?>
