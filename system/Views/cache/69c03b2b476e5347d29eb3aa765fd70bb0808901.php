
<?php $__env->startSection('content'); ?>
    <div class="contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title">Edit Supermarket Item (<?php echo e($collection->name); ?>)</h4>
                        <div class="breadcrumb-action justify-content-center flex-wrap">
                            <div class="action-btn">
                                <div class="form-group mb-0">
                                </div>
                            </div>
                            <div class="action-btn">
                                <a href="<?php echo e(url('supermarket-items/create')); ?>" class="btn btn-sm btn-primary btn-add">
                                    <i class="la la-plus"></i> Add New Supermarket Item</a>
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
                            <form action="<?php echo e(url('supermarket-items')); ?>" method="post" id="supermarketItemForm" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="name">Item Name</label>
                                            <input type="text" name="name" class="form-control" 
                                             autocomplete="off"
                                            value="<?php echo e($collection->name); ?>" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="number" name="price" class="form-control" value="<?php echo e($collection->price); ?>" required/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="category">Item Category</label>
                                            <input type="text" name="category" class="form-control"
                                            value="<?php echo e($collection->category); ?>" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="column_number">Item Column Number</label>
                                            <input type="number" name="column_number" value="<?php echo e($collection->column_number); ?>"  class="form-control" required/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="position">Item Position <?php echo e($collection->position); ?></label>
                                            <select name="position" class="form-control" required>
                                                <option value="">-- select position --</option>
                                                <option value="top-left" <?php echo e($collection->position == 'top-left' ? "selected" : ""); ?>>TOP LEFT</option>
                                                <option value="middle-left" <?php echo e($collection->position == 'middle-left' ? "selected" : ""); ?>>MIDDLE LEFT</option>
                                                <option value="bottom-left" <?php echo e($collection->position == 'bottom-left' ? "selected" : ""); ?>>BOTTOM LEFT</option>
                                                <option value="top-right" <?php echo e($collection->position == 'top-right' ? "selected" : ""); ?>>TOP RIGHT</option>
                                                <option value="middle-right" <?php echo e($collection->position == 'middle-right' ? "selected" : ""); ?>>MIDDLE RIGHT</option>
                                                <option value="bottom-right" <?php echo e($collection->position == 'bottom-right' ? "selected" : ""); ?>>BOTTOM RIGHT</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <label for="image">Item Image</label>
                                                    <input type="file" name="image" class="form-control" multiple/>
                                                    <?php echo method_field("PUT"); ?>
                                                    <input type="hidden" name="id" value="<?php echo e($collection->id); ?>"/>
                                                </div>
                                                <div class="col-l-4">
                                                    <img src="<?php echo e(asset('imgs/supermarket/items/' . $collection->image)); ?>" width="100px" height="100px" class="rounded" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" id="add-supermarket-btn" class="btn btn-success">SAVE SUPERMARKET ITEM CHANGES</button><br/>
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

<?php echo $__env->make('partials.admin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\supermarket\app\views/admin/supermarket/edit_item.blade.php ENDPATH**/ ?>