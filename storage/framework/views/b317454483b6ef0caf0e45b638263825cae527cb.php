<div class="form-group">
    <label for="title" class="col-md-3 control-label">
        Title
    </label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="title" id="title" value="<?php echo e($title); ?>">
    </div>
</div>

<div class="form-group">
    <label for="subtitle" class="col-md-3 control-label">
        Subtitle
    </label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="subtitle" id="subtitle" value="<?php echo e($subtitle); ?>">
    </div>
</div>

<div class="form-group">
    <label for="meta_description" class="col-md-3 control-label">
        Meta Description
    </label>
    <div class="col-md-8">
        <textarea class="form-control" id="meta_description" name="meta_description" rows="3">
            <?php echo e($meta_description); ?>

        </textarea>
    </div>
</div>

<div class="form-group">
    <label for="page_image" class="col-md-3 control-label">
        Page Image
    </label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="page_image" id="page_image" value="<?php echo e($page_image); ?>">
    </div>
</div>

<div class="form-group">
    <label for="layout" class="col-md-3 control-label">
        Layout
    </label>
    <div class="col-md-4">
        <input type="text" class="form-control" name="layout" id="layout" value="<?php echo e($layout); ?>">
    </div>
</div>

<div class="form-group">
    <label for="reverse_direction" class="col-md-3 control-label">
        Direction
    </label>
    <div class="col-md-7">
        <label class="radio-inline">
            <input type="radio" name="reverse_direction" id="reverse_direction"
                    <?php if(! $reverse_direction): ?>
                        checked="checked"
                    <?php endif; ?>
                     value="0"> 
            Normal
        </label>
        <label class="radio-inline">
            <input type="radio" name="reverse_direction"
                <?php if($reverse_direction): ?>
                    checked="checked"
                <?php endif; ?>
                value="1"> 
            Reversed
        </label>
    </div>
</div>