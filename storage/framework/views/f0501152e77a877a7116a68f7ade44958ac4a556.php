<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Product')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 "><?php echo e(__('Product')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('product.index')); ?>"><?php echo e(__('Product')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e($product->name); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <div class="">
        <a href="<?php echo e(route('product.edit', $product->id)); ?>" class="btn btn-sm btn-primary btn-icon m-1"
            data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Edit Product')); ?>"><i
                class="ti ti-pencil text-white"></i></a>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('filter'); ?>
<?php $__env->stopSection(); ?>
<?php
    $logo=\App\Models\Utility::get_file('uploads/is_cover_image/');
    $p_logo=\App\Models\Utility::get_file('uploads/product_image/');
?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <!-- Product title -->
                    <h5 class="h4"><?php echo e($product->name); ?></h5>
                    <!-- Rating -->
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <span class="static-rating static-rating-sm d-block">
                                <?php for($i = 1; $i <= 5; $i++): ?>
                                    <?php
                                        $icon = 'fa-star';
                                        $color = '';
                                        $newVal1 = $i - 0.5;
                                        if ($avg_rating < $i && $avg_rating >= $newVal1) {
                                            $icon = 'fa-star-half-alt';
                                        }
                                        if ($avg_rating >= $newVal1) {
                                            $color = 'text-warning';
                                        }
                                    ?>
                                    <i class="fas <?php echo e($icon . ' ' . $color); ?>"></i>
                                <?php endfor; ?>
                                <?php echo e($avg_rating); ?>/5 (<?php echo e($user_count); ?> <?php echo e(__('reviews')); ?>)
                            </span>
                        </div>
                        <div class="col-sm-6 text-sm-right">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <span
                                        class="badge badge-pill badge-soft-info"><?php echo e(__('ID: #')); ?><?php echo e($product->SKU); ?></span>
                                </li>
                                <li class="list-inline-item">
                                    <?php if($product->enable_product_variant != 'on'): ?>
                                        <?php if($product->quantity == 0): ?>
                                            <span class="badge badge-pill badge-soft-danger">
                                                <?php echo e(__('Out of stock')); ?>

                                            </span>
                                        <?php else: ?>
                                            <span class="badge badge-pill badge-soft-success">
                                                <?php echo e(__('In stock')); ?>

                                            </span>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Description -->
                    <?php echo $product->description; ?>

                </div>
            </div>

            <div class="card">
                <div class="card-body p-3 d-flex justify-content-between">
                    <h5 class="float-left mb-0 pt-2"><?php echo e(__('Rating')); ?></h5>
                    <a href="#" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip" data-size="md"
                        data-toggle="modal" data-url="<?php echo e(route('rating', [$store->slug, $product->id])); ?>"
                        data-ajax-popup="true" data-title="<?php echo e(__('Create New Rating')); ?>" data-bs-placement="top"
                        title="<?php echo e(__('Create New Rating')); ?>"><i class="ti ti-plus"></i></a>
                </div>
                <?php $__currentLoopData = $product_ratings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_key => $product_rating): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div id="review_list" class="px-3 pt-2 border-top pb-0">
                        <div class="d-flex justify-content-between">
                            <div class="theme-review float-left" id="comment_126267">
                                <div class="theme_review_item">
                                    <div class="theme-review__heading">
                                        <div class="theme-review__heading__item text-sm small">
                                            <h6><?php echo e($product_rating->title); ?></h6>
                                            <tr class="list-dotted ">
                                                <td class="list-dotted__item">by <?php echo e($product_rating->name); ?> :</td>
                                                <td class="list-dotted__item">
                                                    <?php echo e($product_rating->created_at->diffForHumans()); ?></td>
                                            </tr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                    <span class="m-0">
                                        <div class="action-btn  bg-info ms-2">
                                            <a href="#" data-size="md"
                                                class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                data-url="<?php echo e(route('rating.edit', $product_rating->id)); ?>"
                                                data-ajax-popup="true" data-title="<?php echo e(__('Edit Rating')); ?>"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="<?php echo e(__('Edit Rating ')); ?>"><i
                                                    class="ti ti-pencil text-white"></i></a>
                                        </div>
                                        <div class="action-btn bg-danger ms-2">
                                        <a class="bs-pass-para align-items-center btn btn-sm d-inline-flex"  data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="<?php echo e(__('Delete')); ?>" href="#" data-title="<?php echo e(__('Delete Lead')); ?>" data-confirm="<?php echo e(__('Are You Sure?')); ?>" data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="delete-form-<?php echo e($product_rating->id); ?>">
                                            <i class="ti ti-trash"></i>

                                        </a>
                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['rating.destroy', $product_rating->id],'id'=>'delete-form-'.$product_rating->id]); ?>

                                        <?php echo Form::close(); ?>




                                        </div>
                                    </span>
                                <div class="rate">
                                    <?php for($i = 0; $i < 5; $i++): ?>
                                        <i
                                            class="fas fa-star <?php echo e($product_rating->ratting > $i ? 'text-warning' : ''); ?>"></i>
                                    <?php endfor; ?>
                                </div>
                            </div>
                        </div>
                        <span class="clearfix"></span>
                        <div class="d-flex mt-2 justify-content-end">
                            <div class="custom-control form-switch">
                                <input type="checkbox" class="form-check-input rating_view" name="rating_view"
                                    id="enable_rating<?php echo e($product_key); ?>" data-id="<?php echo e($product_rating['id']); ?>"
                                    <?php echo e($product_rating->rating_view == 'on' ? 'checked' : ''); ?>>
                                    <label class="custom-control-label form-check-label"
                                    for="enable_rating<?php echo e($product_key); ?>"></label>
                            </div>
                        </div>
                        <br>
                        <div class="main_reply_body">
                            <p class="small pt-2"><?php echo e($product_rating->description); ?></p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <div class="col-lg-6">
            <?php if($product->enable_product_variant == 'on'): ?>
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <input type="hidden" id="product_id" value="<?php echo e($product->id); ?>">
                            <input type="hidden" id="variant_id" value="">
                            <input type="hidden" id="variant_qty" value="">
                            <?php $__currentLoopData = $product_variant_names; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-sm-6 mb-4 mb-sm-0">
                                    <span class="d-block h6 mb-0">
                                        <th>
                                            <label for="" class="col-form-label"> <?php echo e(ucfirst($variant->variant_name)); ?></label>

                                        </th>
                                        <select name="product[<?php echo e($key); ?>]" id='choices-multiple-<?php echo e($key); ?>'  class="form-control multi-select  pro_variants_name<?php echo e($key); ?> change_price">
                                        <option value=""><?php echo e(__('Select')); ?></option>
                                            <?php $__currentLoopData = $variant->variant_options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($values); ?>"><?php echo e($values); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    </span>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-sm-6 mb-4 mb-sm-0">
                            <span class="d-block h3 mb-0 variasion_price">
                                <?php if($product->enable_product_variant == 'on'): ?>
                                    <?php echo e(\App\Models\Utility::priceFormat(0)); ?>

                                <?php else: ?>
                                    <?php echo e(\App\Models\Utility::priceFormat($product->price)); ?>

                                <?php endif; ?>

                            </span>
                            <?php echo e(!empty($product->product_taxs) ? $product->product_taxs->name : ''); ?>

                            <?php echo e(!empty($product->product_taxs->rate) ? $product->product_taxs->rate . '%' : ''); ?>

                        </div>
                        <div class="col-sm-6 d-flex justify-content-end">
                            <button class="btn noHover btn-primary btn-icon ">
                                <span class="btn-inner--icon variant_qty  ">
                                     <?php if($product->enable_product_variant =='on'): ?>
                                        0
                                    <?php else: ?>
                                        <?php echo e($product->quantity); ?>

                                    <?php endif; ?>
                                </span>
                                <span class="btn-inner--text">
                                    <?php echo e(__('Total Avl.Quantity')); ?>

                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product images -->
            <div class="card">
                <div class="card-body">
                    <?php if(!empty($product->is_cover)): ?>
                        <a href="<?php echo e(asset(Storage::url('uploads/is_cover_image/' . $product->is_cover))); ?>"
                            data-fancybox="product">
                            <img alt="Image placeholder"
                                src="<?php echo e(asset(Storage::url('uploads/is_cover_image/' . $product->is_cover))); ?>"
                                class="img-center pro_max_width1">
                        </a>
                    <?php else: ?>
                        <a href="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                            data-fancybox="product">
                            <img alt="Image placeholder"
                                src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                class="img-center pro_max_width1">
                        </a>
                    <?php endif; ?>
                    <div class="row mt-4">
                        <?php $__currentLoopData = $product_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-4">
                                <div class="p-3 border rounded">
                                    <?php if(!empty($product_image[$key]->product_images)): ?>
                                        
                                        <a href="<?php echo e($p_logo.(isset($product_image[$key]->product_images) && !empty($product_image[$key]->product_images)?$product_image[$key]->product_images:'is_cover_image.png')); ?>"
                                            class="stretched-link" data-fancybox="product">
                                            <img alt="Image placeholder"
                                            src="<?php echo e($p_logo.(isset($product_image[$key]->product_images) && !empty($product_image[$key]->product_images)?$product_image[$key]->product_images:'is_cover_image.png')); ?>"
                                                class="img-fluid">
                                        </a>
                                    <?php else: ?>
                                        
                                        <a href="<?php echo e($p_logo.(isset($product_image[$key]->product_images) && !empty($product_image[$key]->product_images)?$product_image[$key]->product_images:'is_cover_image.png')); ?>"
                                            class="stretched-link" data-fancybox="product">
                                            <img alt="Image placeholder"
                                            src="<?php echo e($p_logo.(isset($product_image[$key]->product_images) && !empty($product_image[$key]->product_images)?$product_image[$key]->product_images:'is_cover_image.png')); ?>"
                                                class="img-fluid">
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).on('change', '.rating_view', function() {
            var id = $(this).attr('data-id');
            var status = 'off';
            if ($(this).is(":checked")) {
                status = 'on';
            }
            var data = {
                id: id,
                status: status
            }

            $.ajax({
                url: '<?php echo e(route('rating.rating_view')); ?>',
                method: 'POST',
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    show_toastr('success', data.success, 'success');
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                }
            });
        });


        $(document).on('change', '.change_price', function () {
            var variants = [];
            $(".change_price").each(function (index, element) {
                variants.push(element.value);
            });
            if (variants.length > 0) {
                $.ajax({
                    url: '<?php echo e(route('get.products.variant.quantity')); ?>',
                    data: {
                        "_token": $('meta[name="csrf-token"]').attr('content'),
                        variants: variants.join(' : '),
                        product_id: $('#product_id').val()
                    },

                    success: function (data) {
                        console.log(data);
                        $('.variasion_price').html(data.price);
                        $('#variant_id').val(data.variant_id);
                        $('.variant_qty').html(data.quantity);
                    }
                });
            }
        });

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/storelancer/resources/views/product/view.blade.php ENDPATH**/ ?>