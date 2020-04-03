<h1>Editar Marca</h1>


<form action="/marcas/<?php echo e($marca->id); ?>" method="POST">
  <?php echo method_field('put'); ?>
  <?php echo csrf_field(); ?>
  Nome: <input type="text" name="nome" value="<?php echo e($marca->nome); ?>"> <br>
  <input type="submit" value="Salvar">
</form><?php /**PATH C:\xampp\htdocs\Web\aula09\projeto\resources\views/marcas/edit.blade.php ENDPATH**/ ?>