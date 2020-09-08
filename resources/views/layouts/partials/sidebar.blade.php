  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="/{{ env('URL_REMOTE', '') }}dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/{{ env('URL_REMOTE', '') }}dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="{{ route('admin.index') }}" class="nav-link {{ setActive(['admin']) }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview {{ setMenuOpen(['admin/rubros*']) }} {{ setMenuOpen(['admin/categories*']) }} {{ setMenuOpen(['admin/stockproducts*']) }}">
          <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Almacen
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                
                <a href="{{ route('rubros.index') }}" class="nav-link {{ setActive(['admin/rubros*']) }}">
                  <i class="far fa-circle nav-icon ml-2"></i>
                  <p>Rubros</p>
                </a>
              </li>
              <li class="nav-item">
                
                <a href="{{ route('categories.index') }}" class="nav-link {{ setActive(['admin/categories*']) }}">
                  <i class="far fa-circle nav-icon ml-2"></i>
                  <p>Categorías</p>
                </a>
              </li>

              <li class="nav-item">
                
                <a href="{{ route('stockproducts.index') }}" class="nav-link {{ setActive(['admin/stockproducts*']) }}">
                  <i class="far fa-circle nav-icon ml-2"></i>
                  <p>Productos Stock</p>
                </a>
              </li>
              
            </ul>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>