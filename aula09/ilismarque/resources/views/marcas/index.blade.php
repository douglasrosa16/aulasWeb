@extends('layouts.dashboard');

@section('principal')
<h1>Marcas</h1>

<a href="/marcas/create">
Cadastrar
</a>

<hr>

<ul>
  @foreach($marca as $m)
  <li>
    {{ $m->nome }} 
    <a href="/marcas/{{ $m->id }}/edit">[Editar]</a>

    <form action="/marcas/{{$m->id}}" method="POST">
      @method('delete')
      @csrf
      <input type="submit" value="Remover">
    </form>
  </li>
  @endforeach
</ul>

<a href="/welcome">Página Inicial</a>
@endsection