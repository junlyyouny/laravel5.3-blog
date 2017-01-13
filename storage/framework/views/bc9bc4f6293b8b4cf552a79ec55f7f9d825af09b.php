

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
    <div class="row page-title-row">
        <div class="col-md-6">
            <h3>Posts <small>» Listing</small></h3>
        </div>
        <div class="col-md-6 text-right">
            <a href="/admin/post/create" class="btn btn-success btn-md">
                <i class="fa fa-plus-circle"></i> New Post
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">

            <?php echo $__env->make('admin.partials.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('admin.partials.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <table id="posts-table" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Published</th>
                    <th>Title</th>
                    <th>Subtitle</th>
                    <th data-sortable="false">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tr>
                    <td data-order="<?php echo e($post->published_at->timestamp); ?>">
                        <?php echo e($post->published_at->format('j-M-y g:ia')); ?>

                    </td>
                    <td><?php echo e($post->title); ?></td>
                    <td><?php echo e($post->subtitle); ?></td>
                    <td>
                        <a href="/admin/post/<?php echo e($post->id); ?>/edit" class="btn btn-xs btn-info">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <a href="/blog/<?php echo e($post->slug); ?>" class="btn btn-xs btn-warning">
                            <i class="fa fa-eye"></i> View
                        </a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </tbody>
            </table>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    $(function() {
        $("#posts-table").DataTable({
            order: [[0, "desc"]]
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>