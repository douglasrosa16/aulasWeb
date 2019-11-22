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
          $stmt->bind_param("i",$id);
          if ($stmt->execute()){            
            $stmt->bind_result($id_disciplina, $nome);
            $stmt->store_result();
            $disciplina = null; //vai retornar ela caso ela seja zero
            if($stmt->num_rows > 0){
              $stmt->fetch();
              $disciplina = new Disciplina($id_disciplina, $nome);
            }
            $stmt->close();
            return $disciplina;
          }          
        }else{
          echo "Não foi possível executar esse comando";
        }
      }else{
        echo "Você não está conectado!";
        return null;
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
          $res = $stmt->execute(); //retornar um valor que conseguiu apagar
          $stmt->close();
        }else{
          return false;
          $stmt->close();
          echo "Ocorreu um erro na Exclusão";
        }
        header("Location: disciplinas_template.php");
      }else{
        echo "Você não está conectado!";
      }
    }

    public function update(Disciplina $d){
      if($this->con->isConnected()){
        $sql = "UPDATE disciplina SET nome = ? WHERE id_disciplina = ?";
        $stmt = $this->con->prepare($sql);
        if($stmt){
          $nome = $d->getNome();
          $id = $d->getId();
          $stmt->bind_param('ss', $nome, $id);
          if($stmt->execute()){
            $res = $stmt->execute();
            $stmt->close();
            return $res;
          }         
        }else{
          $stmt->close();
        }
        header("Location: disciplinas_template.php");
      }else{
        echo "Erro ao conectar";
        return false;
      }
    }
  }