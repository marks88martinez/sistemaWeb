<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      {{-- <img src="template_admin/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
            <img src="/template_admin/admin/img/logo01.png" class="brand-image img-circle elevation-3" style="opacity: .8" alt="">
      <span class="brand-text font-weight-light"><strong>Eden</strong></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        {{-- <div class="image">
          <img src="template_admin/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> --}}
        <div class="info">
          <a href="#" class="d-block"> {{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="dasboard" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard </p>
                </a>
              </li>

            </ul>
          </li>


          <li class="nav-item">
            <a href="/users" class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
              </p>
            </a>
           
          </li>
          <li class="nav-item">
            <a href="/banners" class="nav-link {{ Request::is('banners*') ? 'active' : '' }}">
              <i class="nav-icon far fa-image"></i>
              <p>
                Banners
              </p>
            </a>
           
          </li>
          <li class="nav-item">
            <a href="/marcas" class="nav-link {{ Request::is('marcas*') ? 'active' : '' }}">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Marcas
                
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="/categorias" class="nav-link  {{ Request::is('categorias*') ? 'active' : '' }} ">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Categorias
               
              </p>
            </a>
            
          </li>
          <li class="nav-item ">
            <a href="/subcategorias" class="nav-link {{ Request::is('subcategorias*') ? 'active' : '' }} ">
              <i class="nav-icon far fa-folder-open"></i>
              <p>
                SubCategorias
               
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/productos" class="nav-link {{ Request::is('productos*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-store"></i>
              <p>
                Productos
               
              </p>
            </a>
            
          </li>
          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Promocionar
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/marcas" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crear Promocion</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Newsletter
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/marcas" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lista de Newsletter</p>
                </a>
              </li>

            </ul>
          </li> -->
          <li class="nav-item ">
            <a href="#" class="nav-link  ">
            <i class="fas fa-cogs nav-icon"></i> 
              <p>
                 Setup

              </p>
            </a>

          </li>



        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
