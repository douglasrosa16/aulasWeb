<h1>Novo Departamento</h1>


<form action="/departamentos" method="POST">

  <?php echo csrf_field(); ?>
  Nome: <input type="text" name="nome"> <br>
  <input type="submit" value="Salvar">
</form><?php /**PATH C:\xampp\htdocs\Web\aula09\projeto\resources\views/departamentos/create.blade.php ENDPATH**/ ?>