@extends('layouts.dashboard');

@section('principal')
<h1>Novo Departamento</h1>


<form action="/departamentos" method="POST">

  @csrf
  Nome: <input type="text" name="nome"> <br>
  <input type="submit" value="Salvar">
</form>

@endsection