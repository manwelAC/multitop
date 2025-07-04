<!-- App favicon -->

<link rel="shortcut icon" href="{{ asset('venton/assets/images/favicon.ico') }}">

<!-- Vendor css (Require in all Page) -->
<link href="{{ asset('venton/assets/css/vendor.min.css') }}" rel="stylesheet" type="text/css" />

<!-- Icons css (Require in all Page) -->
<link href="{{ asset('venton/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

<!-- App css (Require in all Page) -->
<link href="{{ asset('venton/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

<!-- Theme Config js (Require in all Page) -->
<script src="{{ asset('venton/assets/js/config.js') }}"></script>
<div class="main-nav">
               <!-- Sidebar Logo -->
               <div class="logo-box">
               <a href="/dashboard" class="logo-dark">
                         <img src="{{ asset('venton/assets/images/logo-dark.png') }}" class="logo-lg" alt="logo dark" style="width: 190px; height: 180px;">
                    </a>
               </div>

               <!-- Menu Toggle Button (sm-hover) -->
               <button type="button" class="button-sm-hover" aria-label="Show Full Sidebar">
                    <i class='bx bx-menu button-sm-hover-icon'></i>
               </button>

               <div class="scrollbar" data-simplebar>
                    <ul class="navbar-nav" id="navbar-nav">

                         <li class="menu-title">General</li>

                         <li class="nav-item">
                              <a class="nav-link" href="/dashboard">
                                   <span class="nav-icon">
                                        <iconify-icon icon="solar:widget-5-broken"></iconify-icon>
                                   </span>
                                   <span class="nav-text"> Dashboard </span>
                              </a>
                         </li>

                         <li class="nav-item">
                              <a class="nav-link menu-arrow" href="#sidebarSales" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarOrders">
                                   <span class="nav-icon">
                                        <iconify-icon icon="solar:ticket-sale-broken"></iconify-icon>
                                   </span>
                                   <span class="nav-text"> Sales Order </span>
                              </a>
                              <div class="collapse" id="sidebarSales">
                                   <ul class="nav sub-navbar-nav">

                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/list-sales">Order List</a>    
                                        </li>
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/add-sales">Add Order</a>
                                        </li>
                                   </ul>
                              </div>
                         </li>

                         <li class="nav-item">
                              <a class="nav-link menu-arrow" href="#sidebarProducts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProducts">
                                   <span class="nav-icon">
                                        <iconify-icon icon="solar:user-rounded-broken"></iconify-icon>
                                   </span>
                                   <span class="nav-text"> Customer </span>
                              </a>
                              <div class="collapse" id="sidebarProducts">
                                   <ul class="nav sub-navbar-nav">
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/customer-list">Customer List</a>
                                        </li>
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/add-customer">Add Customer</a>
                                        </li>
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/customer-suppliers">Supplier List</a>
                                        </li>
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/add-suppliers">Add Supplier</a>
                                        </li>
                                   </ul>
                              </div>
                         </li>

                         <li class="nav-item">
                              <a class="nav-link menu-arrow" href="#sidebarCategory" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCategory">
                                   <span class="nav-icon">
                                        <iconify-icon icon="solar:cart-large-minimalistic-broken"></iconify-icon>
                                   </span>
                                   <span class="nav-text"> Product Management </span>
                              </a>
                              <div class="collapse" id="sidebarCategory">
                                   <ul class="nav sub-navbar-nav">
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="{{ route('products.index') }}">List Product</a>
                                        </li>                         
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="{{ route('products.create') }}">Add Product</a>
                                        </li>
                                   </ul>
                              </div>
                         </li>

                         <li class="nav-item">
                              <a class="nav-link menu-arrow" href="#sidebarInventory" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarInventory">
                                   <span class="nav-icon">
                                        <iconify-icon icon="solar:box-broken"></iconify-icon>
                                   </span>
                                   <span class="nav-text"> Inventory Management</span>
                              </a>
                              <div class="collapse" id="sidebarInventory">
                                   <ul class="nav sub-navbar-nav">
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/product-inventory">Product Inventory</a>
                                        </li>
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/oil-list">Oil Inventory</a>
                                        </li>
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/add-oil">Add Oil</a>
                                        </li>
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/container-list">Container Inventory</a>
                                        </li>
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/add-container">Add Container</a>
                                        </li>
                                   </ul>
                              </div>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link menu-arrow" href="#sidebardeliver" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebardeliver">
                                   <span class="nav-icon">
                                        <iconify-icon icon="solar:map-point-rotate-broken"></iconify-icon>
                                   </span>
                                   <span class="nav-text"> Delivery Management </span>
                              </a>
                              <div class="collapse" id="sidebardeliver">
                                   <ul class="nav sub-navbar-nav">
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/withdrawal">Withdrawal</a>
                                        </li>
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/withdrawal-list">Withdrawal List</Li></a>
                                        </li>
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/final-backloading">Final Backloading</a>
                                        </li>
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/final-loading-form">Final Loading Form</a>
                                        </li>
                                   </ul>
                              </div>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link menu-arrow" href="#sidebarOrders" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarOrders">
                                   <span class="nav-icon">
                                        <iconify-icon icon="solar:user-id-broken"></iconify-icon>
                                   </span>
                                   <span class="nav-text"> Employee Management </span>
                              </a>
                              <div class="collapse" id="sidebarOrders">
                                   <ul class="nav sub-navbar-nav">
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/employee-ir">Employee IR</a>
                                        </li>
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/add-employee">Add Employee</a>
                                        </li>
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/employee-tr">Employee TR</a>
                                        </li>
                                        
                                   </ul>
                              </div>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link menu-arrow" href="#sidebarCollections" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarOrders">
                                   <span class="nav-icon">
                                        <iconify-icon icon="solar:wallet-money-broken"></iconify-icon>
                                   </span>
                                   <span class="nav-text"> Collection Management </span>
                              </a>
                              <div class="collapse" id="sidebarCollections">
                                   <ul class="nav sub-navbar-nav">

                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/add-collection">Add Collection</a>    
                                        </li>
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/collection-reports">Collection Reports</a>
                                        </li>
                                   </ul>
                              </div>
                         </li>

                         <li class="nav-item">
                              <a class="nav-link menu-arrow" href="#sidebarReports" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarOrders">
                                   <span class="nav-icon">
                                        <iconify-icon icon="solar:document-add-broken"></iconify-icon>
                                   </span>
                                   <span class="nav-text"> Reports </span>
                              </a>
                              <div class="collapse" id="sidebarReports">
                                   <ul class="nav sub-navbar-nav">
                                        
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/expenses-report">Expenses Reports</a>    
                                        </li>
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/add-expenses">Add Expenses</a>    
                                        </li>
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/ar-reports">Ar Reports</a>
                                        </li>
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/add-ar-reports">Add AR Reports</a>
                                        </li>
                                   </ul>
                              </div>
                         </li>

                         
                         <hr>
                         <li class="nav-item">
                         <!-- Logout Form -->
                              <form method="POST" action="{{ route('logout') }}">
                              @csrf
                              <a class="nav-link" href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                                   <span class="nav-icon">
                                        <iconify-icon icon="solar:logout-broken"></iconify-icon>
                                   </span>
                                   <span class="nav-text">Logout</span>
                              </a>
                         </form>
                         </li>
                    </ul>
               </div>
          </div>
          <script src="{{ asset('venton/assets/vendor/jsvectormap/js/jsvectormap.min.js') }}"></script>
     <script src="{{ asset('venton/assets/vendor/jsvectormap/maps/world-merc.js') }}"></script>
     <script src="{{ asset('venton/assets/vendor/jsvectormap/maps/world-merc.js') }}"></script>
     <script src="{{ asset('venton/assets/vendor/jsvectormap/maps/world.js') }}"></script>
     <script src="{{ asset('venton/assets/js/pages/dashboard.js') }}"></script>
