
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/chat.css')); ?>" type="text/css"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title">YOSIL Support Center</h4>
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
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card shadow chat">
                               <div class="card-header py-1 d-flex justify-content-between">
                                        <div class="d-flex mt-1">
                                            <div class="userDatatable__imgWrapper d-flex align-items-center">
                                                <a href="#" class="profile-image rounded-circle d-block m-0 wh-38" style="background-image:url(<?php echo e(asset('img/undraw_profile.svg')); ?>); background-size: cover;"></a>
                                            </div>
                                            <div class="userDatatable-inline-title">
                                                <a href="#" class="text-dark fw-500">
                                                    <h6><?php echo e($user[0]->fname); ?> <?php echo e($user[0]->lname); ?></h6>
                                                </a> 
                                                <p class="d-block mb-0 text-success user-status">
                                                    online
                                                </p>
                                            </div>
                                        </div>
                                        <button type="button" 
                                            class="btn btn-danger btn-sm end-chat py-1"
                                            data-session_id="<?php echo e($session_id); ?>"
                                            data-url="<?php echo e(url('chat/end')); ?>"
                                            data-_token="<?php echo e(_token()); ?>">
                                            End Chat
                                        </button>
                                   </div>
                                <div class="card-body chat-body" id="chat-body">
                                    
                                </div>
                                <div class="card-footer">
                                    <form action="">

                                        <div class="input-group">
                                            <label for="message"></label>
                                            <textarea  class="form-control" id="message"></textarea>
                                            <button type="button" 
                                            class="btn btn-outline-success ml-2 send-btn" 
                                            id="send" 
                                            data-sender="<?php echo e(session('user')->email); ?>"
                                            data-receiver="<?php echo e($user[0]->request_by); ?>" 
                                            data-session_id="<?php echo e($session_id); ?>"
                                            data-url="<?php echo e(url('chat/send')); ?>"
                                            data-_token="<?php echo e(_token()); ?>"><i class="fa fa-paper-plane"></i></button>
                                        </div>
                                   </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card card-body shadow char-request">
                                <h4>Chat Requests</h4>
                                <div id="chat-requests">

                                </div>
                                <br>
                                <h4><u>Online Users</u></h4>
                                <?php if(!empty($online)): ?>
                                    <?php $__currentLoopData = $online; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="d-flex mt-1">
                                            <div class="userDatatable__imgWrapper d-flex align-items-center">
                                                <a href="#" class="profile-image rounded-circle d-block m-0 wh-38" style="background-image:url('<?php echo e(asset('img/undraw_profile.svg')); ?>'); background-size: cover;"></a>
                                            </div>
                                            <div class="userDatatable-inline-title">
                                                <a href="#" class="text-dark fw-500">
                                                    <?php if($user->email == session('user')->email): ?>
                                                    <h6>Me</h6> 
                                                    <?php else: ?>
                                                        <h6><?php echo e($user->fname); ?> <?php echo e($user->lname); ?></h6>
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/chat.js')); ?>"></script>
<?php echo $__env->yieldSection(); ?>
<?php echo $__env->make('partials.admin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\supermarket\app\views/chat/super/chat.blade.php ENDPATH**/ ?>