<?php

require_once('cliente.php');
require_once('vendedor.php');
require_once('produto.php');
require_once('departamento.php');
require_once('venda.php');
require_once('vendaproduto.php');

//include('qualquerCoisa.php') - Opcional (não vai dar erro 500)
//include_once('qualquerCoisa.php') - Opcional (não vai dar erro 500)
//require('qualquerCoisa.php') - Vai dar Erro no servidor de 500


$depEletronicos = new Departamento('Eletronicos');
$depInformatica = new Departamento('Informatica');

$vProdutos[] = new Produto('Camera Sony', 1000, $depEletronicos);
$vProdutos[] = new Produto('Notebook Dell', 4000, $depInformatica);
$vProdutos[] = new Produto('Processador', 900, $depInformatica);
$vProdutos[] = new Produto('Televisao', 2500, $depEletronicos);

$Clientes[] = new Cliente('Ilismarque', 26, 3000, 30);
$Clientes[] = new Cliente('Wellen', 20, 264166, 50);

$Vendedores[] = new Vendedor('Douglas', 20, 621262, 2000);
$Vendedores[] = new Vendedor('Adao', 50, 323232, 4000);

$vendas[0] = new Venda($Clientes[0], $Vendedores[0]);
$vendas[0]->addItem( new VendaProduto($vProdutos[0], 5, 10));
$vendas[0]->addItem( new VendaProduto($vProdutos[3], 10, 2));

$vendas[1] = new Venda($Clientes[1], $Vendedores[1]);
$vendas[1]->addItem( new VendaProduto($vProdutos[1], 10, 5));
$vendas[1]->addItem( new VendaProduto($vProdutos[2], 5, 0));
echo "<pre>";
//var_dump($vendas[0]);
foreach($vendas as $vd){
    echo "# Cliente: " . $vd->getCliente()->getNome() . ", ";
    echo "Vendedor: " . $vd->getVendedor()->getNome() . "<br>";
    echo "<ul>";
    foreach ($vd->getItens() as $item){
        echo "<li>";
        echo $item->getProduto()->getNome() . " (".$item->getProduto()->getDepartamento()->getNome() . "), ";
        echo "Qte: " . $item->getQuantidade() . ",  Desconto: " . $item->getDesconto() . "%";
        echo "</li>";
    }
    echo "</ul>";
    echo "Total: R$" . number_format($vd->getTotal(),2,',','.');
    echo "<hr>";
    
}







/*
foreach($vProdutos as $p){
    echo '<pre>';
    echo 'Nome = ' . $p->getNome() . '<br>';
    echo 'Preço = ' . $p->getPreco() . '<br>';
    echo 'Departamento = ' . $p->getDepartamento()->getNome() . '<br>';
    echo '</pre>';
}

foreach ($Vendedores as $vend){
    echo '<pre>';
    echo 'Nome = ' . $vend->getNome() . '</br>';
    echo 'Idade = ' . $vend->getIdade() . '</br>';
    echo 'CPF = ' . $vend->getCPF() . '</br>';
    echo 'Salario = ' . $vend->getSalario() . '</br>';
    echo '</pre>';
}

foreach ($Clientes as $cli){
    echo '<pre>';
    echo 'Nome = ' . $cli->getNome() . '</br>';
    echo 'Idade = ' . $cli->getIdade() . '</br>';
    echo 'CPF = ' . $cli->getCPF() . '</br>';
    echo 'Pontos = ' . $cli->getPontos() . '</br>';
    echo '</pre>';
}
*/

?>