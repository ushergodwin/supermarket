
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/chat.css')); ?>" type="text/css"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title">Support Center</h4>
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
                        <div class="row mt-5 mr-2 ml-2">
                            <div class="col-md-2 mt-3">
                                <h6 class="mr-5">Listing</h6>
                            </div>
                            <div class="col-md-10">
                                <input type="search" id="search" class="form-control" placeholder="search chat request"
                                       onkeyup="filterTable('search', 'patientTable')">
                                <input type="hidden" name="_token" value="<?php echo e(_token()); ?>">
                            </div>
                        </div>
                        <div class="card-body py-md-30">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="patientTable">
                                    <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Sent On</th>
                                        <th>Status</th>
                                        <th></th>

                                    </tr>
                                    </thead>

                                    <tbody>
                                        <?php $__currentLoopData = $chat_requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <div class="d-flex">
                                                    <div class="userDatatable__imgWrapper d-flex align-items-center">
                                                        <a href="<?php echo e(url('users/'.$item->chat_id)); ?>" class="profile-image rounded-circle d-block m-0 wh-38" style="background-image:url('<?php echo e(asset('img/tm6.png')); ?>'); background-size: cover;"></a>
                                                    </div>
                                                    <div class="userDatatable-inline-title">
                                                        <a href="<?php echo e(url('users/'.$item->chat_id)); ?>" class="text-dark fw-500">
                                                            <h6><?php echo e($item->fname); ?> <?php echo e($item->lname); ?></h6>
                                                        </a>
                                                        
                                                    </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <?php if($item->sent_on == date("Y-m-d")): ?>
                                                        Today at <?php echo e($item->sent_at); ?>

                                                    <?php else: ?> 
                                                        <?php echo e(date("D d M, Y", strtotime($item->sent_on)) . " at " . $item->sent_at); ?>

                                                    <?php endif; ?>
                                                </td>

                                                <td>
                                                    <?php if($item->chat_status == 1): ?>
                                                        <div class="userDatatable-content d-inline-block">
                                                            <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">active</span>
                                                        </div>
                                                    <?php else: ?> 
                                                        <div class="userDatatable-content d-inline-block">
                                                            <span class="bg-opacity-danger  color-danger rounded-pill userDatatable-content-status active">closed</span>
                                                        </div>
                                                    <?php endif; ?>
                                                </td>

                                                <td>
                                                    <a href="<?php echo e($item->chat_status == 1 ? url('admin/dashboard/support/chat/' . $item->session_id) : "javascript:void(0)"); ?>"
                                                         title="Chat with <?php echo e($item->fname . " ".$item->lname); ?>?" class="btn">Join <i class="fa fa-paper-plane"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('partials.admin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\supermarket\app\views/chat/super/support.blade.php ENDPATH**/ ?>