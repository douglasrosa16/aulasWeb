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

  <div style="display: flex; flex-direction:row;">
    @foreach ($departamentos as $d)
      <div style="margin-right: 10px; margin-top: 5px; margin-bottom: 20px">        
        {{$d->nome}}
        <input type="checkbox" name="departamentos[]" value="{{$d->id}}">
      </div>      
    @endforeach

  </div>

  <input type="submit" value="Salvar">
</form>
@endsection