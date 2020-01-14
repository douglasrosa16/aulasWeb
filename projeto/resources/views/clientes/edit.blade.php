<h1>Editar Cliente</h1>

<form action="/clientes/{{ $cliente->id }}" method="POST">
    @method('put')
    @csrf 
    Nome: <input type="text" name="nome" value="{{ $cliente->nome }}"><br>
    Cidade: <input type="text" name="cidade" value="{{ $cliente->cidade }}"><br>
    Idade: <input type="number" name="idade" value="{{ $cliente->idade }}"><br>
    <button type="submit">Salvar</button>

</form>