<?php

require_once('disciplina.php');
require_once('db.php');
require_once('disciplinaDAO.php');

$db = new Db("localhost", "root", "", "alunos");

if ($db->connect()){
    echo "Conexão deu certo";
    
    $dao = new DisciplinaDAO($db);

    $dao->inserir(new Disciplina($db));
    $dao->inserir(new Disciplina(null, "Estrutura de Computadores"));
    $dao->inserir(new Disciplina(null, "Estrutura de Dados"));
    $dao->inserir(new Disciplina(null, "Estrutura de Redes"));
    $dao->inserir(new Disciplina(null, "Estrutura de Web"));
    


    $disciplinas = $dao->getDisciplinas();
    echo "<pre>";
    var_dump($disciplinas);

}else{
    echo "Deu erro ai meu irmão";
}

?>