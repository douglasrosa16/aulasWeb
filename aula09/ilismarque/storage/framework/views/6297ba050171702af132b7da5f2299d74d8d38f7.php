
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Dashboard Template · Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="<?php echo e(asset('css/dashboard.css')); ?>" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#"><?php echo e(config('app.name', 'Laravel')); ?></a>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="#">Sign out</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link <?php echo e(request()->routeIs('index') ? 'active' : ''); ?>"   href="/">
              <span data-feather="home"></span>
              Dashboard 
            </a>
          </li>          
          <li class="nav-item">
            <a class="nav-link <?php echo e(request()->routeIs('marcas.*') ? 'active' : ''); ?>" href="<?php echo e(route('marcas.index')); ?>" >
              <span data-feather="file"></span>
              Marcas
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo e(request()->routeIs('produtos.*') ? 'active' : ''); ?>" href="<?php echo e(route('produtos.index')); ?>"  >
              <span data-feather="shopping-cart"></span>
              Produtos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo e(request()->routeIs('clientes.*') ? 'active' : ''); ?>" href="<?php echo e(route('clientes.index')); ?>"  >
              <span data-feather="users"></span>
              Clientes
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo e(request()->routeIs('departamentos.*') ? 'active' : ''); ?>" href="<?php echo e(route('departamentos.index')); ?>" >
              <span data-feather="bar-chart-2"></span>
              Departamentos
            </a>
          </li>

        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <br>

      <?php echo $__env->yieldContent('principal'); ?>

    </main>
  </div>
</div>
        <script src="<?php echo e(asset('js/app.js')); ?>"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script type="text/javascript">
            feather.replace();
        </script>
</body>
</html><?php /**PATH C:\xampp\htdocs\Web\aula09\projeto\resources\views/layouts/dashboard.blade.php ENDPATH**/ ?>