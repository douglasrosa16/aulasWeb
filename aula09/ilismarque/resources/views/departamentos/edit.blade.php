@extends('layouts.dashboard');

@section('principal')
<h1>Novo Departamento</h1>


<form action="/departamentos/{{ $departamento->id }}" method="POST">
  @method('put')
  @csrf
  Nome: <input type="text" name="nome" value="{{ $departamento->nome }}"> <br>
  
  <input type="submit" value="Salvar">
</form>
@endsection