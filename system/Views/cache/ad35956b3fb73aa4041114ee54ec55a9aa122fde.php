<aside class="sidebar">
    <div class="sidebar__menu-group">
       <ul class="sidebar_nav">
          <li class="menu-title">
             <span>DASHBOARD</span>
          </li>
            <?php if(in_array('view-users', session('user')->roles)): ?>
               <li class="has-child ">
                  <a href="#">
                  <span data-feather="user" class="nav-icon"></span>
                  <span class="menu-text">Users</span>
                  <span class="toggle-icon"></span>
                  </a>
                  <ul>
                     <?php if(session('user')->account_type == 'super'): ?>
                        <li>
                           <a href="<?php echo e(url('users/supermarket-visiors')); ?>" class="">Supermarket Visitors</a>
                        </li>
                        <li>
                           <a href="<?php echo e(url('users/supermarket-admins')); ?>" class="">Supermarket Admin</a>
                        </li>
                     <?php endif; ?>
                     <li class="has-child ">
                           <a href="#">
                           <span data-feather="user" class="nav-icon"></span>
                           <span class="menu-text">Co Admins </span>
                           <span class="toggle-icon"></span>
                           </a>
                           <ul>
                                 <li>
                                    <a href="<?php echo e(url('users/co-admin')); ?>" class="">List All</a>
                                 </li>
                                 <?php if(in_array('add-users', session('user')->roles)): ?>
                                    <li>
                                       <a href="<?php echo e(url('users/co-admin/create')); ?>" class="">Add New</a>
                                    </li>
                                 <?php endif; ?>
                           </ul>
                     </li>
                  </ul>
               </li>

            <?php if(in_array('view-supermarkets', session('user')->roles)): ?>
               <li class="has-child ">
                  <a href="#">
                  <span data-feather="user" class="nav-icon"></span>
                  <span class="menu-text">Supermarkets </span>
                  <span class="toggle-icon"></span>
                  </a>
                  <ul>
                        <li>
                           <a href="<?php echo e(url('supermarkets')); ?>" class="">List All</a>
                        </li>
                        <?php if(in_array('add-supermarkets', session('user')->roles)): ?>
                           <li>
                              <a href="<?php echo e(route('supermarkets.create')); ?>" class="">Add New</a>
                           </li>
                        <?php endif; ?>
                  </ul>
               </li>
            <?php endif; ?>

         <?php endif; ?>

         <?php if(session('user')->account_type == 'admin'): ?>
            <?php if(in_array('view-supermarket-items', session('user')->roles)): ?>
               <li class="has-child">
                  <a href="#">
                  <span data-feather="layout" class="nav-icon"></span>
                  <span class="menu-text">Supermarket Items</span>
                  <span class="toggle-icon"></span>
                  </a>
                  <ul>
                        <li>
                           <a href="<?php echo e(url('supermarket-items')); ?>" class="">List All</a>
                        </li>
                        <?php if(in_array('add-supermarket-items', session('user')->roles)): ?>
                           <li>
                              <a href="<?php echo e(route('supermarket-items.create')); ?>" class="">Add New &nbsp; <i class="fa fa-plus-circle"></i></a>
                           </li>
                        <?php endif; ?>
                  </ul>
               </li>
            <?php endif; ?>
            <li class="has-child">
               <a href="#">
               <span class="nav-icon">
                  <i class="fa fa-search"></i> 
               </span>
               <span class="menu-text">Searched Items</span>
               <span class="toggle-icon"></span>
               </a>
               <ul>
      
                  <?php if(in_array('view-found-searched-items', session('user')->roles)): ?>
                     <li>
                        <a href="<?php echo e(url('supermarket-items/searched/found')); ?>" class=""><i class="fa fa-check"></i>&nbsp;Found</a>
                     </li>
                  <?php endif; ?>
                  <?php if(in_array('view-not-found-searched-items', session('user')->roles)): ?>
                     <li>
                           <a href="<?php echo e(url('supermarket-items/searched/not-found')); ?>" class=""><i class="fa fa-times"></i>&nbsp;Not Found</a>
                     </li>
                  <?php endif; ?>
                  <?php if(in_array('view-most-searched-items', session('user')->roles)): ?>
                     <li>
                        <a href="<?php echo e(url('supermarket-items/searched/most-searched')); ?>" class=""><i class="fa fa-times"></i>&nbsp;Most Searched</a>
                     </li>
                  <?php endif; ?>
               </ul>
            </li>
            <li>
               <a href="<?php echo e(url('supermarket-items/categories')); ?>">
               <span data-feather="settings" class="nav-icon"></span>
               <span class="menu-text">Categories</span>
               </a>
            </li>

         <?php endif; ?>
         <li>
            <a href="<?php echo e(url('admin/dashboard/transactions')); ?>" class="">
            <span data-feather="dollar-sign" class="nav-icon"></span>
            <span class="menu-text">Transactions</span>
            <span class="badge badge-success menuItem">New</span>
            </a>
         </li>
         <?php if(session('user')->account_type == 'super'): ?>
            <li>
               <a href="<?php echo e(url('admin/dashboard/support')); ?>" class="">
               <span data-feather="headphones" class="nav-icon"></span>
               <span class="menu-text">Support Center</span>
               <span class="badge badge-success menuItem">New</span>
               </a>
            </li>
          <?php endif; ?>
          <?php if(session('user')->account_type == 'admin'): ?>
          <li>
             <a href="<?php echo e(url('admin/dashboard/help')); ?>" class="">
             <span data-feather="headphones" class="nav-icon"></span>
             <span class="menu-text">Help Center</span>
             <span class="badge badge-success menuItem">New</span>
             </a>
          </li>
        <?php endif; ?>
          <li>
            <a href="<?php echo e(url('admin/dashboard/settings')); ?>">
            <span data-feather="settings" class="nav-icon"></span>
            <span class="menu-text">Settings</span>
            </a>
         </li>
       </ul>
    </div>
 </aside>
 <?php /**PATH C:\xampp\htdocs\supermarket\app\views/partials/admin/aside.blade.php ENDPATH**/ ?>