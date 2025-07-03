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
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 fw-semibold">Final Backloading</h4>
                            <ol class="breadcrumb mb-0"></ol>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form id="backloadingForm">
                                    <div class="row">
                                        <!-- Withdrawal Selection -->
                                        <div class="col-md-6 mb-3">
                    <label for="withdrawalSelect" class="form-label">Select Withdrawal</label>
                    <select class="form-select" id="withdrawalSelect" required>
                        <option selected disabled value="">Select withdrawal</option>
                        
                        <!-- Single order withdrawal -->
                        <option value="WD-MT5625" 
                            data-date="2024-04-29"
                            data-orders='[
                                {
                                    "orderNumber": "MT5625",
                                    "customer": "Karl Brizuela",
                                    "address": "Caloocan City",
                                    "phone": "09665494231",
                                    "items": [
                                        {"id":1,"name":"Styro Cup Coffee Express 8oz","withdrawn_qty":12,"unit":"pcs"}
                                    ]
                                }
                            ]'>
                            WD-MT5625 - Karl Brizuela (1 Order)
                        </option>
                        
                        <!-- Single order withdrawal -->
                        <option value="WD-MT9652" 
                            data-date="2024-04-25"
                            data-orders='[
                                {
                                    "orderNumber": "MT9652",
                                    "customer": "Christian James A Antonio",
                                    "address": "Las Pinas",
                                    "phone": "09887452145",
                                    "items": [
                                        {"id":2,"name":"Styro Cup 8oz MP","withdrawn_qty":24,"unit":"pcs"}
                                    ]
                                }
                            ]'>
                            WD-MT9652 - Christian James A Antonio (1 Order)
                        </option>
                        
                        <!-- Multiple orders withdrawal -->
                        <option value="WD-MT5984" 
                            data-date="2024-04-25"
                            data-orders='[
                                {
                                    "orderNumber": "MT5984",
                                    "customer": "Mark John Dadivas",
                                    "address": "Romblon",
                                    "phone": "09864872198",
                                    "items": [
                                        {"id":3,"name":"Styro Bowl Eps12oz STC","withdrawn_qty":8,"unit":"pcs"},
                                        {"id":4,"name":"Styro Cup 8oz MP","withdrawn_qty":12,"unit":"pcs"}
                                    ]
                                },
                                {
                                    "orderNumber": "MT5984-2",
                                    "customer": "Mark John Dadivas",
                                    "address": "Romblon",
                                    "phone": "09864872198",
                                    "items": [
                                        {"id":5,"name":"Styro Plate Round FC","withdrawn_qty":6,"unit":"pcs"}
                                    ]
                                }
                            ]'>
                            WD-MT5984 - Mark John Dadivas (2 Orders)
                        </option>
                        
                        <!-- Multiple orders withdrawal -->
                        <option value="WD-MT3625" 
                            data-date="2024-04-21"
                            data-orders='[
                                {
                                    "orderNumber": "MT3625",
                                    "customer": "Kenneth France",
                                    "address": "Quezon City",
                                    "phone": "09885462548",
                                    "items": [
                                        {"id":6,"name":"Styro Bowl EPS12oz MP","withdrawn_qty":6,"unit":"pcs"},
                                        {"id":7,"name":"Styro Cup Coffee Express 8oz","withdrawn_qty":12,"unit":"pcs"}
                                    ]
                                },
                                {
                                    "orderNumber": "MT3625-2",
                                    "customer": "Kenneth France",
                                    "address": "Quezon City",
                                    "phone": "09885462548",
                                    "items": [
                                        {"id":8,"name":"Styro Plate Round FC","withdrawn_qty":10,"unit":"pcs"}
                                    ]
                                }
                            ]'>
                            WD-MT3625 - Kenneth France (2 Orders)
                        </option>
                        
                        <!-- Multiple orders withdrawal -->
                        <option value="WD-MT8652" 
                            data-date="2024-04-18"
                            data-orders='[
                                {
                                    "orderNumber": "MT8652",
                                    "customer": "Mark James Rafael",
                                    "address": "Talavera",
                                    "phone": "09714451147",
                                    "items": [
                                        {"id":9,"name":"Styro Plate Round FC","withdrawn_qty":20,"unit":"pcs"},
                                        {"id":10,"name":"Styro Bowl Eps12oz STC","withdrawn_qty":15,"unit":"pcs"}
                                    ]
                                },
                                {
                                    "orderNumber": "MT8652-2",
                                    "customer": "Mark James Rafael",
                                    "address": "Talavera",
                                    "phone": "09714451147",
                                    "items": [
                                        {"id":11,"name":"Styro Cup 8oz MP","withdrawn_qty":30,"unit":"pcs"}
                                    ]
                                },
                                {
                                    "orderNumber": "MT8652-3",
                                    "customer": "Mark James Rafael",
                                    "address": "Talavera",
                                    "phone": "09714451147",
                                    "items": [
                                        {"id":12,"name":"Styro Bowl EPS12oz MP","withdrawn_qty":8,"unit":"pcs"}
                                    ]
                                }
                            ]'>
                            WD-MT8652 - Mark James Rafael (3 Orders)
                        </option>
                    </select>
                </div>

                                        <!-- Withdrawal Info -->
                                        <div class="col-md-3 mb-3">
                                            <label for="backloadDate" class="form-label">Backload Date</label>
                                            <input type="date" class="form-control" id="backloadDate" required>
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label for="truckNumber" class="form-label">Truck Number</label>
                                            <input type="text" class="form-control" id="truckNumber" placeholder="Enter truck number" required>
                                        </div>

                                        <!-- Summary Section -->
                                        <div class="col-md-12 mb-4">
                                            <div class="card bg-light">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-3">Withdrawal Summary</h5>
                                                    <div class="row text-center">
                                                        <div class="col-md-4">
                                                            <h6>Total Orders</h6>
                                                            <p class="h4" id="totalOrders">0</p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <h6>Total Delivered</h6>
                                                            <p class="h4" id="totalDelivered">0 items</p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <h6>Total Returned</h6>
                                                            <p class="h4" id="totalReturned">0 items</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Orders Container -->
                                        <div class="col-md-12 mb-3" id="ordersContainer">
                                            <div class="text-center text-muted py-4">
                                                <i class="bx bx-package h1"></i>
                                                <h5>No withdrawal selected</h5>
                                                <p>Please select a withdrawal to view orders</p>
                                            </div>
                                        </div>

                                        <!-- Remarks -->
                                        <div class="col-md-12 mb-3">
                                            <label for="transactionRemarks" class="form-label">Remarks</label>
                                            <textarea class="form-control" id="transactionRemarks" rows="2" placeholder="Enter any notes"></textarea>
                                        </div>

                                        <!-- Submit Buttons -->
                                        <div class="col-md-12 d-flex justify-content-end gap-2 mt-4">
                                            <button type="reset" class="btn btn-light">Reset</button>
                                            <button type="submit" class="btn btn-primary">Process Backloading</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Toast Notifications -->
                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999;">
                    <div id="successToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body" id="successToastMessage"></div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    </div>
                    <div id="errorToast" class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body" id="errorToastMessage"></div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    </div>
                </div>

                                        
                         <!-- Error Toast -->
                         <div id="errorToast" class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
                              <div class="d-flex">
                                   <div class="toast-body" id="errorToastMessage">
                                        Error message here
                                   </div>
                                   <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                              </div>
                         </div>
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