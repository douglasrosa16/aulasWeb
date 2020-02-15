@extends('layouts.dashboard');

@section('principal')
<h1>Departamentos</h1>

<a href="/departamentos/create">
Novo Departamento
</a>

<hr>

<ul>
  @foreach($departamento as $d)
  <li>
    {{ $d->nome }} 
    <a href="/departamentos/{{ $d->id }}/edit">[Editar]</a>

    <form action="/departamentos/{{$d->id}}" method="POST">
      @method('delete')
      @csrf
      <input type="submit" value="Remover">
    </form>
  </li>
  @endforeach
</ul>

<a href="/welcome">Página Inicial</a>
@endsection