<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?php echo e($meta_description); ?>">
  <meta name="author" content="<?php echo e(config('blog.author')); ?>">

  <title><?php echo e(isset($title) ? $title : config('blog.title')); ?></title>
  <link rel="alternate" type="application/rss+xml" href="<?php echo e(url('rss')); ?>"
        title="RSS Feed <?php echo e(config('blog.title')); ?>">
        
  
  <link href="/assets/css/blog.css" rel="stylesheet">
  <?php echo $__env->yieldContent('styles'); ?>

  
  <!--[if lt IE 9]>
  <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
<?php echo $__env->make('blog.partials.page-nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->yieldContent('page-header'); ?>
<?php echo $__env->yieldContent('content'); ?>

<?php echo $__env->make('blog.partials.page-footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<script src="/assets/js/blog.js"></script>
<?php echo $__env->yieldContent('scripts'); ?>

</body>
</html>