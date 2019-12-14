<?php
    require_once(__DIR__ . '/../config/config.php');
    require_once(__DIR__ . '/../dao/clienteDAO.php');
    require_once(__DIR__ . '/../model/cliente.php');
    require_once(__DIR__ . '/../db/db.php');

    $conn = new Db(Config::db_host, Config::db_user, Config::db_password, Config::db_database);
    $id = null;
    $nome = null;
    $email = null;
    $endereco = null;
    $telefone = null;
    if($conn->connect()){
        $clienteDAO = new ClienteDAO($conn);
        
        if(count($_POST) > 0){
            if($_POST['idCliente'] != ""){
                $cliente = new Cliente($_POST['idCliente'], $_POST['nome'], $_POST['endereco'], $_POST['telefone'], $_POST['email']);                          
                $clienteDAO->salvarCliente($cliente);
            }else{
                $cliente = new Cliente(null, $_POST['nome'], $_POST['endereco'], $_POST['telefone'], $_POST['email']);                      
                $clienteDAO->insereCliente($cliente);
            }
            
        }

        if(count($_GET) > 0){
            $cli = $clienteDAO->getClienteByID($_GET['id']);
            if($_GET['operacao'] == "editar"){
                $id = $_GET['id'];
                $nome = $cli->getNome();
                $email = $cli->getEmail();
                $endereco = $cli->getEndereco();
                $telefone = $cli->getTelefone();
            }
            if($_GET['operacao'] == "apagar"){                                                
                $clienteDAO->apagarCliente($cli);
            }
        }
        
        $clientes = $clienteDAO->getClientes();
    }else{
        echo "Falha ao conectar no banco de dados";
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

    <title>Clientes</title>
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
                    <a class="nav-link active" href="clientes.php">Clientes <span class="sr-only">(current)</span></a>
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
            <h2>Cadastro de Clientes</h2>
        </div>
        <div class="row">
            <div class="col-md-12" >
                <div class="card p-2 my-4">
                    <form action="clientes.php" method="POST">
                        <input type="hidden" name="idCliente" value=<?php echo $id; ?>  >

                        <div class="form-group">
                            <label for="nome">Nome do Cliente</label>
                            <input type="text" class="form-control" id="nome"
                                value="<?php echo $nome; ?>"
                                name="nome" placeholder="Nome do Cliente" required>
                        </div>
                        <div class="form-group">
                            <label for="endereco">Endereço</label>
                            <input type="text" class="form-control" id="endereco" 
                                value="<?php echo $endereco; ?>"
                                name="endereco" placeholder="Av. Brasil 1500..." required>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="telefone">Telefone</label>
                                <input type="text" class="form-control" id="telefone" 
                                    value="<?php echo $telefone; ?>"
                                    name="telefone" placeholder="Telefone" required>
                            </div>                            
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" 
                                    value="<?php echo $email; ?>"
                                    name="email" placeholder="Email" required>
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
                        <th scope="col">Email</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
<?php
    foreach($clientes as $c){
        $nomeCliente = $c->getNome();
        $emailCliente = $c->getEmail();
        $idCliente = $c->getIdCliente();
        $telefoneCliente = $c->getTelefone();
?>                
                <tr>
                    <th scope="row"><?php echo $idCliente; ?></th>
                    <td><?php echo $nomeCliente; ?></td>
                    <td><?php echo $emailCliente; ?></td>
                    <td><?php echo $telefoneCliente; ?></td>
                    <td>
                        <a class="btn btn-danger btn-sm active" 
                            href="clientes.php?operacao=apagar&id=<?php echo $idCliente; ?>">
                            Apagar
                        </a>
                        <a class="btn btn-secondary btn-sm active" 
                            href="clientes.php?operacao=editar&id=<?php echo $idCliente; ?>">
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
