<h1>Novo Cliente</h1>

<form action="/clientes" method="POST">

    @csrf 
    Nome: <input type="text" name="nome"><br>
    Cidade: <input type="text" name="cidade"><br>
    Idade: <input type="number" name="idade"><br>
    <button type="submit">Salvar</button>

</form>