  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="{{ asset('img/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: 1">
      <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ url('storage/user/user-images/'.Auth::user()->user_image) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> {{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-header">General</li>
          <li class="nav-item  menu-closed">
            <a href="/" class="nav-link active">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                Dashboard

              </p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-closed">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Orders
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="orders" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-closed">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Categories
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/categories" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('categories.create-cat') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-closed">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Subcategories
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/subcategories" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('subcategories.create-subcat') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-closed">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-archive"></i>
              <p>
                Products
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/products" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('products.create-products') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-closed">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Vendors
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/vendors" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('vendors.approved-vendors') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approved</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('vendors.pending-vendors') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pending</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('vendors.rejected-vendors') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rejected</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('vendors.create-vendors') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-closed">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/customers" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('customers.create-customers') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
            </ul>
              <li class="nav-header">Settings</li>
              <li class="nav-item has-treeview menu-closed">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-credit-card"></i>
                  <p>
                    Payment Settings
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                  <a href="{{ route('pay-settings.view-payment-settings')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View </p>
                    </a>
                  </li>
                </ul>
                </li>
                <li class="nav-item has-treeview menu-closed">
                    <a href="#" class="nav-link active">
                      <i class="nav-icon fas fa-truck"></i>
                      <p>
                        Delivery Settings
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                      <a href="{{ route('pay-settings.view-payment-settings')}}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>View </p>
                        </a>
                      </li>
                    </ul>
                    </li>
                <li class="nav-item has-treeview menu-closed">
                    <a href="#" class="nav-link active">
                      <i class="nav-icon fas fa-bell"></i>
                      <p>
                        Notifications
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>View </p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Create Notifications </p>
                        </a>
                      </li>
                    </ul>
                    </li>
                    <li class="nav-item has-treeview menu-closed">
                        <a href="#" class="nav-link active">
                          <i class="nav-icon fas fa-shopping-cart"></i>
                          <p>
                            Banners
                            <i class="right fas fa-angle-left"></i>
                          </p>
                        </a>
                        <ul class="nav nav-treeview">
                          <li class="nav-item">
                            <a href="/banners" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>View </p>
                            </a>
                          </li>
                        </ul>
                      </li>
                <li class="nav-item has-treeview menu-closed">
                    <a href="#" class="nav-link active">
                      <i class="nav-icon fas fa-user-cog"></i>
                      <p>
                        Staff
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="/staff" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>View </p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('staff.create-staff')}}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Create</p>
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

  <!-- Content Wrapper. Contains page content -->
