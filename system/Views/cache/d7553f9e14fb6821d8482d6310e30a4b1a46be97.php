<header class="header-top">
    <nav class="navbar navbar-light">
        <div class="navbar-left">
            <a href="" class="sidebar-toggle">
                <img class="svg" src="<?php echo e(asset('img/svg/bars.svg')); ?>" alt="img">
            </a>
            <a class="navbar-brand" href="<?php echo e(url('admin/dashboard')); ?>"><img class="svg dark" src="<?php echo e(asset('img/Logo_Dark.svg')); ?>" alt="">
                <img class="light" src="<?php echo e(asset('img/Logo_white.png')); ?> " alt="">
            </a>
        </div>
        <!-- ends: navbar-left -->
        <div class="navbar-right">
            <ul class="navbar-right__menu">

                <li class="nav-message">
                    <div class="dropdown-custom">
                        <a href="javascript:;" class="nav-item-toggle">
                            online</a>
                        <div class="dropdown-wrapper">
                            <h2 class="dropdown-wrapper__title">Users <span
                                    class="badge-circle badge-success ml-1">
                                    <?php if(session('user')->account_type == 'super'): ?>
                                        <?php echo e(DB('supermarket_main.users')->count()); ?>

                                    <?php else: ?>
                                    <?php echo e(DB('supermarket_main.users')->where('status', 'online')->count()); ?>

                                    <?php endif; ?>    
                                </span></h2>
                            <ul class="users-active-status">
                                
 
                            </ul>
                            <a href="" class="dropdown-wrapper__more">List Complete</a>
                        </div>
                    </div>
                </li>

                <li class="nav-author">
                    <div class="dropdown-custom">
                        <a href="javascript:;" class="nav-item-toggle"><img src="<?php echo e(asset('img/author-nav.jpg')); ?>"
                                                                            alt="" class="rounded-circle"></a>
                        <div class="dropdown-wrapper">
                            <div class="nav-author__info">
                                <div class="author-img">
                                    <img src="<?php echo e(asset('img/author-nav.jpg')); ?>" alt="" class="rounded-circle">
                                </div>
                                <div>
                                    <h6><?php echo e(session('user')->fname); ?></h6>
                                    <span><?php echo e(strtoupper(session('user')->account_type)); ?></span>
                                </div>
                            </div>
                            <div class="nav-author__options">
                                <ul>
                                    <li>
                                        <a href="<?php echo e(url('admin/dashboard/profile')); ?>">
                                            <span data-feather="user"></span> Profile</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(url('admin/dashboard/settings')); ?>">
                                            <span data-feather="settings"></span> Settings</a>
                                    </li>
                                    
                                </ul>
                                <a href="#logoutUser" class="nav-author__signout" data-toggle="modal">
                                    <span data-feather="log-out"></span> Sign Out</a>
                            </div>
                        </div>
                        <!-- ends: .dropdown-wrapper -->
                    </div>
                </li>
                <!-- ends: .nav-author -->
            </ul>
            <!-- ends: .navbar-right__menu -->
        </div>
        <!-- ends: .navbar-right -->
    </nav>
</header>
<?php /**PATH C:\xampp\htdocs\supermarket\app\views/partials/admin/header.blade.php ENDPATH**/ ?>