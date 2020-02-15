@extends('layouts.dashboard');

@section('principal')
<h1>Editar Produto</h1>


<form action="{{ route('produtos.update', $produto->id) }}" method="POST">
  @method('put')
  @csrf
    Nome: <input type="text" name="nome" value="{{$produto->nome}}"> <br>
  
    Estoque: <input type="number" name="estoque" value="{{$produto->estoque}}"><br>

    Preco: <input type="number" min="0" step="any" name="preco" value="{{$produto->preco}}"><br>

    Marca: 
  <select name="marca_id">
      @foreach ($marcas as $m)
        @if($m->id == $produto->marca_id)
            <option value="{{ $m->id }}" selected>{{$m->nome}}</option>      
        @else
            <option value="{{ $m->id }}">{{$m->nome}}</option>      
        @endif
      @endforeach        
  </select><br>
  <input type="submit" value="Salvar">
</form>
@endsection