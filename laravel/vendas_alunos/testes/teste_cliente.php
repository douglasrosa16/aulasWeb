<?php
    //O DIR é minha referência absoluta do arquivo, posso chamar de qualquer lugar
    require_once(__DIR__ . '/../model/cliente.php');
    require_once(__DIR__ . '/../dao/clienteDAO.php');
    require_once(__DIR__ . '/../db/db.php'); 
    require_once(__DIR__ . '/../config/config.php');
    
    $conn = new Db(Config::db_host,Config::db_user,Config::db_password,Config::db_database);

    if ($conn->connect()) {
        $clienteDAO= new ClienteDAO($conn);
        $clientes = [];
        $clientes[] = new Cliente(null, "Douglas Rosa", "Rua I", "989898", "douglas.oliveira@gmail.com");
        $clientes[] = new Cliente(null, "Adao Rosa", "Rua 4 Marcos", "982138", "adao.oliveira@gmail.com");
        $clientes[] = new Cliente(null, "Vanessa Rosa", "Rua Atlantico", "9123398", "vanessa.oliveira@gmail.com");
        $clientes[] = new Cliente(null, "Diego Rosa", "Avenida Campo grande", "9412398", "diego.oliveira@gmail.com");
        $clientes[] = new Cliente(null, "Janice Clotilde", "RUa 4 Marcos", "9812312", "janice.oliveira@gmail.com");

        //Testando DAO
        $clientesDb = $clienteDAO->getClientes();
        foreach($clientesDb as $c){
            echo "<pre>";
            echo $c->getIdCliente() . " - " . $c->getNome() . "<br> \n";
            echo "</pre>";
        }

        $clientesDb[0]->setNome("Douglas ");
        $clienteDAO->salvarCliente($clientesDb[0]);

        $ultimoIndice = count($clientesDb)-1;
        $id = $clientesDb[ $ultimoIndice ]->getIdCliente();
        echo "Apagando cliente com ID = " . $id . "<br> \n";
        $clienteDAO->apagarCliente( $clientesDb[ $ultimoIndice ] );
    }else{
        echo "Erro de conexão";
    }
    
    
?>

