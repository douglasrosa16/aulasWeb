<?php
/*
 Crie um script PHP que imprima os países e capitais do seguinte modo:
 •A capital de Italy é Rome.
 •A capital de Luxembourg é Luxembourg
*/

$capitais = array( "Italy"=>"Rome", "Luxembourg"=>"Luxembourg", "Belgium"=> "Brussels", "Denmark"=>"Copenhagen",
 "Finland"=>"Helsinki", "France" => "Paris","Slovakia"=>"Bratislava", "Slovenia"=>"Ljubljana", "Germany" => "Berlin", 
 "Greece" => "Athens", "Ireland"=>"Dublin", "Netherlands"=>"Amsterdam", "Portugal"=>"Lisbon", "Spain"=>"Madrid", 
 "Sweden"=>"Stockholm", "United Kingdom"=>"London", "Cyprus"=>"Nicosia", "Lithuania"=>"Vilnius", "Czech Republic"=>"Prague", 
 "Estonia"=>"Tallin", "Hungary"=>"Budapest", "Latvia"=>"Riga", "Malta"=>"Valetta", "Austria" => "Vienna", "Poland"=>"Warsaw");

if(in_array("Rome",$capitais)){
    echo "A capital de Italy é Rome";
}

if(in_array("Luxembourg", $capitais)){
    echo "A capital de Luxembourg é Luxembourg";
}

 /*foreach($capitais as $cap){
    if(in_array($capitais))
 }*/


?>