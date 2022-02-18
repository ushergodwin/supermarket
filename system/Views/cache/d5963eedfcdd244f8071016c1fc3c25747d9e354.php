
<?php $__env->startSection('content'); ?>
    <div class="contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title">Edit <?php echo e($supermarket); ?></h4>
                        <div class="breadcrumb-action justify-content-center flex-wrap">
                            <div class="action-btn">
                                <div class="form-group mb-0">
                                </div>
                            </div>
                            <div class="action-btn">
                                <a href="<?php echo e(url('users/create')); ?>" class="btn btn-sm btn-primary btn-add">
                                    <i class="la la-plus"></i> Add New Supermarket</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?php echo $__env->make('partials.notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="card card-horizontal card-default card-md mb-4">
                        <div class="card-body py-md-30">
                            <form action="<?php echo e(route('supermarkets.index')); ?>" method="POST" id="supermarketDetailsForm">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="name">Supermarket Name</label>
                                            <input type="text" name="name" class="form-control" 
                                            placeholder="enter your email or phone number" autocomplete="off"
                                            value="<?php echo e($collection->name); ?>" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="owner">Owner</label>
                                            <select name="owner" class="form-control" required>
                                                <option value="">-- select owner --</option>
                                                <?php if(!empty($users)): ?>
                                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($item->id); ?>" <?php echo e($collection->owner == $item->id ? " selected" : ""); ?>><?php echo e($item->fname . " " . $item->lname); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="expiry_date" class="w-100">
                                                Expires On 
                                                <input type="date" name="expiry_date" class="form-control" value="<?php echo e($collection->expires); ?>"/>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="fee" class="w-100">
                                                Subscription Fee
                                                <div class="mt-1">
                                                    <input type="number" name="fee" class="form-control" value="<?php echo e($collection->fee); ?>"/>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="expiry_date" class="w-100">
                                                Is Expired?
                                                <div class="mt-1">
                                                    <input type="radio" name="is_expired" class="custom-checkbok" value="1"<?php echo e($collection->expired == 1 ? " checked" : ""); ?>/> Yes
                                                    <input type="radio" name="is_expired" class="custom-checkbok ml-3" value="0"<?php echo e($collection->expired == 0 ? " checked" : ""); ?>/> No
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <input type="hidden" name="id" value="<?php echo e($collection->id); ?>"/>
                                    <?php echo method_field("PUT"); ?>
                                    <button type="submit" id="add-supermarket-btn" class="btn btn-success">SAVE CHANGES</button><br/>
                                </div>
                                <div class="response" id="response"></div>
                            </form>
                        </div>
                    </div>
                    <!-- ends: .card -->
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script> 
        request({form: 'supermarketDetailsForm', btn: 'add-supermarket-btn'})
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('partials.admin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\supermarket\app\views/admin/super/edit_supermarket.blade.php ENDPATH**/ ?>