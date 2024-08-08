
  @extends('admin.layout')
  @section('mainContent')
    <!-- overlay -->
  <div id="sidebar-overlay" class="overlay w-100 vh-100 position-fixed d-none"></div>

  <!-- sidebar -->
  <div class="col-md-3 col-lg-2 px-0 position-fixed h-100 bg-dark shadow-sm sidebar" id="sidebar">
    <h1 class="bi bi-bootstrap text-primary d-flex my-4 justify-content-center"></h1>
    <div class="list-group rounded-0 bg-dark">
      <a  class="list-group-item list-group-item-
        list-group-item-dark border-0 d-flex align-items-center"   href=""  aria-controls="home">
        <span class="bi bi-border-all"></span>
        <span class="ms-2">Dashboard</span>
      </a>
      <!-- {{-- <a  class="list-group-item list-group-item-action list-group-item-dark border-0 align-items-center {{ Route::is('superadmin.heroslider') ? 'active' : '' }}"   href="{{Route('superadmin.heroslider')}}"  aria-controls="hero">
        <span class="bi bi-box"></span>
        <span class="ms-2">Hero slider</span>
      </a> --}} -->
      

      <button class="list-group-item list-group-item-action list-group-item-dark border-0 d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#slider-collapse">
        <div>
          <span class="bi bi-box"></span>
          <span class="ms-2">Slider</span>
        </div>
        <span class="bi bi-chevron-down small"></span>
      </button>
      <div class="collapse  {{ Route::is('superadmin.heroslider') ? 'show' : '' }}" id="slider-collapse" data-bs-parent="#sidebar">
        <div class="list-group">
          <a  class="list-group-item list-group-item-action list-group-item-dark border-0 pl-5 rounded-0 {{ Route::is('superadmin.heroslider') ? 'active' : '' }}"  >
            <span class="ms-2">Home Hero Slider</span>
          </a>
        </div>
      </div>
      {{-- <!-- products -->
      <button class="list-group-item list-group-item-action list-group-item-dark border-0 d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#sale-collapse">
        <div>
          <span class="bi bi-box-seam-fill fs-5"></span>
          <span class="ms-2">Product</span>
        </div>
        <span class="bi bi-chevron-down small"></span>
      </button>
      <div class="collapse {{ Route::is('superadmin.product-list-index') || Route::is('superadmin.product-category-index') || Route::is('superadmin.category-attributes-index') || Route::is('superadmin.product-size-index') || Route::is('superadmin.product-material-index') || Route::is('superadmin.product-color-index') || Route::is('superadmin.product-thickness-index') || Route::is('superadmin.product-sub-category-index') ? 'show' : '' }}" id="sale-collapse" data-bs-parent="#sidebar">
        <div class="list-group">
          <a  class="list-group-item list-group-item-action list-group-item-dark border-0 pl-5 rounded-0 {{ Route::is('superadmin.product-list-index') ? 'active' : '' }}"  href="{{Route('superadmin.product-list-index')}}" >
            <span class="ms-2">Product list</span>
          </a>
          <a  class="list-group-item list-group-item-action list-group-item-dark border-0 pl-5 rounded-0 {{ Route::is('superadmin.product-category-index') ? 'active' : '' }}" href="{{Route('superadmin.product-category-index')}}" >
            <span class="ms-2">Product category</span>
          </a>
          <a  class="list-group-item list-group-item-action list-group-item-dark border-0 pl-5 rounded-0 {{ Route::is('superadmin.category-attributes-index') ? 'active' : '' }}" href="{{Route('superadmin.category-attributes-index')}}" >
            <span class="ms-2">Category attributes</span>
          </a>
        </div>
      </div>
      <!-- Reports -->
      <button class="list-group-item list-group-item-action list-group-item-dark border-0 d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#report-collapse">
        <div>
          <span class="bi bi-box"></span>
          <span class="ms-2">Report</span>
        </div>
        <span class="bi bi-chevron-down small"></span>
      </button>
      <div class="collapse" id="report-collapse" data-bs-parent="#sidebar">
        <div class="list-group">
          <a  class="list-group-item list-group-item-action list-group-item-dark border-0 pl-5 rounded-0" >
            <span class="ms-2">Sales</span>
          </a>
        </div>
      </div>
      <!-- Plams -->
      <button class="list-group-item list-group-item-action list-group-item-dark border-0 d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#plansCollapse">
        <div>
          <span class="bi bi-box-seam-fill fs-5"></span>
          <span class="ms-2">Plans</span>
        </div>
        <span class="bi bi-chevron-down small"></span>
      </button>
      <div class="collapse {{ Route::is('superadmin.plans-index') ? 'show' : '' }}" id="plansCollapse" data-bs-parent="#sidebar">
        <div class="list-group">
          <a class="list-group-item list-group-item-action list-group-item-dark border-0 pl-5 rounded-0 {{ Route::is('superadmin.plans-index') ? 'active' : '' }}"  href="{{Route('superadmin.plans-index')}}" >
            <span class="ms-2">Plans</span>
          </a>
        </div>
      </div>
      <a class="list-group-item list-group-item-action  list-group-item-dark border-0 d-flex align-items-center {{ Route::is('superadmin.coupons-index') ? 'active' : '' }}"   href="{{Route('superadmin.coupons-index')}}"  aria-controls="home">
        <span class="bi bi-tags-fill fs-4"></span>
        <span class="ms-2">Coupons</span>
      </a>
      <a class="list-group-item list-group-item-action  list-group-item-dark border-0 d-flex align-items-center {{ Route::is('superadmin.b2c-delievry.index') ? 'active' : '' }}"   href="{{Route('superadmin.b2c-delievry.index')}}"  aria-controls="home">
        <span class="bi bi-truck fs-4"></span>
        <span class="ms-2">B2C Delivery</span>
      </a>
      <a class="list-group-item list-group-item-action  list-group-item-dark border-0 d-flex align-items-center {{ Route::is('superadmin.delivery-zones-index') ? 'active' : '' }}"   href="{{Route('superadmin.delivery-zones-index')}}"  aria-controls="home">
        <span class="bi bi-truck fs-4"></span>
        <span class="ms-2">Delivery zones</span>
      </a>
      <a class="list-group-item list-group-item-action  list-group-item-dark border-0 d-flex align-items-center {{ Route::is('superadmin.delivery-weights-index') ? 'active' : '' }}"   href="{{Route('superadmin.delivery-weights-index')}}"  aria-controls="home">
        <span class="bi bi-minecart fs-4"></span>
        <span class="ms-2">Delivery weight</span>
      </a>
      <a class="list-group-item list-group-item-action  list-group-item-dark border-0 d-flex align-items-center {{ Route::is('superadmin.vendors-index') ? 'active' : '' }}"   href="{{Route('superadmin.vendors-index')}}"  aria-controls="home">
        <span class="bi bi-shop fs-4"></span>
        <span class="ms-2">Vendors</span>
      </a>
      <a  class="list-group-item list-group-item-action  list-group-item-dark border-0 d-flex align-items-center {{ Route::is('superadmin.users-index') ? 'active' : '' }}"   href="{{Route('superadmin.users-index')}}"  aria-controls="home">
        <span class="bi bi-people-fill fs-4"></span>
        <span class="ms-2">Users</span>
      </a>
      <a  class="list-group-item list-group-item-action  list-group-item-dark border-0 d-flex align-items-center {{ Route::is('superadmin.usersAddress-index') ? 'active' : '' }}"   href="{{Route('superadmin.usersAddress-index')}}"  aria-controls="home">
        <span class="bi bi-geo-fill fs-5"></span>
        <span class="ms-2">User Address</span>
      </a>
      <a  class="list-group-item list-group-item-action  list-group-item-dark border-0 d-flex align-items-center {{ Route::is('superadmin.orders-index') ? 'active' : '' }}"   href="{{Route('superadmin.orders-index')}}"  aria-controls="home">
        <span class="bi bi-collection-fill fs-5"></span>
        <span class="ms-2">Orders</span>
      </a>
      <a  class="list-group-item list-group-item-action  list-group-item-dark border-0 d-flex align-items-center {{ Route::is('superadmin.order.details-index') ? 'active' : '' }}"   href="{{Route('superadmin.order.details-index')}}"  aria-controls="home">
        <span class="bi bi-calendar2-check-fill fs-5"></span>
        <span class="ms-2">Order Details</span>
      </a>
      <a  class="list-group-item list-group-item-action  list-group-item-dark border-0 d-flex align-items-center {{ Route::is('superadmin.order.vendor.payments.index') ? 'active' : '' }}"   href="{{Route('superadmin.order.vendor.payments.index')}}"  aria-controls="home">
        <span class="bi bi-arrow-left-right fs-5"></span>
        <span class="ms-2">Vendor Transactions</span>
      </a>
      <a  class="list-group-item list-group-item-action  list-group-item-dark border-0 d-flex align-items-center {{ Route::is('superadmin.complaints') ? 'active' : '' }}"   href="{{Route('superadmin.complaints')}}"  aria-controls="home">
        <span class="bi bi-chat-quote-fill fs-4"></span>
        <span class="ms-2">Complaints/Feedbacks</span>
      </a>
      <a  class="list-group-item list-group-item-action  list-group-item-dark border-0 d-flex align-items-center {{ Route::is('superadmin.hsncodes.index') ? 'active' : '' }}"   href="{{Route('superadmin.hsncodes.index')}}"  aria-controls="home">
        <span class="bi bi-chat-quote-fill fs-4"></span>
        <span class="ms-2">HSN Codes</span>
      </a> --}}
      <!-- <button class="list-group-item list-group-item-action list-group-item-dark border-0 d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#purchase-collapse">
        <div>
          <span class="bi bi-cart-plus"></span>
          <span class="ms-2">Purchase</span>
        </div>
        <span class="bi bi-chevron-down small"></span>
      </button>
      <div class="collapse" id="purchase-collapse" data-bs-parent="#sidebar">
        <div class="list-group">
          <a href="#" class="list-group-item list-group-item-action list-group-item-dark border-0 pl-5 rounded-0">Sellers</a>
          <a href="#" class="list-group-item list-group-item-action list-group-item-dark border-0 pl-5 rounded-0">Purchases</a>
        </div>
      </div> -->
    </div>
  </div>

  <div class="col-md-9 col-lg-10 ms-md-auto px-0 ms-md-auto">
    <!-- top nav -->
    <nav class="w-100 d-flex px-4 py-2 mb-4 shadow-sm navbar-dark bg-dark">
      <!-- close sidebar -->
      <button class="btn py-0 d-lg-none" id="open-sidebar">
        <span class="bi bi-list text-primary h3"></span>
      </button>
      <div class="dropdown ms-auto">
        <button class="btn py-0 d-flex align-items-center" id="logout-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
          <span class="bi bi-person h4 text-light"></span>
          <span class="bi bi-chevron-down ms-1 mb-2 small  text-light"></span>
        </button>
        <div class="dropdown-menu dropdown-menu-right border-0 shadow-sm" aria-labelledby="logout-dropdown">
          <a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a>
          <a class="dropdown-item" href="#">Settings</a>
        </div>
      </div>
    </nav>

    <!-- main content -->
    <main class="p-4 min-vh-100 tab-content" id="nav-tabContent">
      @yield('content')
    </main>
  </div>
  @endsection
