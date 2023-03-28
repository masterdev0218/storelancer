<?php echo e(Form::open(['url' => 'product_tax', 'method' => 'post'])); ?>

<div class="row">
    <div class="col-12">
        <div class="form-group">
            <?php echo e(Form::label('tax_name', __('Tax Name'),['class' => 'col-form-label'])); ?>

            <?php echo e(Form::text('tax_name', null, ['class' => 'form-control','placeholder' => __('Enter Tax Name'),'required' => 'required'])); ?>

        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <?php echo e(Form::label('rate', __('Rate').__(' (%)'),['class' => 'col-form-label'])); ?>

            <?php echo e(Form::text('rate', null, ['class' => 'form-control','placeholder' => __('Enter Rate'),'required' => 'required'])); ?>

        </div>
    </div>
    <div class="form-group col-12 d-flex justify-content-end col-form-label">
        <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-secondary btn-light" data-bs-dismiss="modal">
        <input type="submit" value="<?php echo e(__('Save')); ?>" class="btn btn-primary ms-2">
    </div>
</div>
<?php echo e(Form::close()); ?>

<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/storelancer/resources/views/producttax/create.blade.php ENDPATH**/ ?>