

<?php $__env->startSection('page-header'); ?>
  <header class="intro-header"
          style="background-image: url('<?php echo e(page_image($page_image)); ?>')">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
          <div class="site-heading">
            <h1><?php echo e($title); ?></h1>
            <hr class="small">
            <h2 class="subheading"><?php echo e($subtitle); ?></h2>
          </div>
        </div>
      </div>
    </div>
  </header>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

        
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
          <div class="post-preview">
            <a href="<?php echo e($post->url($tag)); ?>">
              <h2 class="post-title"><?php echo e($post->title); ?></h2>
              <?php if($post->subtitle): ?>
                <h3 class="post-subtitle"><?php echo e($post->subtitle); ?></h3>
              <?php endif; ?>
            </a>
            <p class="post-meta">
              Posted on <?php echo e($post->published_at->format('F j, Y')); ?>

              <?php if($post->tags->count()): ?>
                in
                <?php echo join(', ', $post->tagLinks()); ?>

              <?php endif; ?>
            </p>
          </div>
          <hr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

        
        <ul class="pager">

          
          <?php if($reverse_direction): ?>
            <?php if($posts->currentPage() > 1): ?>
              <li class="previous">
                <a href="<?php echo $posts->url($posts->currentPage() - 1); ?>">
                  <i class="fa fa-long-arrow-left fa-lg"></i>
                  Previous <?php echo e($tag->tag); ?> Posts
                </a>
              </li>
            <?php endif; ?>
            <?php if($posts->hasMorePages()): ?>
              <li class="next">
                <a href="<?php echo $posts->nextPageUrl(); ?>">
                  Next <?php echo e($tag->tag); ?> Posts
                  <i class="fa fa-long-arrow-right"></i>
                </a>
              </li>
            <?php endif; ?>
          <?php else: ?>
            <?php if($posts->currentPage() > 1): ?>
              <li class="previous">
                <a href="<?php echo $posts->url($posts->currentPage() - 1); ?>">
                  <i class="fa fa-long-arrow-left fa-lg"></i>
                  Newer <?php echo e($tag ? $tag->tag : ''); ?> Posts
                </a>
              </li>
            <?php endif; ?>
            <?php if($posts->hasMorePages()): ?>
              <li class="next">
                <a href="<?php echo $posts->nextPageUrl(); ?>">
                  Older <?php echo e($tag ? $tag->tag : ''); ?> Posts
                  <i class="fa fa-long-arrow-right"></i>
                </a>
              </li>
            <?php endif; ?>
          <?php endif; ?>
        </ul>
      </div>

    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('blog.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>