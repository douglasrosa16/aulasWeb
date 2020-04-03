<h1>Novo Cliente</h1>


<form action="/clientes/<?php echo e($cliente->id); ?>" method="POST">
  <?php echo method_field('put'); ?>
  <?php echo csrf_field(); ?>
  Nome: <input type="text" name="nome" value="<?php echo e($cliente->nome); ?>"> <br>
  Cidade: <input type="text" name="cidade"  value="<?php echo e($cliente->cidade); ?>"> <br>
  Idade: <input type="number" name="idade"  value="<?php echo e($cliente->idade); ?>"> <br>

  <input type="submit" value="Salvar">
</form><?php /**PATH C:\xampp\htdocs\Web\aula09\projeto\resources\views/clientes/edit.blade.php ENDPATH**/ ?>