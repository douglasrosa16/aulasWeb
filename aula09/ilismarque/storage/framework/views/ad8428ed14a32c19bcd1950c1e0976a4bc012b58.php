;

<?php $__env->startSection('principal'); ?>
<h1>Clientes</h1>

<a href="/clientes/create">
Novo Cliente
</a>

<hr>

<ul>
  <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <li>
    <?php echo e($c->nome); ?> 
    <a href="/clientes/<?php echo e($c->id); ?>/edit">[Edit]</a>

    <form action="/clientes/<?php echo e($c->id); ?>" method="POST">
      <?php echo method_field('delete'); ?>
      <?php echo csrf_field(); ?>
      <input type="submit" value="Remover">
    </form>
  </li>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>

<a href="/welcome">Página Inicial</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Web\aula09\projeto\resources\views/clientes/index.blade.php ENDPATH**/ ?>