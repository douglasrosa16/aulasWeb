<?php

    require_once(__DIR__ . "/../db/db.php");
    require_once(__DIR__ . "/../model/departamento.php");
    require_once(__DIR__ . "/../dao/departamentoDAO.php");
    require_once(__DIR__ . "/../model/produto.php");
    require_once(__DIR__ . "/../dao/produtoDAO.php");
    require_once(__DIR__ . "/../config/config.php");

    $conn = new Db(Config::db_host,Config::db_user,Config::db_password,Config::db_database);
    if ($conn->connect()) {
        $depDAO = new DepartamentoDAO($conn);
        $prodDAO = new ProdutoDAO($conn);
        $departamentos = $depDAO->getDepartamentos();
        $produtos = $prodDAO->getProdutos();


    }else{
        echo "Não foi possível conectar";
        die();
    }


?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Produtos</title>
  </head>
  <body>
      
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Vendas</a>
        <button class="navbar-toggler" 
            type="button" data-toggle="collapse" data-target="#navbarText" 
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="departamentos.php">Departamentos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="clientes.php">Clientes</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="produtos.php">Produtos <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <span class="navbar-text">
            </span>
        </div>
    </nav>
  
    <div class="container">
        <div class="py-5 text-center">
            <h2>Cadastro de Produtos</h2>
        </div>
        <div class="row">
            <div class="col-md-12" >
                <div class="card p-2 my-4">
                    <form action="produtos.php" method="POST">
                        <input type="hidden" name="idProduto" value=""  >

                        <div class="form-group">
                            <label for="nome">Nome do Produto</label>
                            <input type="text" class="form-control" id="nome"
                                value="" 
                                name="nome" placeholder="Nome do Produto" required>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                              <label for="preco">Preço </label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend">R$</span>
                                </div>
                                <input type="number" class="form-control" placeholder="1.00" step="0.01" min="0" id="preco"
                                    value=""
                                    name="preco" placeholder="Preço" aria-describedby="inputGroupPrepend" required>
                              </div>                            
                            </div>
                            <div class="form-group col-md-6">
                                <label for="departamento">Departamento</label>
                                <select class="custom-select" required name="departamento">
<?php 
    foreach($departamentos as $dep){
        $nomeDep = $dep->getNome();
        $idDep = $dep->getIdDepartamento();
    
?> 
                                  <option value=<?php echo $idDep; ?>><?php echo $nomeDep; ?></option>
                                
<?php } ?>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>                    
                </div>

                <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Preco</th>
                        <th scope="col">Departamento</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
<?php 
    foreach($produtos as $p) {
        $id = $p->getIdProduto();
        $nomeProduto = $p->getNome();
        $precoProduto = $p->getPreco();
        $nomeDepartamento = $p->getDepartamento()->getNome();
?>                   
                <tr>
                    <th scope="row"><?php echo $id; ?></th>
                    <td> <?php echo $nomeProduto; ?>     </td>
                    <td> <?php echo $precoProduto; ?>    </td>
                    <td> <?php echo $nomeDepartamento;?> </td>
                    <td>
                        <a class="btn btn-danger btn-sm active" 
                            href="produtos.php?operacao=apagar&id=<?php echo $id ?>">
                            Apagar
                        </a>
                        <a class="btn btn-secondary btn-sm active" 
                            href="produtos.php?operacao=editar&id=<?php echo $id ?>">
                            Editar
                        </a>                        
                    </td>
                </tr>
<?php
   }
?>
                </tbody>
                </table>

            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
