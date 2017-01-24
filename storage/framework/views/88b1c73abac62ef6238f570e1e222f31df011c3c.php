

<?php $__env->startSection('page-header'); ?>
  <header class="intro-header"
          style="background-image: url('<?php echo e(page_image($post->page_image)); ?>')">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
          <div class="post-heading">
            <h1><?php echo e($post->title); ?></h1>
            <h2 class="subheading"><?php echo e($post->subtitle); ?></h2>
            <span class="meta">
              Posted on <?php echo e($post->published_at->format('F j, Y')); ?>

              <?php if($post->tags->count()): ?>
                in
                <?php echo join(', ', $post->tagLinks()); ?>

              <?php endif; ?>
            </span>
          </div>
        </div>
      </div>
    </div>
  </header>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

  
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
          <?php echo $post->content_html; ?>

        </div>
      </div>
    </div>
  </article>

  
  <div class="container">
    <div class="row">
      <ul class="pager">
        <?php if($tag && $tag->reverse_direction): ?>
          <?php if($post->olderPost($tag)): ?>
            <li class="previous">
              <a href="<?php echo $post->olderPost($tag)->url($tag); ?>">
                <i class="fa fa-long-arrow-left fa-lg"></i>
                Previous <?php echo e($tag->tag); ?> Post
              </a>
            </li>
          <?php endif; ?>
          <?php if($post->newerPost($tag)): ?>
            <li class="next">
              <a href="<?php echo $post->newerPost($tag)->url($tag); ?>">
                Next <?php echo e($tag->tag); ?> Post
                <i class="fa fa-long-arrow-right"></i>
              </a>
            </li>
          <?php endif; ?>
        <?php else: ?>
          <?php if($post->newerPost($tag)): ?>
            <li class="previous">
              <a href="<?php echo $post->newerPost($tag)->url($tag); ?>">
                <i class="fa fa-long-arrow-left fa-lg"></i>
                Next Newer <?php echo e($tag ? $tag->tag : ''); ?> Post
              </a>
            </li>
          <?php endif; ?>
          <?php if($post->olderPost($tag)): ?>
            <li class="next">
              <a href="<?php echo $post->olderPost($tag)->url($tag); ?>">
                Next Older <?php echo e($tag ? $tag->tag : ''); ?> Post
                <i class="fa fa-long-arrow-right"></i>
              </a>
            </li>
          <?php endif; ?>
        <?php endif; ?>
      </ul>
    </div>

  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('blog.layouts.master', [
  'title' => $post->title,
  'meta_description' => $post->meta_description ?: config('blog.description'),
], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>