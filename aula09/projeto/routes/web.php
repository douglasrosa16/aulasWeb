<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome',function() {
    //return "Welcome!!!";
    return view('welcome');
});

Route::get('/welcome/seja/bem/vindo', function() {
    return "Welcome!!!";
});

Route::get('/ola', function() {
    return "Olá Laravel!";
});

Route::get('/ola/{nome}/{sobrenome}', function($nome, $sn) {
    return "<h1>Olá $nome $sn!</h1>";
});

Route::get('/nomes/{nome}/{n}', function($nome, $n) {
    for($i=0;$i<$n;$i++) {
        echo "<p>$nome</p>";
    }
});

Route::prefix('app')->group( function() {

    Route::get('user', function() {
        return "USER";
    });
    
    Route::get('profile', function() {
        return "PROFILE";
    });
    
});
/*
Route::get('clientes','ClienteController@index');
Route::get('clientes/create','ClienteController@create');
Route::post('clientes','ClienteController@store');
Route::get('clientes/edit/{cliente}','ClienteController@edit');
Route::put('clientes/{cliente}','ClienteController@update');
Route::delete('clientes/{cliente}','ClienteController@destroy');
*/

Route::resource('clientes', 'ClienteController');
Route::resource('departamentos', 'DepartamentoController');
Route::resource('marcas', 'MarcaController');
Route::resource('produtos', 'ProdutoController');