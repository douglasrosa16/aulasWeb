<?php

    require_once(__DIR__ . '/../model/cliente.php');
    require_once(__DIR__ . '/../dao/clienteDAO.php');
    require_once(__DIR__ . '/../db/db.php'); 
    require_once(__DIR__ . '/../config/config.php');

    $conn = new Db(Config::db_host,Config::db_user,Config::db_password,Config::db_database);
    
    if ($conn->connect()) {

    }
    
    
?>

