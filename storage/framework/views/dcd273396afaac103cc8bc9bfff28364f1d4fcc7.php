<?php echo e(Form::model($pageOption, ['route' => ['custom-page.update', $pageOption->id], 'method' => 'PUT'])); ?>

<div class="row">
    <div class="col-12">
        <div class="form-group">
            <?php echo e(Form::label('name',__('Name'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Enter Name')])); ?>

            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-name" role="alert">
                    <strong class="text-danger"><?php echo e($message); ?></strong>
                </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
    </div>
    <div class="form-group col-md-6">
        <div class="custom-control form-switch">
            <input type="checkbox" class="form-check-input" name="enable_page_header" id="enable_page_header"
                <?php echo e($pageOption['enable_page_header'] == 'on' ? 'checked=checked' : ''); ?>>
            <?php echo e(Form::label('enable_page_header', __('Page Header Display'), ['class' => 'form-check-label mb-3'])); ?>

        </div>
    </div>
    
    <div>
        <button onclick="window.open('/page-builder/<?php echo e($pageOption->id); ?>')" type="button" class="btn btn-primary ms-2 w-100">Edit Page</button>
    </div>
</div>
<div class="form-group col-12 d-flex justify-content-end col-form-label">
    <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-secondary btn-light" data-bs-dismiss="modal">
    <input type="submit" value="<?php echo e(__('Update')); ?>" class="btn btn-primary ms-2">
</div>
<?php echo e(Form::close()); ?>

<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/storelancer_new/resources/views/pageoption/edit.blade.php ENDPATH**/ ?>