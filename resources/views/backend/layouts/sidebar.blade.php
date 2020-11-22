@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="backend/" class="brand-link">
      <img src="{{asset('/')}}backend/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{(Auth::user()->image)?url('upload/user_images/'.Auth::user()->image):url('backend/img/admin-icon.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @if(Auth::user()->usertype == 'Admin')
          <li class="nav-item {{($prefix == '/users')? 'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Manage User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('users.view')}}" class="nav-link {{($route == 'users.view')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View User</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          <li class="nav-item {{($prefix == '/profiles')? 'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                Manage Profile
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('profiles.view')}}" class="nav-link {{($route == 'profiles.view')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View profile</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('profiles.password.view')}}" class="nav-link {{($route == 'profiles.password.view')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change password</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{($prefix == '/logos')? 'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-draw-polygon"></i>
              <p>
                Manage Logos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('logos.view')}}" class="nav-link {{($route == 'logos.view')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View logo</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{($prefix == '/sliders')? 'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-images"></i>
              <p>
                Manage Sliders
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('sliders.view')}}" class="nav-link {{($route == 'sliders.view')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Slider</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{($prefix == '/infos')? 'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-info-circle"></i>
              <p>
                Manage Info
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('infos.view')}}" class="nav-link {{($route == 'infos.view')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View info</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{($prefix == '/contacts')? 'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-envelope"></i>
              <p>
                Manage Contact
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('contacts.view')}}" class="nav-link {{($route == 'contacts.view')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Contact</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('communicates.view')}}" class="nav-link {{($route == 'communicates.view')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Communicate</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{($prefix == '/categories')? 'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-info-circle"></i>
              <p>
                Manage Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('categories.view')}}" class="nav-link {{($route == 'infos.view')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Category</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{($prefix == '/brands')? 'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-info-circle"></i>
              <p>
                Manage Brand
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('brands.view')}}" class="nav-link {{($route == 'brands.view')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Brand</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{($prefix == '/colors')? 'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-info-circle"></i>
              <p>
                Manage Color
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('colors.view')}}" class="nav-link {{($route == 'colors.view')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Color</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{($prefix == '/sizes')? 'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-info-circle"></i>
              <p>
                Manage Size
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('sizes.view')}}" class="nav-link {{($route == 'sizes.view')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Size</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{($prefix == '/products')? 'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-info-circle"></i>
              <p>
                Manage Product
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('products.view')}}" class="nav-link {{($route == 'products.view')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Product</p>
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