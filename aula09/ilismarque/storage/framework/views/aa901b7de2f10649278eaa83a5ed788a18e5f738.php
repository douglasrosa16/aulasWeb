<h1>Nova Marca</h1>


<form action="/marcas" method="POST">

  <?php echo csrf_field(); ?>
  Nome: <input type="text" name="nome"> <br>
  <input type="submit" value="Salvar">
</form><?php /**PATH C:\xampp\htdocs\Web\aula09\projeto\resources\views/marcas/create.blade.php ENDPATH**/ ?>