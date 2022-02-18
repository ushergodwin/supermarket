
<?php $__env->startSection('content'); ?>
    <div class="contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title">
                            <?php if($is_most_searched): ?>
                                Top 10 Most Searched Supermarket Items.
                            <?php else: ?>
                                Supermaket Items Searched and <?php echo e($status); ?>

                            <?php endif; ?>
                        </h4>
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
                                <h6 class="mr-5">Items</h6>
                            </div>
                            <div class="col-md-10">
                                <input type="search" id="search" class="form-control" placeholder="search patient"
                                       onkeyup="filterTable('search', 'patientTable')">
                                <?php echo csrf_field(); ?>
                            </div>
                        </div>
                        <div class="card-body py-md-30">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="patientTable">
                                    <thead>
                                    <tr>
                                        <th>Item Name</th>
                                        <th>No of Searches</th>
                                        <th>Searched On</th>
                                        
                                        <?php if($is_most_searched): ?>
                                            <th>Status</th>
                                        <?php endif; ?>
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
                                                            <h6><?php echo e($item->searched_item_name); ?></h6>
                                                        </a>
                                                        <p class="d-block mb-0">
                                                            searched <?php echo e($item->number_of_searches); ?> times
                                                        </p>
                                                    </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <?php echo e($item->number_of_searches); ?> times
                                                </td>
                                                <td><?php echo e(date('D d M, Y', strtotime($item->created_at))); ?></td>
                                                <?php if($is_most_searched): ?>
                                                    <td><?php echo e(strtoupper($item->search_status)); ?></td>
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

<?php echo $__env->make('partials.admin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\supermarket\app\views/admin/supermarket/searched_items.blade.php ENDPATH**/ ?>