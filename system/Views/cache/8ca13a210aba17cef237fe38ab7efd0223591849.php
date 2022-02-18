
<?php $__env->startSection('content'); ?>
    <div class="contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title">co admin users </h4>
                        <div class="breadcrumb-action justify-content-center flex-wrap">
                            <div class="action-btn">
                                <div class="form-group mb-0">
                                </div>
                            </div>
                            <div class="action-btn">
                                <a href="<?php echo e(url('users/co-admin/create')); ?>" class="btn btn-sm btn-primary btn-add">
                                    <i class="la la-plus"></i> Add co Admin</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-horizontal card-default card-md mb-4">
                        <div class="row mt-5 mr-2 ml-2">
                            <div class="col-md-2 mt-3">
                                <h6 class="mr-5">Listing</h6>
                            </div>
                            <div class="col-md-10">
                                <input type="search" id="search" class="form-control" placeholder="search co admin users"
                                       onkeyup="filterTable('search', 'patientTable')">
                                <?php echo csrf_field(); ?>
                            </div>
                        </div>
                        <div class="card-body py-md-30">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="patientTable">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Email</th>
                                        <th>Joined On</th>
                                        <th colspan="2"></th>

                                    </tr>
                                    </thead>

                                    <tbody>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                            <td>
                                                <div class="d-flex">
                                                <div class="userDatatable__imgWrapper d-flex align-items-center">
                                                    <a href="<?php echo e(url('users/'.$item->id)); ?>" class="profile-image rounded-circle d-block m-0 wh-38" style="background-image:url('<?php echo e(asset('img/tm6.png')); ?>'); background-size: cover;"></a>
                                                </div>
                                                <div class="userDatatable-inline-title">
                                                    <a href="<?php echo e(url('users/'.$item->id)); ?>" class="text-dark fw-500">
                                                        <h6><?php echo e($item->fname); ?> <?php echo e($item->lname); ?></h6>
                                                    </a>
                                                    <p class="d-block mb-0">
                                                        <?php echo e($item->phone); ?>

                                                    </p>
                                                </div>
                                                </div>
                                            </td>
                                                <td>
                                                    <a href="mailto:<?php echo e($item->email); ?>"> <?php echo e($item->email); ?> </a>
                                                </td>
                                                <td><?php echo e(date('M d, Y', strtotime($item->created_at))); ?></td>
                                                <?php if(in_array('edit-users', session('user')->roles)): ?>
                                                    <td>
                                                        <a href="<?php echo e(url('users/co-admin/'.$item->id . '/edit')); ?>" title="edit details of <?php echo e($item->fname . " ".$item->lname); ?>"><i class="fas fa-pen-square text-primary"></i> </a>
                                                    </td>
                                                <?php endif; ?>

                                                <?php if(in_array('delete-users', session('user')->roles)): ?>
                                                    <td>
                                                        <a href="javascript:void(0)" data-url="<?php echo e(url('users/co-admin/'.$item->id)); ?>" data-resource-id="<?php echo e($item->id); ?>" title="Delete <?php echo e($item->fname . " ".$item->lname); ?>?" class="delete-resource-btn" ><i class="fas fa-trash-alt text-danger"></i> </a>
                                                    </td>
                                                <?php endif; ?>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- ends: .card -->
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('partials.admin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\supermarket\app\views/admin/super/co_admin.blade.php ENDPATH**/ ?>