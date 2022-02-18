
<?php $__env->startSection('content'); ?>
<section class="contents">
    <section class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-8">
                <h4>Shopping Lists</h4>
                <div class="row">
                    <?php if(!empty($collection)): ?>
                        <?php $__currentLoopData = $collection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-12">
                                <div class="card mt-2">
                                    <div class="card-header py-1">
                                        <?php echo e($item->list_name); ?>

                                    </div>
                                    <div class="card-body">
                                        <h5>List Items</h5>
                                        <?php
                                            $shoppingListItems = DB('shopping_list_items')->where('shopping_list_id', $item->id)->get();
                                            $total = $no = 0;
                                        ?>
                                        <?php if(!empty($shoppingListItems)): ?>
                                            <table class="table table-striped table-bordered table-dark">
                                                <thead>
                                                    <th>No</th>
                                                    <th>Item Name</th>
                                                    <th>Price</th>
                                                    <th>Location</th>
                                                    <th>Supermarket</th>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $shoppingListItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php
                                                            $total += $items->item_price;
                                                            $no++;
                                                        ?>
                                                        <tr>
                                                            <td><?php echo e($no); ?></td>
                                                            <td><?php echo e($items->item_name); ?></td>
                                                            <td><?php echo e(number_format($items->item_price, 2)); ?></td>
                                                            <td><?php echo e("column " .  $items->item_column_number . " " . $items->item_position); ?></td>
                                                            <td><?php echo e($items->supermarket); ?></td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td colspan="4">TOTAL COST </td>
                                                        <th>UGX: <?php echo e(number_format($total, 2)); ?></th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        <?php endif; ?>
                                    </div>
                                    <div class="card-footer">
                                        <button type="button" class="btn btn-<?php echo e($item->list_status == 'active' ? 'primary' : 'success'); ?>"
                                        id="diactivate-list" 
                                        data-list_id="<?php echo e($item->id); ?>"
                                        data-url="<?php echo e(url('user/dashboard/lists/diactivate')); ?>"
                                        data-_token="<?php echo e(_token()); ?>"
                                         <?php echo e($item->list_status == 'active' ? '' : 'disabled'); ?>><i class="fa fa-check-circle"></i> <?php echo e($item->list_status == 'active' ? "Mark List Shopped" : "List Shopped"); ?></button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-4">
                <h4>Create a Shopping List</h4>
                <div class="response" id="response"></div>
                <div class="card card-body shadow mt-2">
                    <form action="<?php echo e(url('user/dashboard/lists/create')); ?>" method="POST" id="listForm">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="list_name" class="w-100">
                                List Name
                                <input type="text" name="list_name" class="form-control"
                                 value="<?php echo e(date("D-d-M-Y-H:i:s")); ?>_list"/>
                            </label>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success" id="list-btn">Create List</button>
                        </div>
                    </form>

                    <div class="row">
                        <?php if(!empty($lists)): ?>
                            <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-12 mt-2">
                                    <div class="card card-body <?php echo e($item->list_status == 'active' ? 'border-success' : ''); ?>">
                                        <a href="#" class="stretched-link">
                                            <h4><?php echo e($item->list_name); ?></h4>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="response" id="response"></div>
            </div>
        </div>
    </section>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        request({form: 'listForm', btn: 'list-btn'});
        elementDataRequest({selector: 'id', el: 'diactivate-list', method: 'POST'})
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('partials.user.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\supermarket\app\views/user/shopping_list.blade.php ENDPATH**/ ?>