@extends('layouts.dashboard');

@section('principal')
<h1>Novo Produto</h1>


<form action="{{ route('produtos.store') }}" method="POST">

  @csrf
  Nome: <input type="text" name="nome"> <br>
  Estoque: <input type="number" name="estoque" id=""><br>
  Preco: <input type="number" min="0" step="any" name="preco"><br>
  Marca: 
  <select name="marca_id">
      @foreach ($marcas as $m)
        <option value="{{ $m->id }}">{{$m->nome}}</option>      
      @endforeach        
  </select><br>
  <input type="submit" value="Salvar">
</form>
@endsection