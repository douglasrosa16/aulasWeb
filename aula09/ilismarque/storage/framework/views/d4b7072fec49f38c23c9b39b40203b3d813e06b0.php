<h1>Novo Cliente</h1>


<form action="/clientes" method="POST">

  <?php echo csrf_field(); ?>
  Nome: <input type="text" name="nome"> <br>
  Cidade: <input type="text" name="cidade"> <br>
  Idade: <input type="number" name="idade"> <br>

  <input type="submit" value="Salvar">
</form><?php /**PATH C:\xampp\htdocs\Web\aula09\projeto\resources\views/clientes/create.blade.php ENDPATH**/ ?>