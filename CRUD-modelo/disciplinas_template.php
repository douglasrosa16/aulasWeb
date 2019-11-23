<?php

  require_once('db.php');
  require_once('disciplina.php');
  require_once('disciplinaDAO.php');

  $db = new Db("localhost", "root", "", "alunos");
  $editarIdDisciplina =null;
  $editarNomeDisciplina = null;
  if ($db->connect()) {
    $dao = new DisciplinaDAO($db);
    
    //Verifica se existe um ID, caso exista vai editar, se não existir vai inserir
    if(count($_POST) && isset($_POST['nome'])){ 
        if(isset($_POST['idDisciplina']) && $_POST['idDisciplina'] != ""){
            //Atualizar Disciplina
            $disciplina = $dao->buscarDisciplina($_POST['idDisciplina']);
            $disciplina->setNome($_POST['nome']);
            $dao->update($disciplina);
        }else{
            //Inserir uma nova disciplina
            $d = new Disciplina(null, $_POST['nome']);
            $dao->inserir($d);
        }        
    }

    //Deletar uma nova disciplina
    if(count($_GET) && (isset($_GET['op'])) && (isset($_GET['id'])) && $_GET['id']!="" ){
        $op = $_GET['op'];
        $id = $_GET['id'];
        $disciplina = $dao->buscarDisciplina($id);
        if ($op == "apagar"){
            $dao->apagar($disciplina);
        }else if($op = "editar"){
            $editarIdDisciplina = $disciplina->getId();
            $editarNomeDisciplina = $disciplina->getNome();
        }
    }
    $disciplinas = $dao->getDisciplinas(); //Imprimir todas as disciplinas
    
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

    <title>Disciplinas</title>
  </head>
  <body>

    <div class="container">
        <div class="py-5 text-center">
            <h2>Cadastro de Disciplinas</h2>
        </div>
        <div class="row">
            <div class="col-md-12" >
                <form action="disciplinas_template.php" class="card p-2 my-4" 
                    method="POST">
                    <div class="input-group">
                        <input type="hidden" name="idDisciplina" 
                            value="<?php echo $editarIdDisciplina?>">
                        <input type="text" placeholder="Nome da Disciplina" 
                            class="form-control" name="nome" required
                            value="<?php echo $editarNomeDisciplina?>">
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
    foreach($disciplinas as $d){ //Imprimir todas as disciplinas       
?>                
                <tr>
                    <th scope="row"><?php echo $d->getId();?></th>
                    <td><?php echo $d->getNome();?></td>
                    <td>
                        <a class="btn btn-danger btn-sm active"
                           href="disciplinas_template.php?op=apagar&id=<?php echo $d->getId(); ?>">
                            Apagar
                        </a>
                        <a class="btn btn-secondary btn-sm active" 
                           href="disciplinas_template.php?op=editar&id=<?php echo $d->getId();?>">
                            Editar
                        </a>                        
                    </td>
<?php 
        }   //Preciso fechar meu Foreach
?>                
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
