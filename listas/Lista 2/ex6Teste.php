<?php

  if(count($_POST)){
    echo "Enviou por método POST <br>";
    echo $_POST['end'];
  }

  if(count($_GET)){
    echo "Enviou por método GET <br>";
    echo $_GET['nome'];

  }



?>