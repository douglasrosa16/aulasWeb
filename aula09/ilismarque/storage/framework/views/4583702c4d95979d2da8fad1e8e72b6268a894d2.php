<h1>Novo Produto</h1>


<form action="<?php echo e(route('produtos.store')); ?>" method="POST">

  <?php echo csrf_field(); ?>
  Nome: <input type="text" name="nome"> <br>
  Estoque: <input type="number" name="estoque" id=""><br>
  Preco: <input type="number" min="0" step="any" name="preco"><br>
  Marca: 
  <select name="marca_id">
      <?php $__currentLoopData = $marcas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($m->id); ?>"><?php echo e($m->nome); ?></option>      
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
  </select><br>
  <input type="submit" value="Salvar">
</form><?php /**PATH C:\xampp\htdocs\Web\aula09\projeto\resources\views/produtos/create.blade.php ENDPATH**/ ?>