<h1>Clientes</h1>

<a href="/clientes/create">
Novo Cliente
</a>

<hr>

<ul>
  <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <li>
    <?php echo e($c->nome); ?> 
    <a href="/clientes/edit/<?php echo e($c->id); ?>">[Edit]</a>

    <form action="/clientes/<?php echo e($c->id); ?>" method="POST">
      <?php echo method_field('delete'); ?>
      <?php echo csrf_field(); ?>
      <input type="submit" value="Remover">
    </form>
  </li>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul><?php /**PATH /home/maikon/workspace/disciplinas/web/aulas-lab/aula09/projeto/resources/views/clientes/index.blade.php ENDPATH**/ ?>