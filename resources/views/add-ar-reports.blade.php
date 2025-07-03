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
                            <h4 class="mb-0 fw-semibold">Add AR Reports</h4>
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
                                        <!-- Delivery Information -->
                                        <div class="col-md-6 mb-3">
                                            <label for="deliveryDate" class="form-label">Delivery Date</label>
                                            <input type="date" class="form-control" id="deliveryDate" required>
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="customerName" class="form-label">Customer Name</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="customerName" placeholder="Enter customer name" required>
                                                <button class="btn btn-outline-secondary" type="button" id="customerSearchBtn">
                                                    <i class="bx bx-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                        
                                        <!-- Item Details -->
                                        <div class="col-md-12 mb-3">
                                            <label for="itemDescription" class="form-label">Item Description</label>
                                            <textarea class="form-control" id="itemDescription" rows="2" placeholder="Enter item details" required></textarea>
                                        </div>
                                        
                                        <!-- Payment Terms -->
                                        <div class="col-md-4 mb-3">
                                            <label for="paymentTerms" class="form-label">Payment Terms</label>
                                            <select class="form-select" id="paymentTerms" required>
                                                <option value="" selected disabled>Select payment terms</option>
                                                <option value="Cash">Cash</option>
                                                <option value="7 Days">7 Days</option>
                                                <option value="15 Days">15 Days</option>
                                                <option value="30 Days">30 Days</option>
                                                <option value="60 Days">60 Days</option>
                                                <option value="COD">COD</option>
                                            </select>
                                        </div>
                                        
                                        <!-- Financial Information -->
                                        <div class="col-md-4 mb-3">
                                            <label for="totalBill" class="form-label">Total Bill (₱)</label>
                                            <input type="number" class="form-control" id="totalBill" placeholder="0.00" step="0.01" min="0" required>
                                        </div>
                                        
                                        <div class="col-md-4 mb-3">
                                            <label for="dueDate" class="form-label">Due Date</label>
                                            <input type="date" class="form-control" id="dueDate">
                                        </div>
                                        
                                        <!-- DR Number -->
                                        <div class="col-md-6 mb-3">
                                            <label for="drNumber" class="form-label">DR Number</label>
                                            <input type="text" class="form-control" id="drNumber" placeholder="Enter DR number" required>
                                        </div>
                                        
                                        <!-- Payment Information -->
                                        <div class="col-md-6 mb-3">
                                            <label for="datePaid" class="form-label">Date Paid</label>
                                            <input type="date" class="form-control" id="datePaid">
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="amountPaid" class="form-label">Amount Paid (₱)</label>
                                            <input type="number" class="form-control" id="amountPaid" placeholder="0.00" step="0.01" min="0">
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="paymentMethod" class="form-label">Payment Method</label>
                                            <select class="form-select" id="paymentMethod">
                                                <option value="" selected disabled>Select payment method</option>
                                                <option value="Cash">Cash</option>
                                                <option value="Check">Check</option>
                                                <option value="Bank Transfer">Bank Transfer</option>
                                                <option value="GCash">GCash</option>
                                                <option value="Credit Card">Credit Card</option>
                                            </select>
                                        </div>
                                        
                                        <!-- Check Details (shown only when payment method is Check) -->
                                        <div class="col-md-6 mb-3" id="checkDetailsGroup" style="display: none;">
                                            <label for="checkNumber" class="form-label">Check Number</label>
                                            <input type="text" class="form-control" id="checkNumber" placeholder="Enter check number">
                                        </div>
                                        
                                        <div class="col-md-6 mb-3" id="checkDateGroup" style="display: none;">
                                            <label for="checkDate" class="form-label">Check Date</label>
                                            <input type="date" class="form-control" id="checkDate">
                                        </div>
                                        
                                        <!-- Bank Details (shown only when payment method is Bank Transfer or Check) -->
                                        <div class="col-md-12 mb-3" id="bankDetailsGroup" style="display: none;">
                                            <label for="bankName" class="form-label">Bank Name</label>
                                            <input type="text" class="form-control" id="bankName" placeholder="Enter bank name">
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
// Show/hide check and bank details based on payment method selection
    document.getElementById('paymentMethod').addEventListener('change', function() {
        const paymentMethod = this.value;
        const checkDetailsGroup = document.getElementById('checkDetailsGroup');
        const checkDateGroup = document.getElementById('checkDateGroup');
        const bankDetailsGroup = document.getElementById('bankDetailsGroup');
        
        if (paymentMethod === 'Check') {
            checkDetailsGroup.style.display = 'block';
            checkDateGroup.style.display = 'block';
            bankDetailsGroup.style.display = 'block';
        } else if (paymentMethod === 'Bank Transfer') {
            checkDetailsGroup.style.display = 'none';
            checkDateGroup.style.display = 'none';
            bankDetailsGroup.style.display = 'block';
        } else {
            checkDetailsGroup.style.display = 'none';
            checkDateGroup.style.display = 'none';
            bankDetailsGroup.style.display = 'none';
        }
    });

    // Auto-fill due date based on payment terms and delivery date
    document.getElementById('paymentTerms').addEventListener('change', function() {
        const deliveryDate = document.getElementById('deliveryDate').value;
        if (!deliveryDate) return;
        
        const deliveryDateObj = new Date(deliveryDate);
        const terms = this.value;
        
        if (terms.includes('Days')) {
            const days = parseInt(terms);
            deliveryDateObj.setDate(deliveryDateObj.getDate() + days);
            document.getElementById('dueDate').valueAsDate = deliveryDateObj;
        } else if (terms === 'COD') {
            document.getElementById('dueDate').valueAsDate = deliveryDateObj;
        }
    });
    </script>

</body>
</html>