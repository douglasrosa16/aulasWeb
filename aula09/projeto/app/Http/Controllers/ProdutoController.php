<?php

namespace App\Http\Controllers;

use App\Departamento;
use App\Marca;
use App\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::all();
        return view('produtos.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas = Marca::all();
        $departamentos = Departamento::all();
        return view('produtos.create', compact('marcas','departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->departamentos); //die e debug dd
        $produto = new Produto();
        $produto->nome = $request->nome;
        $produto->estoque = $request->estoque;
        $produto->marca_id = $request->marca_id;
        $produto->preco = $request->preco;
        $produto->save();
        //fazer depois de produto pois assim ele terá o ID

        //Cria os Registros na tabela produto departamento
        $produto->departamentos()->sync( $request->departamentos );


        return redirect()->route('produtos.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $marcas = Marca::all();
        return view('produtos.edit',
                    compact(['produto','marcas']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        $produto->nome = $request->nome;
        $produto->estoque = $request->estoque;
        $produto->marca_id = $request->marca_id;
        $produto->preco = $request->preco;
        $produto->save();

        return redirect()->route('produtos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produtos.index');
    }
}
