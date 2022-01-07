<header class="header-top">
    <nav class="navbar navbar-light">
        <div class="navbar-left">
            <a href="" class="sidebar-toggle">
                <img class="svg" src="<?php echo e(asset('img/svg/bars.svg')); ?>" alt="img">
            </a>
            <a class="navbar-brand" href="#"><img class="svg dark" src="<?php echo e(asset('img/Logo_Dark.svg')); ?>" alt="">
                <img class="light" src="<?php echo e(asset('img/Logo_white.png')); ?> " alt="">
            </a>
        </div>
        <!-- ends: navbar-left -->
        <div class="navbar-right">
            <ul class="navbar-right__menu">

                <li class="nav-notification">
                    <div class="dropdown-custom">
                        <a href="javascript:;" class="nav-item-toggle">
                            <span data-feather="shopping-cart" class="nav-icon"></span>
                        </a>
                        <div class="dropdown-wrapper">
                            <h2 class="dropdown-wrapper__title">Shopping Cart Items <span
                                    class="badge-circle badge-success ml-1">4</span></h2>
                            <ul class="bg-dark">
                                <li class="nav-notification__single nav-notification__single--unread d-flex flex-wrap">
                                    <div class="nav-notification__type nav-notification__type--primary">
                                        <span data-feather="inbox"></span>
                                    </div>
                                    <div class="nav-notification__details">
                                        <p>
                                            <a href="" class="subject stretched-link text-truncate"
                                               style="max-width: 180px;">James</a>
                                            <span>sent you a message</span>
                                        </p>
                                        <p>
                                            <span class="time-posted">5 hours ago</span>
                                        </p>
                                    </div>
                                </li>

                            </ul>
                            <a href="" class="dropdown-wrapper__more">Check Out</a>
                        </div>
                    </div>
                </li>

                <!-- end cart pannel -->
                <li class="nav-message">
                    <div class="dropdown-custom">
                        <a href="javascript:;" class="nav-item-toggle">
                            <span data-feather="mail"></span></a>
                        <div class="dropdown-wrapper">
                            <h2 class="dropdown-wrapper__title">Messages <span
                                    class="badge-circle badge-success ml-1">2</span></h2>
                            <ul class="bg-dark">
                                <li class="author-online has-new-message">
                                    <div class="user-avater">
                                        <img src="<?php echo e(asset('img/team-1.png')); ?>" alt="">
                                    </div>
                                    <div class="user-message">
                                        <p>
                                            <a href="" class="subject stretched-link text-truncate"
                                               style="max-width: 180px;">Web Design</a>
                                            <span class="time-posted">3 hrs ago</span>
                                        </p>
                                        <p>
                                            <span class="desc text-truncate" style="max-width: 215px;">Lorem ipsum dolor amet cosec Lorem ipsum</span>
                                            <span class="msg-count badge-circle badge-success badge-sm">1</span>
                                        </p>
                                    </div>
                                </li>
                                <li class="author-offline has-new-message">
                                    <div class="user-avater">
                                        <img src="<?php echo e(asset('img/team-1.png')); ?> " alt="">
                                    </div>
                                    <div class="user-message">
                                        <p>
                                            <a href="" class="subject stretched-link text-truncate"
                                               style="max-width: 180px;">Web Design</a>
                                            <span class="time-posted">3 hrs ago</span>
                                        </p>
                                        <p>
                                            <span class="desc text-truncate" style="max-width: 215px;">Lorem ipsum dolor amet cosec Lorem ipsum</span>
                                            <span class="msg-count badge-circle badge-success badge-sm">1</span>
                                        </p>
                                    </div>
                                </li>
                                <li class="author-online has-new-message">
                                    <div class="user-avater">
                                        <img src="<?php echo e(asset('img/team-1.png')); ?>" alt="">
                                    </div>
                                    <div class="user-message">
                                        <p>
                                            <a href="" class="subject stretched-link text-truncate"
                                               style="max-width: 180px;">Web Design</a>
                                            <span class="time-posted">3 hrs ago</span>
                                        </p>
                                        <p>
                                            <span class="desc text-truncate" style="max-width: 215px;">Lorem ipsum dolor amet cosec Lorem ipsum</span>
                                            <span class="msg-count badge-circle badge-success badge-sm">1</span>
                                        </p>
                                    </div>
                                </li>
                                <li class="author-offline">
                                    <div class="user-avater">
                                        <img src="<?php echo e(asset('img/team-1.png')); ?>" alt="">
                                    </div>
                                    <div class="user-message">
                                        <p>
                                            <a href="" class="subject stretched-link text-truncate"
                                               style="max-width: 180px;">Web Design</a>
                                            <span class="time-posted">3 hrs ago</span>
                                        </p>
                                        <p>
                                            <span class="desc text-truncate" style="max-width: 215px;">Lorem ipsum dolor amet cosec Lorem ipsum</span>
                                        </p>
                                    </div>
                                </li>
                                <li class="author-offline">
                                    <div class="user-avater">
                                        <img src="<?php echo e(asset('img/team-1.png')); ?>" alt="">
                                    </div>
                                    <div class="user-message">
                                        <p>
                                            <a href="" class="subject stretched-link text-truncate"
                                               style="max-width: 180px;">Web Design</a>
                                            <span class="time-posted">3 hrs ago</span>
                                        </p>
                                        <p>
                                            <span class="desc text-truncate" style="max-width: 215px;">Lorem ipsum dolor amet cosec Lorem ipsum</span>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                            <a href="" class="dropdown-wrapper__more">See All Message</a>
                        </div>
                    </div>
                </li>
                <!-- ends: nav-message -->

                <li class="nav-notification">
                    <div class="dropdown-custom">
                        <a href="javascript:;" class="nav-item-toggle">
                            <span data-feather="bell"></span></a>
                        <div class="dropdown-wrapper">
                            <h2 class="dropdown-wrapper__title">Notifications <span
                                    class="badge-circle badge-warning ml-1">4</span></h2>
                            <ul class="bg-dark">
                                <li class="nav-notification__single nav-notification__single--unread d-flex flex-wrap">
                                    <div class="nav-notification__type nav-notification__type--primary">
                                        <span data-feather="inbox"></span>
                                    </div>
                                    <div class="nav-notification__details">
                                        <p>
                                            <a href="" class="subject stretched-link text-truncate"
                                               style="max-width: 180px;">James</a>
                                            <span>sent you a message</span>
                                        </p>
                                        <p>
                                            <span class="time-posted">5 hours ago</span>
                                        </p>
                                    </div>
                                </li>
                                <li class="nav-notification__single nav-notification__single--unread d-flex flex-wrap">
                                    <div class="nav-notification__type nav-notification__type--secondary">
                                        <span data-feather="upload"></span>
                                    </div>
                                    <div class="nav-notification__details">
                                        <p>
                                            <a href="" class="subject stretched-link text-truncate"
                                               style="max-width: 180px;">James</a>
                                            <span>sent you a message</span>
                                        </p>
                                        <p>
                                            <span class="time-posted">5 hours ago</span>
                                        </p>
                                    </div>
                                </li>
                                <li class="nav-notification__single nav-notification__single--unread d-flex flex-wrap">
                                    <div class="nav-notification__type nav-notification__type--success">
                                        <span data-feather="log-in"></span>
                                    </div>
                                    <div class="nav-notification__details">
                                        <p>
                                            <a href="" class="subject stretched-link text-truncate"
                                               style="max-width: 180px;">James</a>
                                            <span>sent you a message</span>
                                        </p>
                                        <p>
                                            <span class="time-posted">5 hours ago</span>
                                        </p>
                                    </div>
                                </li>
                                <li class="nav-notification__single nav-notification__single d-flex flex-wrap">
                                    <div class="nav-notification__type nav-notification__type--info">
                                        <span data-feather="at-sign"></span>
                                    </div>
                                    <div class="nav-notification__details">
                                        <p>
                                            <a href="" class="subject stretched-link text-truncate"
                                               style="max-width: 180px;">James</a>
                                            <span>sent you a message</span>
                                        </p>
                                        <p>
                                            <span class="time-posted">5 hours ago</span>
                                        </p>
                                    </div>
                                </li>
                                <li class="nav-notification__single nav-notification__single d-flex flex-wrap">
                                    <div class="nav-notification__type nav-notification__type--danger">
                                        <span data-feather="heart"></span>
                                    </div>
                                    <div class="nav-notification__details">
                                        <p>
                                            <a href="" class="subject stretched-link text-truncate"
                                               style="max-width: 180px;">James</a>
                                            <span>sent you a message</span>
                                        </p>
                                        <p>
                                            <span class="time-posted">5 hours ago</span>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                            <a href="" class="dropdown-wrapper__more">See all incoming activity</a>
                        </div>
                    </div>
                </li>
                <!-- ends: .nav-notification -->

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
                                    
                                    <span>UI Designer</span>
                                </div>
                            </div>
                            <div class="nav-author__options bg-dark">
                                <ul>
                                    <li>
                                        <a href="">
                                            <span data-feather="user"></span> Profile</a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span data-feather="settings"></span> Settings</a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span data-feather="key"></span> Billing</a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span data-feather="users"></span> Activity</a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span data-feather="bell"></span> Help</a>
                                    </li>
                                </ul>
                                <a href="<?php echo e(url('logout')); ?>" class="nav-author__signout" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
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