<aside class="sidebar">
    <div class="sidebar__menu-group">
       <ul class="sidebar_nav">
          <li class="menu-title">
             <span>DASHBOARD</span>
          </li>
          <li class="has-child ">
             <a href="#">
             <span data-feather="user" class="nav-icon"></span>
             <span class="menu-text">Users</span>
             <span class="toggle-icon"></span>
             </a>
             <ul>
               <li>
                  <a href="{{ url('users') }}" class="">List All</a>
               </li>
               <li>
                  <a href="{{ route('users.create') }}" class="">Add</a>
               </li>
             </ul>
          </li>
          <li class="has-child ">
             <a href="#">
             <span data-feather="user" class="nav-icon"></span>
             <span class="menu-text">Supermarkets </span>
             <span class="toggle-icon"></span>
             </a>
             <ul>
                  <li>
                     <a href="{{ url('supermarkets') }}" class="">List All</a>
                  </li>
                  <li>
                     <a href="{{ route('supermarkets.create') }}" class="">Add New</a>
                  </li>
             </ul>
          </li>
 
          <li class="has-child">
             <a href="#">
             <span data-feather="layout" class="nav-icon"></span>
             <span class="menu-text">Supermarket Items</span>
             <span class="toggle-icon"></span>
             </a>
             <ul>
                  <li>
                     <a href="{{ url('supermarket-items') }}" class="">List All</a>
                  </li>
                  <li>
                     <a href="{{ route('supermarket-items.create') }}" class="">Add New &nbsp; <i class="fa fa-plus-circle"></i></a>
                  </li>
                  <li>
                     <a href="{{ url('supermarket-items/searched') }}" class="">Searched&nbsp;<i class="fa fa-search"></i> </a>
                  </li>
             </ul>
          </li>
          <li>
            <a href="{{ route('supermarket-items.categories') }}">
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
             <span data-feather="dollar-sign" class="nav-icon"></span>
             <span class="menu-text">Pricing</span>
             </a>
          </li>
          <li>
             <a href="" class="">
             <span data-feather="book-open" class="nav-icon"></span>
             <span class="menu-text">Testimonial</span>
             <span class="badge badge-success menuItem">New</span>
             </a>
          </li>
          <li>
             <a href="" class="">
             <span data-feather="help-circle" class="nav-icon"></span>
             <span class="menu-text">FAQ's</span>
             </a>
          </li>
 
          <li class="has-child ">
             <a href="#" class="">
             <span data-feather="book" class="nav-icon"></span>
             <span class="menu-text">Knowledge Base</span>
             <span class="toggle-icon"></span>
             <span class="badge badge-success menuItem">New</span>
             </a>
             <ul>
                <li>
                   <a href=""
                      class="">Knowledge Base</a>
                </li>
                <li>
                   <a href=""
                      class="">All Article</a>
                </li>
                <li>
                   <a href=""
                      class="">Singale Article</a>
                </li>
             </ul>
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
 