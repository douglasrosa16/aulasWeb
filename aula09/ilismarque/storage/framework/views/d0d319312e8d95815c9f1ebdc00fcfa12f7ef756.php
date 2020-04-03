;

<?php $__env->startSection('principal'); ?>
<h1>Departamentos</h1>

<a href="/departamentos/create">
Novo Departamento
</a>

<hr>

<ul>
  <?php $__currentLoopData = $departamento; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <li>
    <?php echo e($d->nome); ?> 
    <a href="/departamentos/<?php echo e($d->id); ?>/edit">[Editar]</a>

    <form action="/departamentos/<?php echo e($d->id); ?>" method="POST">
      <?php echo method_field('delete'); ?>
      <?php echo csrf_field(); ?>
      <input type="submit" value="Remover">
    </form>
  </li>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>

<a href="/welcome">Página Inicial</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Web\aula09\projeto\resources\views/departamentos/index.blade.php ENDPATH**/ ?>