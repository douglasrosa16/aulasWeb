@extends('layouts.dashboard');

@section('principal')

<h1>Nova Marca</h1>


<form action="/marcas" method="POST">

  @csrf
  Nome: <input type="text" name="nome"> <br>
  <input type="submit" value="Salvar">
</form>

@endsection