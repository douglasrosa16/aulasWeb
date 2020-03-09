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
  </select><br><br>

  <div style="display: flex; flex-direction:row;">
    
    @php
      $deps = $produto->departamentos->toArray();
      $ids = array_map(function ($d){
           return $d['id'];
      },$deps);
    @endphp
    
    @foreach ($departamentos as $d)
      <div style="margin-right: 10px; margin-top: 5px; margin-bottom: 20px">        
        <input type="checkbox" name="departamentos[]" value="{{$d->id}}"
          @if(in_array($d->id, $ids))
            checked
          @endif
        >
          {{$d->nome}}  

      </div>      
    @endforeach
  </div>
  <input type="submit" value="Salvar">
</form>
@endsection