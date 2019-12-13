<?php

    require_once(__DIR__ . "/../db/db.php");
    require_once(__DIR__ . "/../model/departamento.php");
    require_once(__DIR__ . "/../dao/departamentoDAO.php");
    require_once(__DIR__ . "/../config/config.php");

    $conn = new Db(Config::db_host,Config::db_user,Config::db_password,Config::db_database);
    if ($conn->connect()) {
        $depDAO = new DepartamentoDAO($conn);
        $departamentos = $depDAO->getDepartamentos();
        


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

    <title>Departamentos</title>
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
                    <a class="nav-link active" href="departamentos.php">Departamentos <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="clientes.php">Clientes</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="produtos.php">Produtos </a>
                </li>
            </ul>
            <span class="navbar-text">
            </span>
        </div>
    </nav>  

    <div class="container">
        <div class="py-5 text-center">
            <h2>Cadastro de Departamentos</h2>
        </div>
        <div class="row">
            <div class="col-md-12" >

                <form action="departamentos.php" class="card p-2 my-4" 
                    method="POST">
                    <div class="input-group">
                        <input type="hidden" name="idDepartamento" 
                            value="">
                        <input type="text" placeholder="Nome da Departamento" 
                            class="form-control" name="nome" required
                            value="">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary">
                                Salvar
                            </button>
                        </div>
                    </div>
                </form>

                <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
<?php 
    foreach($departamentos as $dep) { 
        $id = $dep->getIdDepartamento();
        $nome = $dep->getNome();
?>                                        
                <tr>
                    <th scope="row"><?php echo $id ?></th>              
                    <td><?php echo $nome; ?></td>
                    <td>
                        <a class="btn btn-danger btn-sm active" 
                            href="departamentos.php?operacao=apagar&id=<?php echo $id ?>">
                            Apagar
                        </a>
                        <a class="btn btn-secondary btn-sm active" 
                            href="departamentos.php?operacao=editar&id=<?php echo $id ?>">
                            Editar
                        </a>                        
                    </td>
                </tr>
<?php } ?>                  
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
