<?php

  require_once('db.php');
  require_once('product.php');
  require_once('product_dao.php');


  $db = new Db("localhost", "root", "", "prova");
    if ($db->connect()) {
    $dao = new ProductDAO($db);
 
    $produtos = $dao->getProdutos(); //Imprimir todos os produtos

    }else{
        echo "Erro na conexão com o MySQL";
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

    <title>Product Info</title>
  </head>
  <body>

    <div class="container">
        <div class="py-5 text-center">
            <h2>Produtos</h2>
        </div>
        <div class="row">
            <div class="col-md-12" >
                <div class="input-group">    
                <div class="input-group-append">
                       <a class="btn btn-primary" href="product_new.php" role="button">New</a>
                </div>                                    
                </div>
                <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
<?php      
    foreach($produtos as $d){ 
?>                
                <tr>
                    <th scope="row"><?php echo $d->getId();?></th>
                    <td><?php echo $d->getName();?></td>
                    <td>
                        <a class="btn btn-secondary btn-sm active" 
                           href="product_info.php?&id=<?php echo $d->getId();?>">
                            Info
                        </a>  
                    </td>
<?php 
        }   
?>                
                </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>
    
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
