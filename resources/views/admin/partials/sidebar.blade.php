
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('home')}}">
          <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
          </div>
          <div class="sidebar-brand-text mx-3">Blogify <sup>++</sup></div>
        </a>
  
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{url('/home')}}">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Home</span></a>
          </li>
  
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
          <a class="nav-link" href="{{url('/admin')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>
  
        <!-- Divider -->
        <hr class="sidebar-divider">
  
        <!-- Heading -->
        <div class="sidebar-heading">
          Interface
        </div>
  
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Users</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Users:</h6>
              <a class="collapse-item" href="{{route('users.index')}}">All Users</a>
              <a class="collapse-item" href="{{route('users.create')}}">Create Users</a>
            </div>
          </div>
        </li>
        <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                  <i class="fas fa-fw fa-cog"></i>
                  <span>Posts</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Posts:</h6>
                    <a class="collapse-item" href="{{route('posts.index')}}">All Posts</a>
                    <a class="collapse-item" href="{{route('posts.create')}}">Create Posts</a>
                    <a class="collapse-item" href="{{route('comments.index')}}">All Comments</a>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                      <i class="fas fa-fw fa-cog"></i>
                      <span>Categories</span>
                    </a>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                      <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Categories:</h6>
                        <a class="collapse-item" href="{{route('categories.index')}}">All Categories</a>
                        <a class="collapse-item" href="{{route('categories.create')}}">Create Categories</a>
                      </div>
                    </div>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFour">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Media</span>
                      </a>
                      <div id="collapseFive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                          <h6 class="collapse-header">Media:</h6>
                          <a class="collapse-item" href="{{route('media.index')}}">All Media</a>
                          <a class="collapse-item" href="{{route('media.create')}}">Create Media</a>
                        </div>
                      </div>
                    </li> 
  
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
  
        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
  
      </ul>
      <!-- End of Sidebar -->