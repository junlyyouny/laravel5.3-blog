

<?php $__env->startSection('content'); ?>
<div class="container-fluid">

    
    <div class="row page-title-row">
        <div class="col-md-6">
            <h3 class="pull-left">Uploads </h3>
            <div class="pull-left">
                <ul class="breadcrumb">
                    <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $path => $disp): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <li><a href="/admin/upload?folder=<?php echo e($path); ?>"><?php echo e($disp); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    <li class="active"><?php echo e($folderName); ?></li>
                </ul>
            </div>
        </div>
        <div class="col-md-6 text-right">
            <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#modal-folder-create">
                <i class="fa fa-plus-circle"></i> New Folder
            </button>
            <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modal-file-upload">
                <i class="fa fa-upload"></i> Upload
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">

            <?php echo $__env->make('admin.partials.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('admin.partials.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <table id="uploads-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Date</th>
                        <th>Size</th>
                        <th data-sortable="false">Actions</th>
                    </tr>
                </thead>
                <tbody>

                
                <?php $__currentLoopData = $subfolders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $path => $name): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <tr>
                        <td>
                            <a href="/admin/upload?folder=<?php echo e($path); ?>">
                                <i class="fa fa-folder fa-lg fa-fw"></i>
                                <?php echo e($name); ?>

                            </a>
                        </td>
                        <td>Folder</td>
                        <td>-</td>
                        <td>-</td>
                        <td>
                            <button type="button" class="btn btn-xs btn-danger" onclick="delete_folder('<?php echo e($name); ?>')">
                                <i class="fa fa-times-circle fa-lg"></i>
                                Delete
                            </button>
                         </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                
                <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <tr>
                        <td>
                            <a href="<?php echo e($file['webPath']); ?>">
                                <?php if(is_image($file['mimeType'])): ?>
                                <i class="fa fa-file-image-o fa-lg fa-fw"></i>
                                <?php else: ?>
                                <i class="fa fa-file-o fa-lg fa-fw"></i>
                                <?php endif; ?>
                                <?php echo e($file['name']); ?>

                            </a>
                        </td>
                        <td><?php echo e(isset($file['mimeType']) ? $file['mimeType'] : 'Unknown'); ?></td>
                        <td><?php echo e($file['modified']->format('j-M-y g:ia')); ?></td>
                        <td><?php echo e(human_filesize($file['size'])); ?></td>
                        <td>
                            <button type="button" class="btn btn-xs btn-danger" onclick="delete_file('<?php echo e($file['name']); ?>')">
                                <i class="fa fa-times-circle fa-lg"></i>
                                Delete
                            </button>
                            <?php if(is_image($file['mimeType'])): ?>
                                <button type="button" class="btn btn-xs btn-success" onclick="preview_image('<?php echo e($file['webPath']); ?>')">
                                    <i class="fa fa-eye fa-lg"></i>
                                    Preview
                                </button>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                </tbody>
            </table>

        </div>
    </div>
</div>

<?php echo $__env->make('admin.upload._modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>

    // 确认文件删除
    function delete_file(name) {
        $("#delete-file-name1").html(name);
        $("#delete-file-name2").val(name);
        $("#modal-file-delete").modal("show");
    }

    // 确认目录删除
    function delete_folder(name) {
        $("#delete-folder-name1").html(name);
        $("#delete-folder-name2").val(name);
        $("#modal-folder-delete").modal("show");
    }

    // 预览图片
    function preview_image(path) {
        $("#preview-image").attr("src", path);
        $("#modal-image-view").modal("show");
    }

    // 初始化数据
    $(function() {
        $("#uploads-table").DataTable();
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>