@extends('layouts.dashboard');

@section('principal')
<h1>Clientes</h1>

<a href="/clientes/create">
Novo Cliente
</a>

<hr>

<ul>
  @foreach($clientes as $c)
  <li>
    {{ $c->nome }} 
    <a href="/clientes/{{ $c->id }}/edit">[Edit]</a>

    <form action="/clientes/{{$c->id}}" method="POST">
      @method('delete')
      @csrf
      <input type="submit" value="Remover">
    </form>
  </li>
  @endforeach
</ul>

<a href="/welcome">Página Inicial</a>
@endsection