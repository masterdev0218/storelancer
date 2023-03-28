<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Login')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="wrapper mt-6">
        <section class="login-section padding-top padding-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-12 mx-auto mt-5">

                        <?php echo Form::open(array('route' => array('customer.login', $slug,(!empty($is_cart) && $is_cart==true)?$is_cart:false)),['method'=>'POST']); ?>

                            <div class="form-group mb-3 mt-2">
                                <label for="logInEmail" class="form-label mt-2"><?php echo e(__('Username')); ?></label>
                                    <?php echo e(Form::text('email',null,array('class'=>'form-control','placeholder'=>__('Enter Your Email')))); ?>

                            </div>
                            <div class="form-group mb-3 ">
                                <label for="password" class="form-label"><?php echo e(__('Password')); ?></label>
                                <?php echo e(Form::password('password',array('class'=>'form-control','id'=>'exampleInputPassword1','placeholder'=>__('Enter Your Password')))); ?>

                            </div>
                            <div class="form-group mt-5 mb-3">
                                <p class="m-0"><?php echo e(__('By using the system, you accept the')); ?> <a href=""
                                        class="text-primary">
                                        <?php echo e(__('Privacy Policy')); ?> </a><?php echo e(__('and')); ?> <a href="" class="text-primary"> <?php echo e(__('System Regulations.')); ?>

                                    </a>
                                </p>
                                <button type="submit" class="btn btn-primary submit-btn mt-3"><?php echo e(__('Sign In')); ?></button>
                            </div>
                        <?php echo e(Form::close()); ?>


                        <div class="register-tag text-center mt-5">
                            <p><?php echo e(__('Dont have account ?')); ?> <a href="<?php echo e(route('store.usercreate',$slug)); ?>" class="text-primary"> <?php echo e(__('register now')); ?> </a> </p>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme10', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ahmedwaleed/dev/storelancer/resources/views/storefront/theme10/user/login.blade.php ENDPATH**/ ?>