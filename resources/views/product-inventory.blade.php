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
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                                <h4 class="mb-0 fw-semibold">Product Inventory</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="#" method="POST" id="inventoryForm">
                                        <div class="row">
                                            <!-- Product Selection -->
                                            <div class="col-md-6 mb-3">
                                                <label for="product" class="form-label">Product</label>
                                                <select class="form-select" id="product" required>
                                                    <option selected disabled value="">Select a product</option>
                                                    <option value="1">Styro Cup Coffee Express 8oz</option>
                                                    <option value="2">Styro Cup 8oz MP</option>
                                                    <option value="3">Styro Plate Round FC</option>
                                                </select>
                                            </div>

                                            <!-- Beginning Quantity (Readonly) -->
                                            <div class="col-md-6 mb-3">
                                                <label for="beginning_qty" class="form-label">Beginning Quantity</label>
                                                <input type="number" class="form-control" id="beginning_qty" readonly>
                                            </div>

                                            <!-- New Stock In -->
                                            <div class="col-md-6 mb-3">
                                                <label for="new_stock" class="form-label">New Stock</label>
                                                <input type="number" min="0" class="form-control" id="new_stock" placeholder="Enter quantity to add">
                                            </div>

                                            <!-- Current Quantity (Auto-calculated) -->
                                            <div class="col-md-6 mb-3">
                                                <label for="current_qty" class="form-label">Current Quantity</label>
                                                <input type="number" class="form-control" id="current_qty" readonly>
                                            </div>

                                            <!-- Submit Buttons -->
                                            <div class="col-md-12 d-flex justify-content-end gap-2 mt-4">
                                                <button type="reset" class="btn btn-light">Reset</button>
                                                <button type="submit" class="btn btn-primary">Update Stock</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Toast Notification -->
                    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999;">
                        <div id="orderSuccessToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="d-flex">
                                <div class="toast-body" id="orderToastMessage">
                                    Action completed successfully!
                                </div>
                                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
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
// Initialize Toast
var toastEl = document.getElementById('orderSuccessToast');
var toast = new bootstrap.Toast(toastEl);

// Load products when page loads
document.addEventListener('DOMContentLoaded', function() {
    fetch('/api/inventory/products')
        .then(response => response.json())
        .then(products => {
            const select = document.getElementById('product');
            
            // Clear existing options except the first one
            while (select.options.length > 1) {
                select.remove(1);
            }
            
            // Add new options
            products.forEach(product => {
                const option = new Option(product.name, product.id);
                option.setAttribute('data-beginning-qty', product.beginning_qty);
                select.add(option);
            });
        })
        .catch(error => console.error('Error loading products:', error));
});

// When product selection changes
document.getElementById('product').addEventListener('change', function() {
    const productId = this.value;
    
    if (productId) {
        // Fetch current stock from API
        fetch(`/api/inventory/stock/${productId}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('beginning_qty').value = data.beginning_qty;
                calculateCurrentQty();
            })
            .catch(error => {
                console.error('Error fetching stock:', error);
                document.getElementById('beginning_qty').value = '';
            });
    } else {
        document.getElementById('beginning_qty').value = '';
        document.getElementById('current_qty').value = '';
    }
});

// Calculate current quantity when new stock is entered
document.getElementById('new_stock').addEventListener('input', calculateCurrentQty);

function calculateCurrentQty() {
    const beginningQty = parseFloat(document.getElementById('beginning_qty').value) || 0;
    const newStock = parseFloat(document.getElementById('new_stock').value) || 0;
    document.getElementById('current_qty').value = beginningQty + newStock;
}

// Form submission handler
document.getElementById('inventoryForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const productSelect = document.getElementById('product');
    const productId = productSelect.value;
    const productName = productSelect.options[productSelect.selectedIndex].text;
    const newStock = document.getElementById('new_stock').value;
    
    if (!productId) {
        alert('Please select a product');
        return;
    }
    
    fetch('/api/inventory/update', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            product_id: productId,
            new_stock: newStock
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById('orderToastMessage').textContent = 
                `${productName} stock updated to ${data.current_qty}`;
            toast.show();
            
            // Reset form after 1 second
            setTimeout(() => {
                document.getElementById('inventoryForm').reset();
                document.getElementById('beginning_qty').value = '';
                document.getElementById('current_qty').value = '';
                
                // Update the beginning quantity in the dropdown
                const selectedOption = productSelect.options[productSelect.selectedIndex];
                selectedOption.setAttribute('data-beginning-qty', data.current_qty);
            }, 1000);
        } else {
            alert('Failed to update stock: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while updating stock');
    });
});
</script>

</body>
</html>