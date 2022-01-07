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
                     <a href="{{ url('user/dashboard/supermarkets') }}" class="">List All</a>
                  </li>
             </ul>
          </li>
          <li>
            <a href="{{ url('user/dashboard/lists') }}">
            <span data-feather="shopping-cart" class="nav-icon"></span>
            <span class="menu-text">Shopping Lists</span>
            </a>
         </li>
          <li>
            <a href="{{ url('supermarket-items/categories') }}">
            <span data-feather="settings" class="nav-icon"></span>
            <span class="menu-text">Categories</span>
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
 