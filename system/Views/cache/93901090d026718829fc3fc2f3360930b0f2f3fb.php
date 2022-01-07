
<?php $__env->startSection('content'); ?>
    <div class="contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title">Supermaket Item Categories</h4>
                        <div class="breadcrumb-action justify-content-center flex-wrap">
                            <div class="action-btn">
                                <div class="form-group mb-0">
                                </div>
                            </div>
                            <div class="action-btn">
                                <a href="<?php echo e(url('supermarket-items/create')); ?>" class="btn btn-sm btn-primary btn-add">
                                    <i class="la la-plus"></i> Add New Supermaket Item
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <h6 class="mr-5">Categories</h6>
                    <div class="card card-horizontal card-default card-md mb-4 mt-2">
                        <div class="row mt-3 mr-2 ml-2">
                            <?php $__currentLoopData = $collection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-12 mt-1">
                                    <div class="card card-body shadow mb-3">
                                        <?php echo e($item->category); ?>

                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <!-- ends: .card -->
                </div>

                <div class="col-lg-8">
                    <h6 class="mr-5">Most Searched</h6>
                    <div class="card card-horizontal card-default card-md mb-4 mt-2">
                        <div class="row mt-3 mr-2 ml-2">
                            <?php $__currentLoopData = $collection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-4 mt-1">
                                    <div class="card card-body shadow mb-3 bg-success">
                                        <?php echo e($item->category); ?>

                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <!-- ends: .card -->
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('partials.admin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\supermarket\app\views/admin/supermarket/categories.blade.php ENDPATH**/ ?>