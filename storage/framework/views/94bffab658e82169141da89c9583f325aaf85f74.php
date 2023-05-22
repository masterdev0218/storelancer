<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo e($page->name); ?></title>
  <link rel="stylesheet" href="<?php echo e(asset('custom/css/page-builder.css')); ?>">
  <style>
    <?php echo $page->css; ?>

  </style>
</head>
  <?php echo $page->html; ?>

</html><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/storelancer_new/resources/views/custom-page.blade.php ENDPATH**/ ?>