
<?php $__env->startSection('content'); ?>
<section class="contents">
    <section class="container-fluid mt-3">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <?php if(isset($_SESSION['notebook'])): ?>
                    <?php echo session('notebook'); ?>

                    <?php
                        unset($_SESSION['notebook']);
                    ?>
                <?php endif; ?>
                <h4>Create Item Notes</h4>
                <div class="response" id="response"></div>
                <div class="card card-body shadow mt-2">
                    <form action="<?php echo e(url('user/dashboard/notebook/update')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="supermarket_name" class="w-100">
                                Supermarket Name
                                <select name="supermarket_name" class="form-control" required>
                                    <option value="">-- select supermart --</option>
                                    <?php $__currentLoopData = $collection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->db_name); ?>" <?php echo e(old('supermarket_name') == $item->db_name ? 'selected' : ''); ?>><?php echo e($item->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="items" class="w-100">
                                Items&nbsp;
                                (<span class="text-muted">Separate multiple items with commas (,)</span>)
                                <textarea name="items" class="form-control" rows="5"><?php echo e(old('items')); ?></textarea>
                            </label>
                        </div>
                        <div class="d-flex justify-content-end">
                            <input type="hidden" name="notebook_id" value="<?php echo e($notebook_id); ?>"/>
                            <input type="hidden" name="notebook_name" value="<?php echo e($notebook_name); ?>"/>
                            <button type="submit" class="btn btn-success" id="list-btn">Save Item in the Notebook</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('partials.user.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\supermarket\app\views/user/notes.blade.php ENDPATH**/ ?>