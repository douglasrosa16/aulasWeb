<h1>Editar Produto</h1>


<form action="<?php echo e(route('produtos.update', $produto->id)); ?>" method="POST">
  <?php echo method_field('put'); ?>
  <?php echo csrf_field(); ?>
    Nome: <input type="text" name="nome" value="<?php echo e($produto->nome); ?>"> <br>
  
Estoque: <input type="number" name="estoque" value="<?php echo e($produto->estoque); ?>"><br>

Preco: <input type="number" min="0" step="any" name="preco" value="<?php echo e($produto->preco); ?>"><br>

  Marca: 
  <select name="marca_id">
      <?php $__currentLoopData = $marcas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($m->id == $produto->marca_id): ?>
            <option value="<?php echo e($m->id); ?>" selected><?php echo e($m->nome); ?></option>      
        <?php else: ?>
            <option value="<?php echo e($m->id); ?>"><?php echo e($m->nome); ?></option>      
        <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
  </select><br>
  <input type="submit" value="Salvar">
</form><?php /**PATH C:\xampp\htdocs\Web\aula09\projeto\resources\views/produtos/edit.blade.php ENDPATH**/ ?>