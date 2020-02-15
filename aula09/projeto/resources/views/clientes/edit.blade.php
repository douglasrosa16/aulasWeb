@extends('layouts.dashboard');

@section('principal')
<h1>Novo Cliente</h1>


<form action="/clientes/{{ $cliente->id }}" method="POST">
  @method('put')
  @csrf
  Nome: <input type="text" name="nome" value="{{ $cliente->nome }}"> <br>
  Cidade: <input type="text" name="cidade"  value="{{ $cliente->cidade }}"> <br>
  Idade: <input type="number" name="idade"  value="{{ $cliente->idade }}"> <br>

  <input type="submit" value="Salvar">
</form>

@endsection