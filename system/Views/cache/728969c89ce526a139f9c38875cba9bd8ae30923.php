
<?php $__env->startSection('content'); ?>
    <div class="contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title">User Settings</h4>
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
                    <div class="card card-horizontal card-default card-md mb-4">
                        <div class="card-body py-md-30">
                            <form action="<?php echo e(url('users/co-admin/update')); ?>" method="post" id="addUserForm">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <i class="fas fa-envelope text-success"></i> 
                                    <input type="email" name="email" class="form-control" placeholder="enter your email or phone number" autocomplete="off" value="<?php echo e($collection->email); ?>" readonly/>
                                    <input type="hidden" name="id" value="<?php echo e($collection->id); ?>"/>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="fname">First Name</label>
                                            <input type="text" name="fname" class="form-control" placeholder="enter your first name " autocomplete="off" value="<?php echo e($collection->fname); ?>" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="lname">Last Name</label>
                                            <input type="text" name="lname" class="form-control" placeholder="enter your last name " autocomplete="off" value="<?php echo e($collection->lname); ?>" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="number" name="phone" class="form-control" placeholder="enter your phone number" value="<?php echo e($collection->phone); ?>" autocomplete="off" required/>
                                </div>

                                <h4><u>Change Password</u></h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password">New Password</label>
                                            <input type="password" name="password" id="password" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password">Confirm New Password</label>
                                            <input type="password" name="password2" id="password2" class="form-control"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" id="add-user-btn" class="btn btn-success">SAVE CHANGES</button><br/>
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
        request({form: 'addUserForm', btn: 'add-user-btn'});
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('partials.admin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\supermarket\app\views/admin/settings.blade.php ENDPATH**/ ?>