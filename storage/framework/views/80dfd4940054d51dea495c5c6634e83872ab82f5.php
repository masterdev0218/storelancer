<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Register')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<div class="main-content">
    <section class="mh-100vh d-flex align-items-center" data-offset-top="#header-main">
        <!-- SVG background -->
        <div class="bg-absolute-cover bg-size--contain d-flex align-items-center zindex0">
            <figure class="w-100 px-4">
                <img alt="Image placeholder" src="<?php echo e(asset('assets/img/bg-3.svg')); ?>" class="svg-inject">
            </figure>
        </div>
        <div class="container pt-6 position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="text-center">
                        <!-- Empty cart container -->
                        <div class="login-form">
                            <div class="categories-heading mb-4 float-left">
                                <h2 class=""><?php echo e(__('Customer')); ?> <span> <?php echo e(__('Register')); ?> </span></h2>
                            </div>
                            <?php echo Form::open(array('route' => array('store.userstore', $slug),'class'=>'login-form-main py-5'), ['method' => 'post']); ?>

                            <div class="form-group mt-2">
                            <label for="exampleInputEmail1" class="form-label float-left w-100 text-left"><?php echo e(__('Full Name')); ?></label>
                            <input name="name" class="form-control" type="text" placeholder="<?php echo e(__('Full Name *')); ?>" required="required">
                        </div>
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="error invalid-email text-danger" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label float-left"><?php echo e(__('Email')); ?></label>
                            <input name="email" class="form-control" type="email" placeholder="<?php echo e(__('Email *')); ?>" required="required">
                        </div>
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="error invalid-email text-danger" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label float-left"><?php echo e(__('Number')); ?></label>
                            <input name="phone_number" class="form-control" type="text" placeholder="<?php echo e(__('Number *')); ?>" required="required">
                        </div>
                        <?php $__errorArgs = ['number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="error invalid-email text-danger" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label float-left"><?php echo e(__('Password')); ?></label>
                            <input name="password" class="form-control" type="password" placeholder="<?php echo e(__('Password *')); ?>" required="required">
                        </div>
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="error invalid-email text-danger" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label float-left"><?php echo e(__('Confirm Password')); ?></label>
                            <input name="password_confirmation" class="form-control" type="password" placeholder="<?php echo e(__('Confirm Password *')); ?>" required="required">
                        </div>
                        <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="error invalid-email text-danger" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <div class="log_in_btn form-group mt-5 mb-3 d-flex align-items-center">
                            <button type="submit" class="btn btn-primary rounded-pill hover-translate-y-n3 btn-icon mr-sm-4 scroll-me text-nowrap"><?php echo e(__('Register')); ?></button>
                            <p><?php echo e(__('By using the system, you accept the')); ?> <a href="" class="text-primary"> <?php echo e(__('Privacy Policy')); ?> </a> and <a href="" class="text-primary"> <?php echo e(__('System Regulations')); ?>. </a></p>
                        </div>
                        <?php echo Form::close(); ?>

                        <?php echo e(__('Already registered ?')); ?>

                        <a href="<?php echo e(route('customer.loginform',$slug)); ?>" class="text-primary"><?php echo e(__('Login')); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/storelancer/resources/views/storefront/theme1/user/create.blade.php ENDPATH**/ ?>