
<?php $__env->startSection('content'); ?>
    <div class="contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title">Supermaket Items</h4>
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
                <div class="col-lg-12">
                    <div class="card card-horizontal card-default card-md mb-4">
                        <div class="row mt-5 mr-2 ml-2">
                            <div class="col-md-2 mt-3">
                                <h6 class="mr-5">Supermarket Items Listing</h6>
                            </div>
                            <div class="col-md-10">
                                <input type="search" id="search" class="form-control" placeholder="search patient"
                                       onkeyup="filterTable('search', 'patientTable')">
                            </div>
                        </div>
                        <div class="card-body py-md-30">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="patientTable">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Joined On</th>
                                        <th>Status</th>
                                        <th colspan="3">Action</th>

                                    </tr>
                                    </thead>

                                    <tbody>
                                        <?php $__currentLoopData = $collection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                            <td>
                                                <div class="d-flex">
                                                <div class="userDatatable__imgWrapper d-flex align-items-center">
                                                    <a href="<?php echo e(url('supermarket-items/'.$item->id)); ?>" class="profile-image rounded-circle d-block m-0 wh-38" style="background-image:url('<?php echo e(asset('imgs/supermarket/items/'.$item->image)); ?>'); background-size: cover;"></a>
                                                </div>
                                                <div class="userDatatable-inline-title">
                                                    <a href="<?php echo e(url('supermarket-items/'.$item->id)); ?>" class="text-dark fw-500">
                                                        <h6><?php echo e($item->name); ?></h6>
                                                    </a>
                                                    <p class="d-block mb-0">
                                                        <?php echo e($item->category); ?>

                                                    </p>
                                                </div>
                                                </div>
                                            </td>
                                                <td><?php echo e(date('M d, Y', strtotime($item->created_at))); ?></td>
                                                <td>
                                                    <?php if(empty($item->deleted_at)): ?>
                                                        <div class="userDatatable-content d-inline-block">
                                                            <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">active</span>
                                                        </div>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo e(url('supermarket-items/'.$item->id)); ?>" title="view more details of <?php echo e($item->name); ?>" class="view"><span data-feather="eye"></span> </a>
                                                </td>
                                                <?php if(in_array('edit-supermarket-items', session('user')->roles)): ?>
                                                    <td>
                                                        <a href="<?php echo e(url('supermarket-items/'.$item->id . '/edit')); ?>" title="edit details of <?php echo e($item->name); ?>"><i class="fas fa-pen-square text-primary"></i> </a>
                                                    </td>
                                                <?php endif; ?>
                                                <?php if(in_array('delete-supermarket-items', session('user')->roles)): ?>
                                                    <td>
                                                        <a href="javascript:void(0)" 
                                                        data-url="<?php echo e(url('supermarket-items/'.$item->id)); ?>" 
                                                        data-resource-id="<?php echo e($item->id); ?>" 
                                                        data-request_method="GET"
                                                        data-_method="DELETE"
                                                        title="Delete <?php echo e($item->name); ?>?" 
                                                        class="delete-resource" >
                                                            <i class="fas fa-trash-alt text-danger"></i> 
                                                        </a>
                                                        <?php echo csrf_field(); ?>
                                                    </td>
                                                <?php endif; ?>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="response"></div>
                        </div>
                    </div>
                    <!-- ends: .card -->
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('partials.admin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\supermarket\app\views/admin/supermarket/listing.blade.php ENDPATH**/ ?>