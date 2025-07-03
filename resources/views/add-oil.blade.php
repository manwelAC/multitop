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
                            <h4 class="mb-0 fw-semibold">Add Oil</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                         <div class="card">
                              <div class="card-body">
                                   <form action="#" method="POST">
                                        <div class="row">
                                        <!-- Oil Name Dropdown -->
                                        <div class="col-md-6 mb-3">
                                             <label for="oil_name" class="form-label">Oil Name</label>
                                             <select class="form-select" id="oil_name" required>
                                                  <option selected disabled>Select oil type</option>
                                                  <option value="Engine Oil">Coconut Oil</option>
                                                  <option value="Engine Oil">RG Palm</option>
                                                  <option value="Engine Oil">DK Palm</option>
                                                  <option value="Others">Others</option>
                                             </select>
                                             <!-- Textbox to appear when "Others" is selected -->
                                             <div class="mt-2" id="otherOilTypeContainer" style="display: none;">
                                                  <input type="text" class="form-control" id="otherOilType" placeholder="Enter oil name">
                                             </div>
                                        </div>

                                        <!-- Stocks (KG) -->
                                        <div class="col-md-6 mb-3">
                                             <label for="stocks" class="form-label">Stocks </label>
                                             <input type="number" min="0" class="form-control" id="stocks" placeholder="Current stock quantity" required>
                                        </div>

                                        <!-- In (KG) -->
                                        <div class="col-md-6 mb-3">
                                             <label for="in_kg" class="form-label">In </label>
                                             <input type="number" min="0" class="form-control" id="in_kg" placeholder="Quantity added">
                                        </div>

                                        <!-- Out (KG) -->
                                        <div class="col-md-6 mb-3">
                                             <label for="out_kg" class="form-label">Sales Order</label>
                                             <input type="number" min="0" class="form-control" id="out_kg" placeholder="Quantity removed">
                                        </div>

                                        <!-- Current Stocks (Auto Calculated) -->
                                        <div class="col-md-6 mb-3">
                                             <label for="current_stocks" class="form-label">Current Stocks (KG)</label>
                                             <input type="number" min="0" class="form-control" id="current_stocks" placeholder="Auto-calculated" readonly>
                                        </div>

                                        <!-- Inventory Cost -->
                                        <div class="col-md-6 mb-3">
                                             <label for="inventory_cost" class="form-label">Inventory Cost </label>
                                             <input type="number" min="0" step="0.01" class="form-control" id="inventory_cost" placeholder="e.g. 5.99" required>
                                        </div>

                                        <!-- Submit Buttons -->
                                        <div class="col-md-12 d-flex justify-content-end gap-2 mt-4">
                                             <button type="reset" class="btn btn-light">Reset</button>
                                             <button type="submit" class="btn btn-primary">Save Oil Inventory</button>
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
          <script>
// Show/hide the "Others" text input based on dropdown selection
document.getElementById('oil_name').addEventListener('change', function() {
    const otherContainer = document.getElementById('otherOilTypeContainer');
    if (this.value === 'Others') {
        otherContainer.style.display = 'block';
        document.getElementById('otherOilType').required = true;
    } else {
        otherContainer.style.display = 'none';
        document.getElementById('otherOilType').required = false;
    }
});
</script>

</body>
</html>