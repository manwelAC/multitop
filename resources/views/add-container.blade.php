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
                                <h4 class="mb-0 fw-semibold">Add Customer</h4>
                                <ol class="breadcrumb mb-0">
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- ========== Page Title End ========== -->

                    <!-- Start here.... -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form id="containerForm" method="POST">

                                        <div class="row">
                                            <!-- Customer Name -->
                                            <div class="col-md-6 mb-3">
                                                <label for="customerName" class="form-label">Customer Name</label>
                                                <input type="text" class="form-control" id="customerName" required>
                                            </div>

                                            <!-- White Tall Radio Buttons -->
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">White Tall</label>
                                                <div class="d-flex gap-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="whiteTall" id="withOil" value="With Oil" checked>
                                                        <label class="form-check-label" for="withOil">With Oil</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="whiteTall" id="withoutOil" value="Without Oil">
                                                        <label class="form-check-label" for="withoutOil">Without Oil</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Spring Deposit -->
                                            <div class="col-md-6 mb-3">
                                                <label for="springDeposit" class="form-label">Spring Deposit</label>
                                                <input type="number" step="0.01" min="0" class="form-control" id="springDeposit" placeholder="e.g., 50.00">
                                            </div>

                                            <!-- Container Type -->
                                            <div class="col-md-6 mb-3">
                                                <label for="containerType" class="form-label">Container Type</label>
                                                <select class="form-select" id="containerType" required>
                                                    <option selected disabled>Select type</option>
                                                    <option value="White Tall">WT</option>
                                                    <option value="Yellow Tall">YT</option>
                                                    <option value="Assorted White">AW</option>
                                                    <option value="YB">YB</option>
                                                    <option value="G">G</option>
                                                </select>
                                            </div>

                                            <!-- Container Status -->
                                            <div class="col-md-6 mb-3">
                                                <label for="containerStatus" class="form-label">Container Status</label>
                                                <select class="form-select" id="containerStatus" required>
                                                    <option selected disabled>Select status</option>
                                                    <option value="Damaged">Damaged</option>
                                                    <option value="For Cleaning">For Cleaning</option>
                                                    <option value="For Selling">For Selling</option>
                                                </select>
                                            </div>

                                            <!-- Container Cost -->
                                            <div class="col-md-6 mb-3">
                                                <label for="containerCost" class="form-label">Container Cost</label>
                                                <input type="number" step="0.01" min="0" class="form-control" id="containerCost" placeholder="e.g., 150.00">
                                            </div>

                                            <!-- Approved By -->
                                            <div class="col-md-6 mb-3">
                                                <label for="approvedBy" class="form-label">Approved By</label>
                                                <input type="text" class="form-control" id="approvedBy" placeholder="Admin / Staff Name" required>
                                            </div>

                                            <!-- Time In -->
                                            <div class="col-md-6 mb-3">
                                                <label for="timeIn" class="form-label">Time In</label>
                                                <input type="datetime-local" class="form-control" id="timeIn" required>
                                            </div>

                                            <!-- Time Out -->
                                            <div class="col-md-6 mb-3">
                                                <label for="timeOut" class="form-label">Time Out</label>
                                                <input type="datetime-local" class="form-control" id="timeOut">
                                            </div>

                                            <!-- Submit Buttons -->
                                            <div class="col-md-12 d-flex justify-content-end gap-2 mt-4">
                                                <button type="reset" class="btn btn-light">Reset</button>
                                                <button type="submit" class="btn btn-primary">Save Record</button>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
    <script>
          const businessTypeSelect = document.getElementById('businessType');
          const otherContainer = document.getElementById('otherBusinessTypeContainer');

          businessTypeSelect.addEventListener('change', function () {
          if (this.value === 'Others') {
               otherContainer.style.display = 'block';
          } else {
               otherContainer.style.display = 'none';
          }
          });
          </script>
     

</body>
</html>