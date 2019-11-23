<?php
session_start();
if (isset($_SESSION['contador']))
  $_SESSION['contador']++;
else
  $_SESSION['contador'] = 1;

$msg = "Voce visitou este site " . $_SESSION['contador'] . " vezes.";

?>
<html>

<head>
  <title>Contador de Visitas</title>
</head>

<body>
  <h1><?php echo $msg;  ?></h1>
</body>

</html>