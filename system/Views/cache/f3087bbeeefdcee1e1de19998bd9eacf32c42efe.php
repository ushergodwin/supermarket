<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo e(APP_NAME . " | " . $title); ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/png" href="<?php echo e(asset('imgs/icons/favicon.ico')); ?>"/>
        <?php echo $__env->make('partials.admin.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/style.css')); ?>"/>
        <?php echo $__env->yieldContent('css'); ?>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <?php echo $__env->make('partials.user.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('partials.user.aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php $__env->startSection('content'); ?>
            
        <?php echo $__env->yieldSection(); ?>
            <!-- logout modal -->
    <div id="logoutUser" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title"><i class="fa fa-exclamation-triangle text-warning"></i> &nbsp;Confirmation</h3>
                </div>
                <div class="modal-body">
                    <h4>Do you want to close your session?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="window.location.href= window.location.origin + '/user/logout'">Yes, Log Me Out</button>
                </div>
            </div>
        </div>
    </div>
        <?php echo $__env->make('partials.admin.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('scripts'); ?>
    </body>
</html><?php /**PATH C:\xampp\htdocs\supermarket\app\views/partials/user/base.blade.php ENDPATH**/ ?>