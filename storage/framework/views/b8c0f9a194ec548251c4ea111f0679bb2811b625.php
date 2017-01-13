

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-6">
                <h3>Tags <small>» Listing</small></h3>
            </div>
            <div class="col-md-6 text-right">
                <a href="/admin/tag/create" class="btn btn-success btn-md">
                    <i class="fa fa-plus-circle"></i> New Tag
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">

                <?php echo $__env->make('admin.partials.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('admin.partials.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <table id="tags-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Tag</th>
                            <th>Title</th>
                            <th class="hidden-sm">Subtitle</th>
                            <th class="hidden-md">Page Image</th>
                            <th class="hidden-md">Meta Description</th>
                            <th class="hidden-md">Layout</th>
                            <th class="hidden-sm">Direction</th>
                            <th data-sortable="false">Actions</th>
                        </tr>
                     </thead>
                    <tbody>
                    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <tr>
                            <td><?php echo e($tag->tag); ?></td>
                            <td><?php echo e($tag->title); ?></td>
                            <td class="hidden-sm"><?php echo e($tag->subtitle); ?></td>
                            <td class="hidden-md"><?php echo e($tag->page_image); ?></td>
                            <td class="hidden-md"><?php echo e($tag->meta_description); ?></td>
                            <td class="hidden-md"><?php echo e($tag->layout); ?></td>
                            <td class="hidden-sm">
                                <?php if($tag->reverse_direction): ?>
                                    Reverse
                                <?php else: ?>
                                    Normal
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="/admin/tag/<?php echo e($tag->id); ?>/edit" class="btn btn-xs btn-info">
                                    <i class="fa fa-edit"></i> Edit
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
            $("#tags-table").DataTable({
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>