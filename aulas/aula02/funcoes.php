<?php

$pessoas = [
  ['nome' => 'joao', 'idade' => 20, 'cidade' => 'rondonopolis'],
  ['nome' => 'maria', 'idade' => 22, 'cidade' => 'curitiba'],
  ['nome' => 'ronaldo', 'idade' => 50, 'cidade' => 'cuiaba']
];

function imprimir($array_pessoas)
{
  foreach ($array_pessoas as $p) {
    echo "<p>";
    echo "Nome: " . $p['nome'] . ', ';
    echo "Idade: " . $p['idade'] . ', ';
    echo "Cidade: " . $p['cidade'];
    echo "</p>";
  }
}

function adicionar($nome, $idade, $cidade)
{
  global $pessoas;
  $pessoas[] = [
    'nome' => $nome, 'idade' => $idade, 'cidade' => $cidade
  ];
}

function adicionar2(&$array_pessoas, $nome, $idade, $cidade)
{
  $array_pessoas[] = [
    'nome' => $nome, 'idade' => $idade, 'cidade' => $cidade
  ];
}

function elementos($array_pessoas)
{
  return count($array_pessoas);
}

adicionar("marcelo", 44, "Sao Paulo");
adicionar2($pessoas, "marcelo", 44, "Sao Paulo");
imprimir($pessoas);
echo "<p> Count: " . elementos($pessoas) . "</p>";
