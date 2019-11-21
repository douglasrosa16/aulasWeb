<?php
  require_once('db.php');
  require_once('disciplina.php');

  class DisciplinaDAO {
    
    private $con;

    public function __construct(Db $con) {
      $this->con = $con;
    }

    //Imprimir todas as disciplinas
    public function getDisciplinas() {
      if ($this->con->isConnected()) {
        $sql = "SELECT id_disciplina, nome FROM disciplina";
        $stmt = $this->con->prepare($sql);
        if ($stmt) {
          if ($stmt->execute()) {
            $stmt->bind_result($id, $nome);
            $stmt->store_result();
            $disciplinas = [];
            while($stmt->fetch()) {
              $disciplinas[] = new Disciplina($id, $nome);
            }
            $stmt->close();
            return $disciplinas;
          }
        }
      }
      return [];
    }

    //Buscar uma Disciplina Específica
    public function buscarDisciplina($id){
      if($this->con->isConnected()){
        $sql = "SELECT id_disciplina, nome FROM disciplina WHERE id_disciplina = ?";
        $stmt = $this->con->prepare($sql);
        if($stmt){
          if ($stmt->execute()){
            $stmt->bind_result($id_disciplina, $nome);
            $stmt->store_result();
            $disciplina = new Disciplina($id, $nome);
            $stmt->close();
            return $disciplina;
          }          
        }else{
          echo "Não foi possível executar esse comando";
        }
      }else{
        echo "Você não está conectado!";
      }
    }

    //Inserir novas disciplinas
    public function inserir(Disciplina $d) {
      if ($this->con->isConnected()) {
        $sql = "INSERT INTO disciplina (nome) VALUES(?)";
        $stmt = $this->con->prepare($sql);
        if ($stmt) {
          $nome = $d->getNome();
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

    //Apagar disciplinas
    public function apagar(Disciplina $d){
      if($this->con->isConnected()){
        $sql = "DELETE FROM disciplina WHERE id_disciplina = ?";
        $stmt = $this->con->prepare($sql);
        $id = $d->getId();
        if($stmt){
          $stmt->bind_param('s',$id);
          $stmt->execute();
          $stmt->close();
        }else{
          $stmt->close();
          echo "Ocorreu um erro na Exclusão";
        }
        header("Location: disciplinas_template.php");
      }else{
        echo "Você não está conectado!";
      }
    }

    public function update(Disciplina $d, $Varnome){
      if($this->con->isConnected()){
        $sql = "UPDATE disciplina SET nome = ? WHERE id_disciplina = ?";
        $stmt = $this->con->prepare($sql);
        if($stmt){
          $stmt->bind_param('ss', $d->getId(),$Varnome);
          $stmt->execute();
          $stmt->close();
        }else{
          $stmt->close();
        }
        header("Location: disciplinas_template.php");
      }else{
        echo "Erro ao conectar";
      }
    }
  }