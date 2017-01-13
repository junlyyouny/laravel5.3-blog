

<?php $__env->startSection('styles'); ?>
    <link href="/assets/pickadate/themes/default.css" rel="stylesheet">
    <link href="/assets/pickadate/themes/default.date.css" rel="stylesheet">
    <link href="/assets/pickadate/themes/default.time.css" rel="stylesheet">
    <link href="/assets/selectize/css/selectize.css" rel="stylesheet">
    <link href="/assets/selectize/css/selectize.bootstrap3.css" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row page-title-row">
        <div class="col-md-12">
            <h3>Posts <small>» Add New Post</small></h3>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">New Post Form</h3>
                </div>
                <div class="panel-body">

                    <?php echo $__env->make('admin.partials.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <form class="form-horizontal" role="form" method="POST" action="/admin/post">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                        <?php echo $__env->make('admin.post._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                        <div class="col-md-8">
                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-2">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fa fa-disk-o"></i>
                                        Save New Post
                                    </button>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="/assets/pickadate/picker.js"></script>
<script src="/assets/pickadate/picker.date.js"></script>
<script src="/assets/pickadate/picker.time.js"></script>
<script src="/assets/selectize/selectize.min.js"></script>
<script>
    $(function() {
        $("#publish_date").pickadate({
            format: "mmm-d-yyyy"
        });
        $("#publish_time").pickatime({
            format: "h:i A"
        });
        $("#tags").selectize({
            create: true
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>