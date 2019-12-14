<?php

    require_once(__DIR__ . '/../model/produto.php');
    require_once(__DIR__ . '/../dao/produtoDAO.php');
    require_once(__DIR__ . '/../model/departamento.php');
    require_once(__DIR__ . '/../dao/departamentoDAO.php');
    require_once(__DIR__ . '/../db/db.php'); 
    require_once(__DIR__ . '/../Config/config.php');
    
    $conn = new Db(Config::db_host,Config::db_user,Config::db_password,Config::db_database);
    if ($conn->connect()) {
        $prodDao = new ProdutoDAO($conn);
        $depDAO = new DepartamentoDAO($conn);
        $deps = $depDAO->getDepartamentos();
        var_dump($deps);
        $produtos = [];
        $produtos[] = new Produto(null, "Mouse", "60", $deps[0]);
        $produtos[] = new Produto(null, "Celular", "620", $deps[1]);
        $produtos[] = new Produto(null, "Notebook G3", "4000", $deps[2]);
        $produtos[] = new Produto(null, "Fone Sony", "70", $deps[3]);

        foreach($produtos as $p){
            if($prodDao->salvarProduto($p)){
                echo "Registro inserido com sucesso!";
            }else{
                echo "Falha ao inserir registro";
            }
        }

        $prods = $prodDao->getProdutos();
        foreach($prods as $p){
            echo $p->getIdProduto() . " - " . 
                 $p->getNome() . " - " . 
                 $p->getDepartamentos()->getNome() . "<br>\n";
        }



    }else{
        echo "Erro ao conectar com o banco de dados";
    }
    
    
?>
