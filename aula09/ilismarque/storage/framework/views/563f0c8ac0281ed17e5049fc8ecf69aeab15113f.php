<h1>Produtos</h1>

;

<?php $__env->startSection('principal'); ?>
    
<a href="<?php echo e(route('produtos.create')); ?>">
  Novo Cadastrar
</a>

<ul>
  <?php $__currentLoopData = $produtos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <li><?php echo e($p->id); ?> - <?php echo e($p->nome); ?> - <?php echo e($p->marca->nome); ?>

    <a href="<?php echo e(route('produtos.edit', $p->id)); ?>">Editar</a>
    <form action="<?php echo e(route('produtos.destroy', $p->id)); ?>" method="POST">
      <?php echo csrf_field(); ?>
      <?php echo method_field('delete'); ?>
      <input type="submit" value="Apagar">      
    </form>
  </li>    
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>

<a href="/welcome">Página Inicial</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Web\aula09\projeto\resources\views/produtos/index.blade.php ENDPATH**/ ?>