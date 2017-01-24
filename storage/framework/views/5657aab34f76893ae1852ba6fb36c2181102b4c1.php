<?php if(isset($slug) && $slug): ?>
<hr>
<div class="container">
  <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
    <?php echo $__env->make('blog.partials.duoshuo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </div>
</div>
<?php endif; ?>
<hr>
<footer>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        <ul class="list-inline text-center">
          <li>
            <a href="<?php echo e(url('rss')); ?>" data-toggle="tooltip"
               title="RSS feed">
              <span class="fa-stack fa-lg">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-rss fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          </li>
        </ul>
        <p class="copyright">Copyright © <?php echo e(config('blog.author')); ?></p>
      </div>
    </div>
  </div>
</footer>