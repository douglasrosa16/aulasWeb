<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Calculadora</title>
</head>

<body>

  <form action="calculadora.php" method="post">
    <input type="text" name="valor1"> <br>
    <input type="text" name="valor2"> <br>

    <input type="radio" name="operacao" value="soma" checked> +
    <input type="radio" name="operacao" value="sub"> -
    <input type="radio" name="operacao" value="div"> /
    <input type="radio" name="operacao" value="mul"> *
    <br>

    <input type="submit" value="Calcular" name="enviar">

  </form>

  <?php
  if (
    isset($_POST['operacao']) && isset($_POST['valor1']) &&
    isset($_POST['valor2'])
  ) {
    $v1 = $_POST['valor1'];
    $v2 = $_POST['valor2'];
    switch ($_POST['operacao']) {
      case "soma":
        $res = $v1 + $v2;
        break;
      case "sub":
        $res = $v1 - $v2;
        break;
      case "div":
        $res = $v1 / $v2;
        break;
      case "mul":
        $res = $v1 * $v2;
        break;
      default:
        $res = 0;
    }
    echo "<h1>Resultado: $res </h1>";
  }

  ?>

</body>

</html>