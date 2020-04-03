<h1>Novo Departamento</h1>


<form action="/departamentos/<?php echo e($departamento->id); ?>" method="POST">
  <?php echo method_field('put'); ?>
  <?php echo csrf_field(); ?>
  Nome: <input type="text" name="nome" value="<?php echo e($departamento->nome); ?>"> <br>
  
  <input type="submit" value="Salvar">
</form><?php /**PATH C:\xampp\htdocs\Web\aula09\projeto\resources\views/departamentos/edit.blade.php ENDPATH**/ ?>