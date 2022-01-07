<?php if(!empty(response()->message())): ?>
    <?php
        $message = response()->message();
    ?>
    <?php if(array_key_exists('success', $message)): ?>
        <!-- Success Alert -->
        <div class="alert alert-success alert-dismissible fade show">
            <strong>Success!</strong> &nbsp;&nbsp;<?php echo e($message['success']); ?>

            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    <?php else: ?>
        <?php if(array_key_exists('failed', $message)): ?>
            <!-- Error Alert -->
            <div class="alert alert-danger alert-dismissible fade show mt-1">
                <strong>Error!</strong> &nbsp;&nbsp;<?php echo e($message['failed']); ?>

                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        <?php endif; ?>
    <?php endif; ?>
<?php else: ?>
    <?php if(!empty(response()->errors())): ?>
        <?php $__currentLoopData = response()->errors(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="alert alert-danger alert-dismissible fade show mt-1">
                <strong>Error!</strong> &nbsp;&nbsp;<?php echo e($item); ?>

                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\supermarket\app\views/partials/notification.blade.php ENDPATH**/ ?>