<?php

    require_once(__DIR__ . "/../model/cliente.php");
    require_once(__DIR__ . "/../dao/clienteDAO.php");
    require_once(__DIR__ . "/../model/venda.php");
    require_once(__DIR__ . "/../dao/vendaDAO.php");
    require_once(__DIR__ . "/../model/produto.php");
    require_once(__DIR__ . "/../dao/produtoDAO.php");
    require_once(__DIR__ . "/../db/db.php"); 
    
    $conn = new Db("127.0.0.1","user","user123!@#","vendas");

    if ($conn->connect()) {

    }
    
    
?>

