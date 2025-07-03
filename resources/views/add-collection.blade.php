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
                                   <h4 class="mb-0 fw-semibold">Add Collection</h4>
                              </div>
                         </div>
                         </div>
                         <div class="row">
                         <div class="col-12">
                              <div class="card">
                                   <div class="card-body">
                                        <form>
                                             <div class="row">

                                             <!-- Collector Name -->
                                             <div class="col-md-6 mb-3">
                                                  <label for="collectorName" class="form-label">Collector Name</label>
                                                  <input type="text" class="form-control" id="collectorName" placeholder="Enter collector name" required>
                                             </div>

                                             <!-- Area -->
                                             <div class="col-md-6 mb-3">
                                                  <label for="area" class="form-label">Area</label>
                                                  <input type="text" class="form-control" id="area" placeholder="e.g., Zone A, District 5" required>
                                             </div>

                                             <!-- Collect Type -->
                                             <div class="col-md-6 mb-3">
                                                  <label for="collectType" class="form-label">Collect Type</label>
                                                  <select class="form-select" id="collectType" required>
                                                       <option selected disabled>Select collect type</option>
                                                       <option value="Delivery">Delivery</option>
                                                       <option value="Pickup">Pickup</option>
                                                       <option value="Exchange">Exchange</option>
                                                  </select>
                                             </div>

                                             <!-- Customer Name -->
                                             <div class="col-md-6 mb-3">
                                                  <label for="customerName" class="form-label">Customer Name</label>
                                                  <input type="text" class="form-control" id="customerName" placeholder="Customer full name" required>
                                             </div>

                                             <!-- Delivery Date -->
                                             <div class="col-md-6 mb-3">
                                                  <label for="deliveryDate" class="form-label">Delivery Date</label>
                                                  <input type="date" class="form-control" id="deliveryDate" required>
                                             </div>

                                             <!-- Payment Method -->
                                             <div class="col-md-6 mb-3">
                                                  <label for="paymentMethod" class="form-label">Payment Method</label>
                                                  <select class="form-select" id="paymentMethod" required>
                                                       <option selected disabled>Select payment method</option>
                                                       <option value="Cash">Cash</option>
                                                       <option value="Gcash">Gcash</option>
                                                       <option value="Bank Transfer">Bank Transfer</option>
                                                       <option value="COD">Cash on Delivery</option>
                                                       <option value="Cheque">Cheque</option>
                                                  </select>
                                             </div>

                                             <!-- Cheque Details (hidden by default) -->
                                             <div id="chequeDetails" class="row" style="display: none;">
                                             <div class="col-md-4 mb-3">
                                                  <label for="bankName" class="form-label">Bank Name</label>
                                                  <input type="text" class="form-control" id="bankName" placeholder="e.g., BDO, Metrobank">
                                             </div>
                                             <div class="col-md-4 mb-3">
                                                  <label for="bankBranch" class="form-label">Bank Branch</label>
                                                  <input type="text" class="form-control" id="bankBranch" placeholder="Branch location">
                                             </div>
                                             <div class="col-md-4 mb-3">
                                                  <label for="chequeNumber" class="form-label">Cheque Number</label>
                                                  <input type="text" class="form-control" id="chequeNumber" placeholder="Cheque number">
                                             </div>
                                             <div class="col-md-6 mb-3">
                                                  <label for="chequeDate" class="form-label">Cheque Date</label>
                                                  <input type="date" class="form-control" id="chequeDate">
                                             </div>
                                             </div>

                                             <!-- CNTR Deposit -->
                                             <div class="col-md-6 mb-3">
                                                  <label for="cntrDeposit" class="form-label">CNTR Deposit</label>
                                                  <input type="number" step="0.01" min="0" class="form-control" id="cntrDeposit" placeholder="e.g., 150.00">
                                             </div>

                                             <!-- CNTR Refund -->
                                             <div class="col-md-6 mb-3">
                                                  <label for="cntrRefund" class="form-label">CNTR Refund</label>
                                                  <input type="number" step="0.01" min="0" class="form-control" id="cntrRefund" placeholder="e.g., 100.00">
                                             </div>

                                             <!-- Total Amount -->
                                             <div class="col-md-6 mb-3">
                                                  <label for="totalAmount" class="form-label">Total Amount</label>
                                                  <input type="number" step="0.01" min="0" class="form-control" id="totalAmount" placeholder="e.g., 500.00" required>
                                             </div>

                                             <!-- Gcash Number -->
                                             <div class="col-md-6 mb-3">
                                                  <label for="gcashNumber" class="form-label">Gcash Number</label>
                                                  <input type="text" class="form-control" id="gcashNumber" placeholder="Enter Gcash number (if applicable)">
                                             </div>

                                             <!-- Checked By -->
                                             <div class="col-md-6 mb-3">
                                                  <label for="checkedBy" class="form-label">Checked By</label>
                                                  <input type="text" class="form-control" id="checkedBy" placeholder="Staff or Admin name">
                                             </div>

                                             <!-- Approved By -->
                                             <div class="col-md-6 mb-3">
                                                  <label for="approvedBy" class="form-label">Approved By</label>
                                                  <input type="text" class="form-control" id="approvedBy" placeholder="Manager or Supervisor name">
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
// Show/hide cheque details based on payment method selection
document.getElementById('paymentMethod').addEventListener('change', function() {
    const chequeDetails = document.getElementById('chequeDetails');
    if (this.value === 'Cheque') {
        chequeDetails.style.display = 'flex';
        // Make cheque fields required
        document.getElementById('bankName').required = true;
        document.getElementById('bankBranch').required = true;
        document.getElementById('chequeNumber').required = true;
        document.getElementById('chequeDate').required = true;
    } else {
        chequeDetails.style.display = 'none';
        // Remove required attribute if not cheque
        document.getElementById('bankName').required = false;
        document.getElementById('bankBranch').required = false;
        document.getElementById('chequeNumber').required = false;
        document.getElementById('chequeDate').required = false;
    }
    
    // Also show/hide Gcash number field based on selection
    const gcashNumberField = document.getElementById('gcashNumber').parentElement;
    if (this.value === 'Gcash') {
        gcashNumberField.style.display = 'block';
        document.getElementById('gcashNumber').required = true;
    } else {
        gcashNumberField.style.display = 'block'; // Keep it visible but not required
        document.getElementById('gcashNumber').required = false;
    }
});

// Initialize the form state on page load
document.addEventListener('DOMContentLoaded', function() {
    // Hide cheque details by default
    document.getElementById('chequeDetails').style.display = 'none';
});
</script>

</body>
</html>