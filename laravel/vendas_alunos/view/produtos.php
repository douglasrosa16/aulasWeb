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
                                  <option value="">Selecione um departamento:</option>
                                  <option value="1">Departamento 1</option>
                                  <option value="2">Departamento 2</option>
                                  <option value="3">Departamento 3</option>
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
                   
                <tr>
                    <th scope="row">01</th>
                    <td>Nome do Produto</td>
                    <td>R$ 1.99</td>
                    <td>Departamento 1</td>
                    <td>
                        <a class="btn btn-danger btn-sm active" 
                            href="produtos.php?operacao=apagar&id=id">
                            Apagar
                        </a>
                        <a class="btn btn-secondary btn-sm active" 
                            href="produtos.php?operacao=editar&id=id">
                            Editar
                        </a>                        
                    </td>
                </tr>

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
