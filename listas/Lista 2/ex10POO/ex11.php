<?php
/* Utilize as classes criadas no exercício 10 para criar um array de objetos Família's, sendo
que cada família tem um Pai, Mãe e zero ou mais filhos.*/
    require_once("pessoa.php");
    require_once("genitor.php");
    require_once("filho.php");
    require_once("familia.php");
    require_once("ex12.php");
    //Declaração de Arrays
    $arrayFilhos = [];

    //Instanciando PAI
    $pai = new genitor();
    $Pnome = "Adao";
    $Pidade = 50;
    $Pcpf = "102.654.565-59";
    $pai->setNome($Pnome);
    $pai->setIdade($Pidade);
    $pai->setCpf($Pcpf);

    //Instanciando 2º Genitor 
    $pai2 = new genitor();
    $Pnome = "Kabure";
    $Pidade = 40;
    $Pcpf = "454.987.456-32";
    $pai2->setNome($Pnome);
    $pai2->setIdade($Pidade);
    $pai2->setCpf($Pcpf);

    //Instanciando Mãe
    $mae = new genitor();
    $Mnome = "Janice";
    $Midade = 45;
    $Mcpf = "005.656.656-59";
    $mae->setNome($Mnome);
    $mae->setIdade($Midade);
    $mae->setCpf($Mcpf);

    //Instanciando 2º Mãe
    $mae2 = new genitor();
    $Mnome = "Lourdes";
    $Midade = 40;
    $Mcpf = "123.456.789-00";
    $mae2->setNome($Mnome);
    $mae2->setIdade($Midade);
    $mae2->setCpf($Mcpf);

    //Instanciando Filho 1
    $filho = new filho(); 
    $Fnome = "Douglas";
    $Fidade = 20;
    $Fcpf = "655.652.489-59";
    $filho->setNome($Fnome);
    $filho->setIdade($Fidade);
    $filho->setCpf($Fcpf);
    
    //Instanciando Filho 2
    $filho2 = new filho(); 
    $Fnome = "Vanessa";
    $Fidade = 26;
    $Fcpf = "444.555-666-77";
    $filho2->setNome($Fnome);
    $filho2->setIdade($Fidade);
    $filho2->setCpf($Fcpf);
    
    //Instanciando Filho 3
    $filho3 = new filho(); 
    $Fnome = "Adriel";
    $Fidade = 14;
    $Fcpf = "111.222.333-55";
    $filho3->setNome($Fnome);
    $filho3->setIdade($Fidade);
    $filho3->setCpf($Fcpf);
    
    //Array de Filhos dos Pais
    $arrayFilhos[] = $filho;
    $arrayFilhos[] = $filho2;
    
    //Setando o Filho para PAI e Mãe
    $pai->addFilho($filho);   //Douglas
    $pai->addFilho($filho2);
    $mae->addFilho($filho);  //Vanessa
    $mae->addFilho($filho2);
        
    //Setando o Filho para Tios
    $pai2->addFilho($filho3);  //Adriel
    $mae2->addFilho($filho3);  //Adriel
            
    //Instanciando Familia
    $familia = new familia(null, $pai, $mae); //Um objeto familia, vou ter que criar um array de familias
    $familia->setFilhos($arrayFilhos);

    $familia2 = new familia(null, $pai2, $mae2);
    
    $arrayFamilias[] = $familia;
    $arrayFamilias[] = $familia2;
    echo "<pre>";
    //print_r($arrayFamilias);//Imprimindo Objetos
    echo "</pre>";

    //Exercício 12 - Imprimir Array de Familias
    $familias = new familias();
    $familias->imprimirFamilias($arrayFamilias);    

?>