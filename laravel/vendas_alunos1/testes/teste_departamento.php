<?php

    require_once(__DIR__ . "/../db/db.php");
    require_once(__DIR__ . "/../model/departamento.php");
    require_once(__DIR__ . "/../dao/departamentoDAO.php");

    require_once(__DIR__ . "/../config/config.php");

    $conn = new Db(Config::db_host, Config::db_user, Config::db_password, Config::db_database);

    if ($conn->connect()) {
        $departamentoDAO = new DepartamentoDAO($conn);
        $departamentos = [];
        $departamentos[] = new Departamento(null, "Informatica");
        $departamentos[] = new Departamento(null, "Eletronicos");
        $departamentos[] = new Departamento(null, "Vestuario");
        $departamentos[] = new Departamento(null, "Alimentos");

        foreach($departamentos as $d){
            if($departamentoDAO->insereDepartamento($d)){
                echo "registro inserido <br> \n";
            }
            else{
                echo "erro ao inserir <br> \n";
            }
        }

        //Listar Todos
        $departamentosDb = $departamentoDAO->getDepartamentos();
        foreach($departamentosDb as $d){
            echo "ID: " . $d->getIdDepartamento() . " - Dep: " . $d->getNome() . "<br> \n"; 
        }
        
        //Alterar
        $departamentosDb[0]->setNome("Culinaria");
        $departamentoDAO->salvarDepartamento($departamentosDb[0]);
        
        //Apagar
        $ultimoIndice = count($departamentosDb) - 1;
        $id = $departamentosDb[ $ultimoIndice ]->getIdDepartamento();
        echo "Apagando Departamento com ID = " . $id . "<br> \n";
        $departamentoDAO->apagarDepartamento($departamentosDb[$ultimoIndice]);
    }
    else{
        echo "Erro";
    }

?>
