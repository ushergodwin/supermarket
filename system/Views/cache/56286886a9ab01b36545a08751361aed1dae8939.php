<aside class="sidebar">
    <div class="sidebar__menu-group">
       <ul class="sidebar_nav">
          <li class="menu-title">
             <span>DASHBOARD</span>
          </li>
          <li class="has-child ">
             <a href="#">
             <span data-feather="user" class="nav-icon"></span>
             <span class="menu-text">Supermarkets </span>
             <span class="toggle-icon"></span>
             </a>
             <ul>
                  <li>
                     <a href="<?php echo e(url('user/dashboard/supermarkets')); ?>" class="">List All</a>
                  </li>
             </ul>
          </li>
          <li>
            <a href="<?php echo e(url('user/dashboard/lists')); ?>">
            <span data-feather="shopping-cart" class="nav-icon"></span>
            <span class="menu-text">Shopping Lists</span>
            </a>
         </li>
         <li>
            <a href="<?php echo e(url('user/dashboard/notebooks')); ?>">
            <span data-feather="book-open" class="nav-icon"></span>
            <span class="menu-text">Notebook</span>
            </a>
         </li>
          <li>
             <a href="">
             <span data-feather="settings" class="nav-icon"></span>
             <span class="menu-text">Settings</span>
             </a>
          </li>
 
          <li>
             <a href="" class="">
             <span data-feather="headphones" class="nav-icon"></span>
             <span class="menu-text">Support Center</span>
             <span class="badge badge-success menuItem">New</span>
             </a>
          </li>
          <li>
             <a href="" class="">
             <span data-feather="clock" class="nav-icon"></span>
             <span class="menu-text">Coming Soon</span>
             </a>
          </li>
       </ul>
    </div>
 </aside>
 <?php /**PATH C:\xampp\htdocs\supermarket\app\views/partials/user/aside.blade.php ENDPATH**/ ?>