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
                            <h4 class="mb-0 fw-semibold">Add Expenses</h4>
                            <ol class="breadcrumb mb-0">
                            </ol>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="#" method="POST">
                                    <div class="row">
                                        <!-- Date -->
                                        <div class="col-md-3 mb-3">
                                            <label for="expenseDate" class="form-label">Date</label>
                                            <input type="date" class="form-control" id="expenseDate" required>
                                        </div>

                                        <!-- Expense Category Dropdown -->
                                        <div class="col-md-3 mb-3">
                                            <label for="expenseCategory" class="form-label">Expense Category</label>
                                            <select class="form-select" id="expenseCategory" required>
                                                <option value="" selected disabled>Select category</option>
                                                <option value="bldg_improv">Building Improvement</option>
                                                <option value="fb_ads">Facebook Ads</option>
                                                <option value="gas">Gas</option>
                                                <option value="labor_charge">Labor Charges</option>
                                                <option value="ofc_equip">Office Equipment</option>
                                                <option value="ovrhead">Overhead</option>
                                                <option value="salary">Salaries</option>
                                                <option value="truck_maint">Truck Maintenance/Repair</option>
                                                <option value="office_supplies">Office Supplies</option>
                                                <option value="utilities">Electric and Water Bills</option>
                                            </select>
                                        </div>

                                        <!-- Truck/Gas Indicator -->
                                        <div class="col-md-3 mb-3">
                                            <label for="truckGas" class="form-label">Truck Related?</label>
                                            <select class="form-select" id="truckGas">
                                                <option value="no">No</option>
                                                <option value="yes">Yes</option>
                                            </select>
                                        </div>

                                        <!-- Payment Terms -->
                                        <div class="col-md-3 mb-3">
                                            <label for="paymentTerms" class="form-label">Payment Terms</label>
                                            <select class="form-select" id="paymentTerms">
                                                <option value="full">Full Payment</option>
                                                <option value="partial">Partial Payment</option>
                                                <option value="credit">Credit</option>
                                            </select>
                                        </div>

                                        <!-- Amount -->
                                        <div class="col-md-4 mb-3">
                                            <label for="amount" class="form-label">Amount (₱)</label>
                                            <input type="number" class="form-control" id="amount" placeholder="0.00" step="0.01" min="0" required>
                                        </div>

                                        <!-- Balance (for partial/credit payments) -->
                                        <div class="col-md-4 mb-3">
                                            <label for="balance" class="form-label">Balance (₱)</label>
                                            <input type="number" class="form-control" id="balance" placeholder="0.00" step="0.01" min="0">
                                        </div>

                                        <!-- Approved By -->
                                        <div class="col-md-4 mb-3">
                                            <label for="approvedBy" class="form-label">Approved By</label>
                                            <input type="text" class="form-control" id="approvedBy" placeholder="Approver's name">
                                        </div>

                                        <!-- Particulars (Long Text) -->
                                        <div class="col-12 mb-3">
                                            <label for="particulars" class="form-label">Particulars</label>
                                            <textarea class="form-control" id="particulars" rows="3" placeholder="Detailed description of the expense" required></textarea>
                                        </div>

                                        <!-- Supporting Documents -->
                                        <div class="col-12 mb-3">
                                            <label for="supportingDocs" class="form-label">Supporting Documents</label>
                                            <input type="file" class="form-control" id="supportingDocs" multiple>
                                            <small class="text-muted">Upload receipts or other supporting documents</small>
                                        </div>

                                        <!-- Submit Buttons -->
                                        <div class="col-md-12 d-flex justify-content-end gap-2 mt-4">
                                            <button type="reset" class="btn btn-light">Reset</button>
                                            <button type="submit" class="btn btn-primary">Save Expense</button>
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
document.addEventListener('DOMContentLoaded', function() {
    // Show/hide balance field based on payment terms
    const paymentTerms = document.getElementById('paymentTerms');
    const balanceField = document.getElementById('balance').parentElement;
    
    paymentTerms.addEventListener('change', function() {
        if (this.value === 'full') {
            balanceField.style.display = 'none';
            document.getElementById('balance').value = '0';
        } else {
            balanceField.style.display = 'block';
        }
    });
    
    // Initialize based on default value
    if (paymentTerms.value === 'full') {
        balanceField.style.display = 'none';
    }
});
</script>

</body>
</html>