<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>" dir="<?php echo e(app()->getLocale() === 'ar' ? 'rtl' : 'ltr'); ?>">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo e(config('app.name')); ?></title>
  
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(asset('icon/apple-touch-icon.png')); ?>">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('icon/favicon-32x32.png')); ?>">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('icon/favicon-16x16.png')); ?>">
  <link rel="manifest" href="<?php echo e(asset('icon/site.webmanifest')); ?>">
  
  <?php echo SEOMeta::generate(); ?>

  <?php echo OpenGraph::generate(); ?>

  <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
  <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

</head>

<body class="bg-[#FDF6EC] text-[#111111] font-chamberi">
  <?php echo $__env->make('components.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
  <main><?php echo $__env->yieldContent('content'); ?></main>
  <?php echo $__env->make('components.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
  <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

  <?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html>
<?php /**PATH C:\wamp64\www\BuildSyntax\caffeine1922\resources\views/layouts/app.blade.php ENDPATH**/ ?>