<?php $__env->startSection('page-title'); ?>
<?php echo e(__('Varify-Email')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
 <div class="card-body">
    <?php if(session('status') == 'verification-link-sent'): ?>
        <div class="mb-4 font-medium text-sm text-green-600 text-primary">
            <?php echo e(__('A new verification link has been sent to the email address you provided during registration.')); ?>

        </div>
    <?php endif; ?>
    <div class="mb-4 text-sm text-gray-600">
        <?php echo e(__('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.')); ?>

    </div>
    <div class="mt-4 flex items-center justify-between">
        <div class="row">
            <div class="col-auto">
                <form method="POST" action="<?php echo e(route('verification.send')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-primary btn-sm">
                        <?php echo e(__('Resend Verification Email')); ?>

                    </button>
                </form>
            </div>
            <div class="col-auto">
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-danger btn-sm">
                        <?php echo e(__('Logout')); ?></button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/storelancer_new/resources/views/auth/verify-email.blade.php ENDPATH**/ ?>