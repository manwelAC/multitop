<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from techzaa.in/venton/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 May 2025 02:56:19 GMT -->
<head>
     <!-- Title Meta -->
     <meta charset="utf-8" />
     <title>Dashboard</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="A fully responsive premium admin dashboard template" />
     <meta name="author" content="Techzaa" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />

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
</head>

<body>
     <!-- START Wrapper -->
     <div class="wrapper">
     @include('topbar')
     @include('side-nav')
          <div class="page-content">
               <!-- Start Container Fluid -->
               <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                              <h4 class="mb-0 fw-semibold">Dashboard</h4>
                            </div>
                        </div>
                    </div>
               <div class="row">
                    <div class="col-xxl-12"> <!-- Changed to full width (12 columns) -->
                         <div class="card w-100"> <!-- Added w-100 to ensure full width -->
                              <div class="card-header d-flex align-items-center justify-content-between gap-2">
                                   <h4 class="card-title">Product Performance</h4>
                                   <div>
                                        <button type="button" class="btn btn-sm btn-outline-light">ALL</button>
                                        <button type="button" class="btn btn-sm btn-outline-light">1M</button>
                                        <button type="button" class="btn btn-sm btn-outline-light">6M</button>
                                        <button type="button" class="btn btn-sm btn-outline-light active">1Y</button>
                                   </div>
                              </div>
                              <div class="card-body">
                                   <div class="row text-center">
                                        <div class="col-md-3 col-6">
                                        <div class="bg-soft-light">
                                             <p class="text-muted pt-3 mb-1">Total Sales</p>
                                             <h4 class="pb-3">
                                                  <span>₱13.99k</span>
                                             </h4>
                                        </div>
                                        </div>
                                        <div class="col-md-3 col-6">
                                        <div class="bg-soft-light">
                                             <p class="text-muted pt-3 mb-1">Total Refunds</p>
                                             <h4 class="pb-3">
                                                  <span>₱32.5k</span>
                                             </h4>
                                        </div>
                                        </div>
                                        <div class="col-md-3 col-6">
                                        <div class="bg-soft-light">
                                             <p class="text-muted pt-3 mb-1">Total Orders</p>
                                             <h4 class="pb-3">
                                                  <span>1,200</span>
                                             </h4>
                                        </div>
                                        </div>
                                        <div class="col-md-3 col-6">
                                        <div class="bg-soft-light">
                                             <p class="text-muted pt-3 mb-1">Net Profit</p>
                                             <h4 class="pb-3">
                                                  <span>₱11k</span>
                                             </h4>
                                        </div>
                                        </div>
                                   </div>
                                   
                              </div>
                         </div> <!-- end card -->
                    </div> <!-- end col -->
                    </div> <!-- end row -->

                    <div class="row">
                         <div class="col-lg-8">
                         </div> <!-- end col -->
                    </div> <!-- end row -->
                    <div class="row">
                         <div class="col-xxl-12"> <!-- Changed from col-xxl-7 to col-xxl-12 -->
                              <div class="card w-100"> <!-- Added w-100 class -->
                                   <div class="d-flex card-header align-items-center justify-content-between">
                                        <h4 class="card-title">
                                             Recent Orders
                                        </h4>

                                        <a href="add-sales.html" class="btn btn-sm btn-soft-primary">
                                             <i class="bx bx-plus me-1"></i>Create Order
                                        </a>
                                   </div>
                                   <!-- end card body -->
                                   <div class="table-responsive">
                                        <table class="table table-hover table-sm mb-0 w-100"> <!-- Added w-100 class -->
                                             <thead class="bg-light bg-opacity-50">
                                             <tr>
                                                  <th class="ps-3 border-0">
                                                       Order ID.
                                                  </th>
                                                  <th class="border-0">
                                                       Date
                                                  </th>
                                                  <th class="border-0">
                                                       Product Image
                                                  </th>
                                                  <th class="border-0">
                                                       Product Name
                                                  </th>
                                                  <th class="border-0">
                                                       Customer Name
                                                  </th>
                                                  <th class="border-0">
                                                       Phone No.
                                                  </th>
                                                  <th class="border-0">
                                                       Address
                                                  </th>
                                                  <th class="border-0">
                                                       Payment Type
                                                  </th>
                                                  <th class="border-0">
                                                       Status
                                                  </th>
                                             </tr>
                                             </thead>
                                             <!-- end thead-->
                                             <tbody>
                                             <tr>
                                                  <td class="ps-3">
                                                       <a href="#!">#MT5625</a>
                                                  </td>
                                                  <td>29 April 2024</td>
                                                  <td>
                                                       <img src="assets/images/products/Styro Cup Coffee Express 8oz.png" alt="product-1(1)" class="img-fluid avatar-sm">
                                                  </td>
                                                  <td>Styro Cup Coffee Express 8oz</td>
                                                  <td>
                                                       <a href="#!">Karl Brizuela</a>
                                                  </td>
                                                  <td>09665494231</td>
                                                  <td>Caloocan City</td>
                                                  <td>Gcash</td>
                                                  <td>
                                                       <i class="bx bxs-circle text-success me-1"></i>Completed
                                                  </td>
                                             </tr>
                                             <tr>
                                                  <td class="ps-3">
                                                       <a href="#!">#MT9652</a>
                                                  </td>
                                                  <td>25 April 2024</td>
                                                  <td>
                                                       <img src="assets/images/products/Styro Cup 8oz MP.png" alt="product-4" class="img-fluid avatar-sm">
                                                  </td>
                                                  <td>Styro Cup 8oz MP</td>
                                                  <td>
                                                       <a href="#!">Christian James A Antonio</a>
                                                  </td>
                                                  <td>09887452145</td>
                                                  <td>Las Pinas</td>
                                                  <td>Gcash</td>
                                                  <td>
                                                       <i class="bx bxs-circle text-success me-1"></i>Completed
                                                  </td>
                                             </tr>
                                             <tr>
                                                  <td class="ps-3">
                                                       <a href="#!">#MT5984</a>
                                                  </td>
                                                  <td>25 April 2024</td>
                                                  <td>
                                                       <img src="assets/images/products/Styro Bowl Eps12oz STC.png" alt="product-5" class="img-fluid avatar-sm">
                                                  </td>
                                                  <td>Styro Bowl Eps12oz STC</td>
                                                  <td>
                                                       <a href="#!">Mark John Dadivas</a>
                                                  </td>
                                                  <td>09864872198</td>
                                                  <td>Romblon</td>
                                                  <td>Gcash</td>
                                                  <td>
                                                       <i class="bx bxs-circle text-success me-1"></i>Completed
                                                  </td>
                                             </tr>
                                             <tr>
                                                  <td class="ps-3">
                                                       <a href="#!">#MT3625</a>
                                                  </td>
                                                  <td>21 April 2024</td>
                                                  <td>
                                                       <img src="assets/images/products/Styro Bowl EPS12oz MP.png" alt="product-6" class="img-fluid avatar-sm">
                                                  </td>
                                                  <td>Styro Bowl EPS12oz MP</td>
                                                  <td>
                                                       <a href="#!">Kenneth France</a>
                                                  </td>
                                                  <td>09885462548</td>
                                                  <td>Quezon City</td>
                                                  <td>Gcash</td>
                                                  <td>
                                                       <i class="bx bxs-circle text-primary me-1"></i>Processing
                                                  </td>
                                             </tr>
                                             <tr>
                                                  <td class="ps-3">
                                                       <a href="#!">#MT8652</a>
                                                  </td>
                                                  <td>18 April 2024</td>
                                                  <td>
                                                       <img src="assets/images/products/Styro Plate Round FC.png" alt="product-1(2)" class="img-fluid avatar-sm">
                                                  </td>
                                                  <td>Styro Plate Round FC</td>
                                                  <td>
                                                       <a href="#!">Mark James Rafael</a>
                                                  </td>
                                                  <td>09714451147</td>
                                                  <td>Talavera</td>
                                                  <td>Gcash</td>
                                                  <td>
                                                       <i class="bx bxs-circle text-primary me-1"></i>Processing
                                                  </td>
                                             </tr>
                                             </tbody>
                                             <!-- end tbody -->
                                        </table>
                                        <!-- end table -->
                                   </div>
                                   <!-- table responsive -->

                                   <div class="card-footer border-top">
                                        <div class="row align-items-center g-3">
                                             <div class="col-sm">
                                             <div class="text-muted">
                                                  Showing
                                                  <span class="fw-semibold">5</span>
                                                  of
                                                  <span class="fw-semibold">90,521</span>
                                                  orders
                                             </div>
                                             </div>

                                             <div class="col-sm-auto">
                                             <ul class="pagination pagination-rounded m-0">
                                                  <li class="page-item">
                                                       <a href="#" class="page-link"><i class="bx bx-left-arrow-alt"></i></a>
                                                  </li>
                                                  <li class="page-item active">
                                                       <a href="#" class="page-link">1</a>
                                                  </li>
                                                  <li class="page-item">
                                                       <a href="#" class="page-link">2</a>
                                                  </li>
                                                  <li class="page-item">
                                                       <a href="#" class="page-link">3</a>
                                                  </li>
                                                  <li class="page-item">
                                                       <a href="#" class="page-link"><i class="bx bx-right-arrow-alt"></i></a>
                                                  </li>
                                             </ul>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <!-- end card -->
                         </div>
                         <!-- end col -->
                         </div> <!-- end row -->
               </div>
                <!-- put your design here -->
               <!-- End Container Fluid -->
               <!-- ========== Footer Start ========== -->
               @include('footer')
               <!-- ========== Footer End ========== -->
          </div>
     </div>
     <!-- end of wrapper -->
    <script src="{{ asset('venton/assets/js/vendor.js') }}"></script>
    <script src="{{ asset('venton/assets/js/app.js') }}"></script>
    <script src="{{ asset('venton/assets/vendor/jsvectormap/js/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('venton/assets/vendor/jsvectormap/maps/world-merc.js') }}"></script>
    <script src="{{ asset('venton/assets/vendor/jsvectormap/maps/world-merc.js') }}"></script>
    <script src="{{ asset('venton/assets/vendor/jsvectormap/maps/world.js') }}"></script>
    <script src="{{ asset('venton/assets/js/pages/dashboard.js') }}"></script>
    <!-- custom script here -->
     

</body>
</html>