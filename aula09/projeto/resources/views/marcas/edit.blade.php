@extends('layouts.dashboard');

@section('principal')
<h1>Editar Marca</h1>


<form action="/marcas/{{ $marca->id }}" method="POST">
  @method('put')
  @csrf
  Nome: <input type="text" name="nome" value="{{ $marca->nome }}"> <br>
  <input type="submit" value="Salvar">
</form>

@endsection