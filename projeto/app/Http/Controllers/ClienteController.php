<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;//Importar o cliente (require_once)

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $clientes = Cliente::all();
        $produtos = [1,2,3,4,5];
        //dd($clientes);  //é tipo um var_dump para debug
        //return 'ClienteController@index!!';

        //Esses atributos id, nome... vem direto do banco
        //foreach($clientes as $c){
        //     echo $c->id . ": ";
        //     echo $c->nome . ", ";
        //     echo $c->cidade . ", ";
        //     echo $c->idade . "<hr>";
        // }
        //dd(compact(['clientes','produtos'])); - Exemplo de array associativo
        return view('clientes.index', compact(['clientes']));
        //Compact - retorna um objeto clientes
        //Eu posso passar vários parâmetros para uma view
        //compact é como se fosse um array associativo, posso passar compact(['clientes'])
        //Resumo: compact cria um array e envia, a view que se vira para ler isso
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $c = new Cliente();
        $c->nome = $request->nome; //é como se fosse POST['nome']
        $c->cidade = $request->cidade;
        $c->idade = $request->idade;
        $c->save();

        return redirect('/clientes'); //Vai para essa rota após salvar (redireciona)
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id); //Vai retornar um ID que tem determinado cliente
        return view('clientes.edit', compact(['cliente'])); //Enviando Objeto cliente
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);
        $c = new Cliente();
        $c->nome = $request->nome; //é como se fosse POST['nome']
        $c->cidade = $request->cidade;
        $c->idade = $request->idade;
        $c->save();

        return redirect('clientes');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $c = Cliente::find($id);
        $c->delete();

        return redirect('clientes');
    }
}
