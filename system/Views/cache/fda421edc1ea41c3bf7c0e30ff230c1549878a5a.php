
<?php $__env->startSection('content'); ?>
    <div class="contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title">User Profile</h4>
                        <div class="breadcrumb-action justify-content-center flex-wrap">
                            <div class="action-btn">
                                <div class="form-group mb-0">
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="card card-body shadow">
                                <?php if(session('user')->account_type !== 'customer'): ?>
                                    
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <img src="<?php echo e(asset('img/undraw_profile.svg')); ?>" class="rounded-circle" alt="profile photo"/>
                                            <h5 class="text-center"><?php echo e($collection->email); ?></h5>
                                            <h5 class="text-center">(<?php echo e(strtoupper($collection->account)); ?>)</h5>
                                            <h5>Joined on: <?php echo e(date("D d M, Y", strtotime($collection->created_at))); ?></h5>
                                        </div>
                                        <div class="col-lg-8">
                                            <h5>NAME: <?php echo e($collection->fname); ?> <?php echo e($collection->lname); ?></h5>
                                            <br>
                                            <h5>PHONE: <?php echo e($collection->phone); ?></h5>
                                            <br>
                                            <?php if(session('user')->account_type === 'admin'): ?>
                                                <h5>SUPERMARKET: <?php echo e($collection->name); ?></h5>
                                            <?php endif; ?>
                                            <br/>
                                            <h4><u>Privileges</u></h4>
                                            <?php
                                                $roles = explode(',', $collection->roles);
                                            ?>
                                            <div class="row">
                                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-md-6">
                                                        <div class="card card-body py-1 shadow mt-2"><?php echo e(strtoupper(str_replace('-', ' ', $role))); ?></div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php else: ?>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <img src="<?php echo e(asset('img/undraw_profile.svg')); ?>" class="rounded-circle" alt="profile photo"/>
                                        <h5 class="text-center"><?php echo e($collection->email); ?></h5>
                                        
                                    </div>
                                    <div class="col-lg-8">
                                        <h5>NAME: <?php echo e($collection->fname); ?> <?php echo e($collection->lname); ?></h5>
                                        <br>
                                        <h5>PHONE: <?php echo e($collection->phone); ?></h5>
                                        <br/>
                                        <h5>Joined on: <?php echo e(date("D d M, Y", strtotime($collection->created_at))); ?></h5>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('partials.admin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\supermarket\app\views/admin/profile.blade.php ENDPATH**/ ?>