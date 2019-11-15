<?php

  require_once('db.php');
  require_once('disciplina.php');
  require_once('disciplinaDAO.php');

  $db = new Db("localhost", "root", "", "alunos");

  if ($db->connect()) {
    echo "Conexão OK!";

    $dao = new DisciplinaDAO($db);

    $dao->inserir(new Disciplina(null, "Arquitetura de Computadores"));
    $dao->inserir(new Disciplina(null, "Estrutura de Dados"));
    $dao->inserir(new Disciplina(null, "Sistemas Operacionais"));
    $dao->inserir(new Disciplina(null, "Redes de Computadores"));

    $disciplinas = $dao->getDisciplinas();

    echo "<pre>";
    var_dump($disciplinas);
  }
  else  
    echo "Erro na conexão com o MySQL";