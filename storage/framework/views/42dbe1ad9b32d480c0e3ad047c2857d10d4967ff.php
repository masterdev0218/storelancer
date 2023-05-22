<?php $__env->startSection('page-title'); ?>
    <?php echo e(ucfirst($pageoption->name)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
    <style>
        .shoping_count:after {
            content: attr(value);
            font-size: 14px;
            background: #273444;
            border-radius: 50%;
            padding: 1px 5px 1px 4px;
            position: relative;
            left: -5px;
            top: -10px;
        }

        .pagedetails {
            word-break: break-all;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php
    if(!empty(session()->get('lang')))
    {
        $currantLang = session()->get('lang');
    }else{
        $currantLang = $store->lang;
    }
    $languages=\App\Models\Utility::languages();
?>
<?php $__env->startSection('content'); ?>
<div class="wrapper">
    <section class="contact-us-section padding-top padding-bottom">
        <div class="container">
            <div class="contact-content">
                <h4><?php echo e(ucfirst($pageoption->name)); ?></h4>
                <p><?php echo $pageoption->contents; ?>

                </p>
            </div>
        </div>
    </section>    
</div>    
<?php $__env->stopSection(); ?>



<?php echo $__env->make('storefront.layout.theme4', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/storelancer_new/resources/views/storefront/theme4/pageslug.blade.php ENDPATH**/ ?>