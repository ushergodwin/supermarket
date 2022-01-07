
<?php $__env->startSection('content'); ?>
    <section class="contents">
        <section class="container-fluid">
            <div class="row mt-2">
                <?php $__currentLoopData = $collection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4">
                        <div class="card mt-3">
                            <div class="card-body shadow">
                                <h5><?php echo e($item->name); ?></h5>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo e(url('user/dashboard/supermarkets/' . $item->db_name)); ?>" class="stretched-link">View Items </a>
                            </div>
                        </div>
                        
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('partials.user.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\supermarket\app\views/user/supermarkets.blade.php ENDPATH**/ ?>