<p>
  You have received a new message from your website contact form.</p><p>
  Here are the details:
</p>
<ul>
  <li>Name: <strong><?php echo e($name); ?></strong></li>
  <li>Email: <strong><?php echo e($email); ?></strong></li>
  <li>Phone: <strong><?php echo e($phone); ?></strong></li>
</ul>
<hr>
<p>
  <?php $__currentLoopData = $messageLines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $messageLine): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <?php echo e($messageLine); ?><br>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</p>
<hr>