<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo e(config('blog.title')); ?></title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <h1><?php echo e(config('blog.title')); ?></h1>
            <h5>Page <?php echo e($posts->currentPage()); ?> of <?php echo e($posts->lastPage()); ?></h5>
            <hr>
            <ul>
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <li>
                    <a href="/blog/<?php echo e($post->slug); ?>"><?php echo e($post->title); ?></a>
                    <em>(<?php echo e($post->published_at); ?>)</em>
                    <p>
                        <?php echo e(str_limit($post->content)); ?>

                    </p>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </ul>
            <hr>
            <?php echo $posts->render(); ?>

        </div>
    </body>
</html>