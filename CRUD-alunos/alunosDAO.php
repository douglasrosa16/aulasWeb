<?php 
    require_once('alunos.php');
    require_once('db.php');

    Class alunosDAO{

        private $con;

        public function __construct($con){
            $this->con = $con;
        }

        //Imprimir todos os alunos
        public function imprimirAlunos(){
            if($this->con->isConnected()){
                $sql = "SELECT id_aluno, nome, cidade, idade FROM ALUNO";
                $stmt = $this->con->prepare($sql);
                if($stmt->execute()){
                    $stmt->bind_result($id_aluno, $nome, $cidade, $idade);
                    $stmt->store_result();
                    $alunos = [];
                while($stmt->fetch()) {
                    $alunos[] = new Aluno($id_aluno, $nome, $cidade, $idade);                    
                }  
                foreach($alunos as $a){
                    echo $a->getNome();
                }             
            $stmt->close();
            return $alunos;                 
            }
        return null;
        $stmt->close();
        }
    }
        

        //Inserir um novo aluno
        public function inserir(Aluno $a){
            if ($this->con->isConnected()){
                $sql = "INSERT INTO aluno (nome, idade, cidade) VALUES (?,?,?)";
                $stmt = $this->con->prepare($sql);
                if($stmt){
                    $nome = $a->getNome();
                    $idade = $a->getIdade();
                    $cidade = $a->getCidade();                    
                    $stmt->bind_param("sis",$nome,$idade,$cidade);
                    if($stmt->execute()){
                        $id = $this->con->getLastId(); //Buscar o último ID e inserir o próximo
                        $a->setId($id);
                        $stmt->close();
                        return $a;
                    }
                    $stmt->close();
                }                
                return null;
            }else{
                echo "Você não está conectado";
                header("Locaction: alunos_view.php");
            }
            return null;    
        }

    }


?>