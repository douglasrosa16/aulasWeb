<h1>Clientes</h1>

<a href="/clientes/create">
    Novo Cliente
</a>

<hr>

<ul>
    @foreach ($clientes as $c)
    <li>
        {{ $c->nome }}
        <a href="/clientes/edit/{{ $c->id }}">[Editar]</a>
        <form action="/clientes/{{ $c->id }}" method="POST">
            @method('delete')
            @csrf
            <input type="submit" value="remover">
        </form>
    </li>
    @endforeach    
</ul>    