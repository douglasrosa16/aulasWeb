<?php

/*
    Rotas: eu coloco um / que é a URL
    Route = Classe
    :: = acessa um método/atributo - GET | POST | PUT | PATCH | DELETE |
    a function é o segundo parâmetro, chamada também de função anônima
    

*/

Route::get('/', function () {
    return view('welcome');
});

//"URL" sem parâmetro
Route::get('/ola', function() {
    return "Ola mundo";
});

//"URL" com parâmetro, utilizada quando preciso passar parâmetros como um ID por exemplo
Route::get('/ola/{nome}/{sobrenome}', function($nome, $sobrenome){
    return "Ola mundo $nome $sobrenome";
});

//Não posso fazer isso, pois estaria chamando a mesma URL (como se eu chamasse www.google.com, seria o mesmo link)
//Route::get('/ola/{nome}/{sobrenome}', function($nome, $sobrenome){
//    return "Ola mundo $nome $sobrenome";
//});

//Rota Master, pra não ter que ficar criando várias rotas que começam com "app"
Route::prefix("app")->group( function(){
    
    Route::get('user', function(){
        return "URL: app/user";
    });

    Route::get('produtos', function(){
        return "URL: app/produtos";
    });
    
});

//Minha URL /clientes
Route::get('clientes','ClienteController@index'); //Tudo que chegar de /clientes, ele vai mandar para o método index

Route::get('clientes/create','ClienteController@create');

Route::post('/clientes','ClienteController@store'); 

Route::get('/clientes/edit/{idCliente}','ClienteController@edit');

Route::put('clientes/{cliente}','ClienteController@update');

Route::delete('clientes/{cliente}','ClienteController@destroy');

