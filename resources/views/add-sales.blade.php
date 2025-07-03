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
                                   <h4 class="mb-0 fw-semibold">Add Sales Order </h4>
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
                                             <!-- Date and Customer Information -->
                                             <div class="col-md-6 mb-3">
                                             <label for="date" class="form-label">Date</label>
                                             <input type="date" class="form-control" id="date" required>
                                             </div>
                                             
                                             
                                             <div class="col-md-6 mb-3">
                                             <label for="customerName" class="form-label">Customer Name</label>
                                             <div class="input-group">
                                                  <select class="form-select" id="customerName" required>
                                                       <option selected disabled value="">Select customer</option>
                                                       <option value="1">Customer 1</option>
                                                       <option value="2">Customer 2</option>
                                                       <option value="3">Customer 3</option>
                                                       <option value="4">Customer 4</option>
                                                       <option value="5">Customer 5</option>
                                                  </select>
                                             </div>
                                             </div>
                                             
                                             <div class="col-md-6 mb-3">
                                             <label for="customerAddress" class="form-label">Address</label>
                                             <input type="text" class="form-control" id="customerAddress" placeholder="Enter customer address" required>
                                             </div>
                                             
                                             <!-- Area Field (changed from select to text input) -->
                                             <div class="col-md-6 mb-3">
                                             <label for="area" class="form-label">Area</label>
                                             <input type="text" class="form-control" id="area" placeholder="Enter area" required>
                                             </div>
                                             
                                             <!-- Product List Section -->
                                             <div class="col-md-12 mb-3">
                                             <label class="form-label">Products</label>
                                             <div id="productContainer">
                                                  <!-- Product rows will be added here -->
                                                  <div class="product-row row mb-3">
                                                       <div class="col-md-5">
                                                            <select class="form-select product-select" required>
                                                            <option selected disabled value="">Select product</option>
                                                            <option value="1" data-price="100.00">Engine Oil (₱100.00)</option>
                                                            <option value="2" data-price="150.00">Brake Fluid (₱150.00)</option>
                                                            <option value="3" data-price="200.00">Transmission Oil (₱200.00)</option>
                                                            <option value="4" data-price="75.00">Coolant (₱75.00)</option>
                                                            <option value="5" data-price="250.00">Power Steering Fluid (₱250.00)</option>
                                                            </select>
                                                       </div>
                                                       <div class="col-md-2">
                                                            <input type="number" class="form-control quantity" placeholder="Qty" min="1" value="1" required>
                                                       </div>
                                                       <div class="col-md-2">
                                                            <select class="form-select unit">
                                                            <option selected>Select unit</option>
                                                            <option value="Kilos">Kilos</option>
                                                            <option value="Liters">Liters</option>
                                                            <option value="Boxes">Boxes</option>
                                                            <option value="Bag">Bag</option>
                                                            <option value="Ream">Ream</option>
                                                            <option value="Pack">Pack</option>
                                                            <option value="Sack">Sack</option>
                                                            </select>
                                                       </div>
                                                       <div class="col-md-2">
                                                            <input type="number" class="form-control price" placeholder="Price" step="0.01" min="0" required>
                                                       </div>
                                                       <div class="col-md-1">
                                                            <button type="button" class="btn btn-danger remove-product" disabled>
                                                            <i class="bx bx-trash"></i>
                                                            </button>
                                                       </div>
                                                  </div>
                                             </div>
                                             <button type="button" id="addProduct" class="btn btn-sm btn-primary mt-2">
                                                  <i class="bx bx-plus"></i> Add Product
                                             </button>
                                             </div>
                                             
                                             <!-- Pricing Summary -->
                                             <div class="col-md-4 mb-3">
                                             <label for="totalPrice" class="form-label">Total Price (₱)</label>
                                             <input type="number" class="form-control" id="totalPrice" placeholder="0.00" step="0.01" min="0" readonly>
                                             </div>
                                             
                                             <!-- Terms and Payment Method -->
                                             <div class="col-md-4 mb-3">
                                             <label for="terms" class="form-label">Terms</label>
                                             <select class="form-select" id="terms" required>
                                                  <option value="" selected disabled>Select payment terms</option>
                                                  <option value="Cash">Cash</option>
                                                  <option value="7 Days">7 Days</option>
                                                  <option value="15 Days">15 Days</option>
                                                  <option value="30 Days">30 Days</option>
                                                  <option value="60 Days">60 Days</option>
                                                  <option value="COD">COD</option>
                                             </select>
                                             </div>
                                             
                                             <div class="col-md-4 mb-3">
                                             <label for="via" class="form-label">Via</label>
                                             <select class="form-select" id="via">
                                                  <option value="" selected disabled>Select delivery method</option>
                                                  <option value="Pickup">Pickup</option>
                                                  <option value="Delivery">Delivery</option>
                                                  <option value="Courier">Courier</option>
                                             </select>
                                             </div>
                                             
                                             <!-- Delivery Information -->
                                             <div class="col-md-6 mb-3">
                                             <label for="deliveryDate" class="form-label">Delivery Date</label>
                                             <input type="date" class="form-control" id="deliveryDate">
                                             </div>
                                             
                                             <!-- Remarks -->
                                             <div class="col-md-12 mb-3">
                                             <label for="remarks" class="form-label">Remarks</label>
                                             <textarea class="form-control" id="remarks" rows="2" placeholder="Enter any remarks"></textarea>
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
    <script>
document.addEventListener('DOMContentLoaded', function() {
    const productContainer = document.getElementById('productContainer');
    const addProductBtn = document.getElementById('addProduct');
    const totalPriceInput = document.getElementById('totalPrice');
    
    // Add new product row
    addProductBtn.addEventListener('click', function() {
        const newRow = document.createElement('div');
        newRow.className = 'product-row row mb-3';
        newRow.innerHTML = `
            <div class="col-md-5">
                <select class="form-select product-select" required>
                    <option selected disabled value="">Select product</option>
                    <option value="1" data-price="100.00">Engine Oil (₱100.00)</option>
                    <option value="2" data-price="150.00">Brake Fluid (₱150.00)</option>
                    <option value="3" data-price="200.00">Transmission Oil (₱200.00)</option>
                    <option value="4" data-price="75.00">Coolant (₱75.00)</option>
                    <option value="5" data-price="250.00">Power Steering Fluid (₱250.00)</option>
                </select>
            </div>
            <div class="col-md-2">
                <input type="number" class="form-control quantity" placeholder="Qty" min="1" value="1" required>
            </div>
            <div class="col-md-2">
                <select class="form-select unit">
                    <option value="pcs">pcs</option>
                    <option value="kg">kg</option>
                    <option value="l">l</option>
                    <option value="box">box</option>
                </select>
            </div>
            <div class="col-md-2">
                <input type="number" class="form-control price" placeholder="Price" step="0.01" min="0" required>
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-danger remove-product">
                    <i class="bx bx-trash"></i>
                </button>
            </div>
        `;
        productContainer.appendChild(newRow);
        
        // Enable remove buttons when there's more than one row
        updateRemoveButtons();
        
        // Add event listeners to new row
        addProductRowListeners(newRow);
    });
    
    // Function to add event listeners to a product row
    function addProductRowListeners(row) {
        const productSelect = row.querySelector('.product-select');
        const quantityInput = row.querySelector('.quantity');
        const priceInput = row.querySelector('.price');
        
        // Update price when product is selected
        productSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const productPrice = selectedOption.getAttribute('data-price');
            if (productPrice) {
                priceInput.value = productPrice;
                calculateTotal();
            }
        });
        
        quantityInput.addEventListener('input', calculateTotal);
        priceInput.addEventListener('input', calculateTotal);
        
        row.querySelector('.remove-product').addEventListener('click', function() {
            row.remove();
            calculateTotal();
            updateRemoveButtons();
        });
    }
    
    // Calculate total price
    function calculateTotal() {
        let total = 0;
        document.querySelectorAll('.product-row').forEach(row => {
            const quantity = parseFloat(row.querySelector('.quantity').value) || 0;
            const price = parseFloat(row.querySelector('.price').value) || 0;
            total += quantity * price;
        });
        totalPriceInput.value = total.toFixed(2);
    }
    
    // Enable/disable remove buttons
    function updateRemoveButtons() {
        const rows = document.querySelectorAll('.product-row');
        const removeButtons = document.querySelectorAll('.remove-product');
        
        if (rows.length > 1) {
            removeButtons.forEach(btn => btn.disabled = false);
        } else {
            removeButtons.forEach(btn => btn.disabled = true);
        }
    }
    
    // Add listeners to initial row
    addProductRowListeners(document.querySelector('.product-row'));
});
</script>
     

</body>
</html>