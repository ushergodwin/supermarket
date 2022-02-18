
<?php $__env->startSection('content'); ?>
    <div class="contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title">Supermarket Subscription Transactions</h4>
                        <div class="breadcrumb-action justify-content-center flex-wrap">
                            <div class="action-btn">
                                <div class="form-group mb-0">
                                </div>
                            </div>
                            <div class="action-btn">
                                
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
                                <input type="search" id="search" class="form-control" placeholder="search supermarket transactions"
                                       onkeyup="filterTable('search', 'patientTable')">
                                <input type="hidden" name="_token" value="<?php echo e(_token()); ?>">
                            </div>
                        </div>
                        <div class="card-body py-md-30">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="patientTable">
                                    <thead>
                                    <tr>
                                        <th>Supermarket</th>
                                        <th>Owner</th>
                                        <th>Transaction ID</th>
                                        <th>Amount</th>
                                        <th>Transacted On</th>

                                    </tr>
                                    </thead>

                                    <tbody>
                                        <?php $__currentLoopData = $collection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <div class="d-flex">
                                                        <div class="userDatatable__imgWrapper d-flex align-items-center">
                                                            <a href="<?php echo e(url('users/'.$item->sup_id)); ?>" class="profile-image rounded-circle d-block m-0 wh-38" style="background-image:url('<?php echo e(asset('img/tm6.png')); ?>'); background-size: cover;"></a>
                                                        </div>
                                                        <div class="userDatatable-inline-title">
                                                            <a href="<?php echo e(url('supermarkets/'.$item->sup_id . '/edit')); ?>" class="text-dark fw-500">
                                                                <h6><?php echo e($item->name); ?></h6>
                                                            </a>
                                                            <p class="d-block mb-0">
                                                                Expires: <?php echo e(date("D d M, Y H:i:a", strtotime($item->expires_on))); ?>

                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <div class="userDatatable__imgWrapper d-flex align-items-center">
                                                            <a href="#" class="profile-image rounded-circle d-block m-0 wh-38" style="background-image:url('<?php echo e(asset('img/tm6.png')); ?>'); background-size: cover;"></a>
                                                        </div>
                                                        <div class="userDatatable-inline-title">
                                                            <a href="#" class="text-dark fw-500">
                                                                <h6><?php echo e($item->fname); ?> <?php echo e($item->lname); ?></h6>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <?php echo e($item->transaction_id); ?>

                                                </td>
                                                <td>
                                                    <?php echo e(number_format($item->amount, 2)); ?>

                                                </td>
                                                <td><?php echo e(date('M d, Y', strtotime($item->dated))); ?></td>
                                                
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

<?php echo $__env->make('partials.admin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\supermarket\app\views/admin/transactions.blade.php ENDPATH**/ ?>