<?php

    require_once("db.php");
    require_once("disciplina.php");
    Class DisciplinaDAO{

        private $con;
    
        public function __construct(Db $con){
            $this->con = $con;
        }

        public function getDisciplinas(){
            if($this->con->isConnected()){
                $sql = "SELECT id_disciplina, nome FROM disciplina";
                $stmt = $this->con->prepare($sql);
                if($stmt){
                    if($stmt->execute()){
                        $stmt->bind_result($id, $nome);
                        $stmt->store_result();
                        $disciplinas = [];
                        while($stmt->fetch()){
                            $disciplinas[] = new Disciplina($id, $nome); //Aqui vou criando objetos para cada consulta SQL
                        }
                    }                  
                    $stmt->close();
                    return $disciplinas;
                }else{
                    echo "Nenhum registro encontrado.";
                }
            }
        }

        public function inserir(Disciplina $disc){
            if($this->con->isConnected()){
                $sql = "INSERT INTO disciplina (nome) VALUES (?)";
                $stmt = $this->con->prepare($sql); 
                if($stmt){
                    $nome = $disc->getNome(); //isso aqui eu vou pegar quando o usuário informar uma disciplina pelo form
                    $stmt->bind_param("s",$nome);
                    if($stmt->execute()){
                        $id = $this->con->getLastId();
                        $disc->setId($id);                      
                    }
                    $stmt->close();
                    return $disc;
                }
        }

    }


    }

?>