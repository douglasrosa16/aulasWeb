;

<?php $__env->startSection('principal'); ?>
<h1>Marcas</h1>

<a href="/marcas/create">
Cadastrar
</a>

<hr>

<ul>
  <?php $__currentLoopData = $marca; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <li>
    <?php echo e($m->nome); ?> 
    <a href="/marcas/<?php echo e($m->id); ?>/edit">[Editar]</a>

    <form action="/marcas/<?php echo e($m->id); ?>" method="POST">
      <?php echo method_field('delete'); ?>
      <?php echo csrf_field(); ?>
      <input type="submit" value="Remover">
    </form>
  </li>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>

<a href="/welcome">Página Inicial</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Web\aula09\projeto\resources\views/marcas/index.blade.php ENDPATH**/ ?>