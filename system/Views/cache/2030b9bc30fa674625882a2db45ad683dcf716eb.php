
<?php $__env->startSection('css'); ?>
    <style type="text/css">
        .notebook {
            background: url("<?php echo e(asset('imgs/site/notebook-paper.png')); ?>") repeat center center fixed; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;

        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="contents">
    <section class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-8">
                <h4>Notebooks</h4>
                <?php echo $__env->make('partials.notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="row">
                    <?php if(!empty($collection)): ?>
                        <?php $__currentLoopData = $collection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-6">
                                <div class="card mt-2 notebook">
                                    <div class="card-header py-1 notebook">
                                        <h5><?php echo e($item->note_name); ?></h5> 
                                    </div>
                                    <div class="card-body" id="notebook-body">
                                      <?php
                                          $notes = explode(',', $item->notes);
                                      ?>
                                      <?php $__currentLoopData = $notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <a href="<?php echo e(url('user/dashboard/supermarket_items/search?q=' . $item->supermarket_name . '&item=' . trim($item_note))); ?>"><?php echo e($item_note); ?></a>, &nbsp;
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-4">
                <h4>Create a Notebook</h4>
                <div class="response" id="response"></div>
                <div class="card card-body shadow mt-2">
                    <form action="<?php echo e(url('user/dashboard/notebooks/save')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="note_name" class="w-100">
                                NoteBook Name
                                <input type="text" name="note_name" class="form-control"
                                 value="<?php echo e(empty(old('note_name')) ? "NB_".date("dmYHis") : old('note_name')); ?>"/>
                            </label>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success">Create NoteBook</button>
                        </div>
                    </form>
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
<?php echo $__env->make('partials.user.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\supermarket\app\views/user/notebook.blade.php ENDPATH**/ ?>