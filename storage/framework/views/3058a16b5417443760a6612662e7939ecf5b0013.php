<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Plan Request')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
<h5 class="h4 d-inline-block font-weight-bold mb-0 text-white"><?php echo e(__('Plan Request')); ?></h5>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Plan Request')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table mb-0 dataTable">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Name')); ?></th>
                                    <th><?php echo e(__('Plan Name')); ?></th>
                                    <th><?php echo e(__('Max Products')); ?></th>
                                    <th><?php echo e(__('Max Stores')); ?></th>
                                    <th><?php echo e(__('Duration')); ?></th>
                                    <th><?php echo e(__('Created at')); ?></th>
                                    <th class="text-right"><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $plan_requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prequest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <div class="font-style font-weight-bold"><?php echo e($prequest->user->name); ?></div>
                                        </td>
                                        <td>
                                            <div class="font-style font-weight-bold"><?php echo e($prequest->plan->name); ?></div>
                                        </td>
                                        <td>
                                            <div class="font-weight-bold"><?php echo e($prequest->plan->max_products); ?></div>
                                            <div><?php echo e(__('Products')); ?></div>
                                        </td>
                                        <td>
                                            <div class="font-weight-bold"><?php echo e($prequest->plan->max_stores); ?></div>
                                            <div><?php echo e(__('Stores')); ?></div>
                                        </td>
                                        <td>
                                            <div class="font-style font-weight-bold"><?php echo e(($prequest->duration == 'monthly') ? __('One Month') : __('One Year')); ?></div>
                                        </td>
                                        <td><?php echo e(\App\Models\Utility::getDateFormated($prequest->created_at,true)); ?></td>
                                        <td>
                                            <div>
                                                <a href="<?php echo e(route('response.request',[$prequest->id,1])); ?>" class="btn btn-success btn-sm">
                                                    <i class="fas fa-check"></i>
                                                </a>
                                                <a href="<?php echo e(route('response.request',[$prequest->id,0])); ?>" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/storelancer/public_html/resources/views/plan_request/index.blade.php ENDPATH**/ ?>