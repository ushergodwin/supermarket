
<?php $__env->startSection('content'); ?>
    <section class="contents">
        <section class="container-fluid">
            <div class="row mt-2">
                <div class="col-lg-4">
                    <div class="jumbotron py-1 mt-3">
                        <h5><u>Categories</u></h5>
                        <div class="row">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-12 mt-2">
                                    <?php if($item->category == $category): ?>
                                        <div class="alert alert-success shadow">
                                            <h6><?php echo e($item->category); ?></h6>
                                            <a href="<?php echo e(url('user/dashboard/supermarket/' . $db . '/' . $item->category)); ?>" class="stretched-link">
                                            </a>
                                        </div>
                                    <?php else: ?>
                                        <div class="alert alert-info">
                                            <h6><?php echo e($item->category); ?></h6>
                                            <a href="<?php echo e(url('user/dashboard/supermarket/' . $db . '/' . $item->category)); ?>" class="stretched-link">
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <h5><u>All ITEMS FOR <?php echo e($supermarket); ?> IN THE <?php echo e(strtoupper($category)); ?> CATEGORY</u></h5>
                    <div class="row">
                        <?php $__currentLoopData = $collection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4">
                                <div class="card mt-3">
                                    <div class="card-body shadow">
                                        <h4 class="font-weight-bold"><?php echo e($item->name); ?></h4>
                                        <h6 class="mt-1">Price: UGX <?php echo e(number_format($item->price, 2)); ?> /=</h6>
                                        <h6 class="mt-1 text-muted">Location: Column <?php echo e($item->column_number); ?>, on the <?php echo e(strtoupper(str_replace('-', ' ', $item->position))); ?> side.</h6>
                                    </div>
                                    <div class="card-footer">
                                        <a href="javascript:;" class="stretched-link shopping-list"
                                        data-item_name="<?php echo e($item->name); ?>"
                                        data-item_price="<?php echo e($item->price); ?>"
                                        data-item_column_number="<?php echo e($item->column_number); ?>"
                                        data-item_position="<?php echo e($item->position); ?>"
                                        data-supermarket="<?php echo e($supermarket); ?>"
                                        data-url="<?php echo e(url('user/dashboard/shopping-list')); ?>"
                                        data-_token="<?php echo e(_token()); ?>"> Add Items to Shopping List
                                            <span data-feather="shopping-cart" class="nav-icon"></span> 
                                        </a>
                                    </div>
                                </div>
                                
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <div class="fixed-bottom response"></div>
        </section>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">
        jQuery(()=> {
            $(".shopping-list").on('click', function(){
                $(this).html("<span class='spinner-border spinner-border-sm'></span> adding item...");
                $.ajax({
                    url: $(this).data('url'),
                    type: "POST",
                    data: $(this).data()
                }).done((response) => {
                    $(this).html("Add Item to Shopping List");
                    $(".response").html(response).fadeOut(10000);
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('partials.user.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\supermarket\app\views/user/supermarket_items_cat.blade.php ENDPATH**/ ?>