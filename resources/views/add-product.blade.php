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
                            <h4 class="mb-0 fw-semibold">Add Product</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                         <div class="card">
                              <div class="card-body">
                                   <form action="{{ route('products.store') }}" method="POST">
                                        @csrf

                                        <div class="row">

                                        <!-- Product Name -->
                                        <div class="col-md-6 mb-3">
                                             <label for="productName" class="form-label">Product Name</label>
                                             <input type="text" class="form-control" id="productName" name="name" placeholder="Enter product name" required>

                                        </div>

                                        <!-- Product Type (Dropdown with Others) -->
                                        <div class="col-md-6 mb-3">
                                             <label for="productType" class="form-label">Product Type</label>
                                             <select class="form-select" id="productType" name="type">

                                                  <option selected disabled>Select type</option>
                                                  <option value="Oil">Oil</option>
                                                  <option value="Bottle">Bottle</option>
                                                  <option value="Packaging">Packaging</option>
                                                  <option value="Spring">Spring</option>
                                                  <option value="Plastic">Plastic</option>
                                                  <option value="Water">Water</option>
                                                  <option value="Dishwashing Liquid">Dishwashing Liquid</option>
                                                  <option value="Styro">Styro</option>
                                                  <option value="Others">Others</option>
                                             </select>

                                             <!-- Textbox to appear when "Others" is selected -->
                                             <div class="mt-2" id="otherProductTypeContainer" style="display: none;">
                                                  <input type="text" class="form-control" id="otherProductType" name="type_other" placeholder="Enter product type">

                                             </div>
                                        </div>

                                        <!-- Product Description -->
                                        <div class="col-md-12 mb-3">
                                             <label for="productDescription" class="form-label">Product Description</label>
                                             <textarea class="form-control" id="productDescription" name="description" rows="2" placeholder="Describe the product"></textarea>

                                        </div>

                                        <!-- Select Supplier -->
                                        <div class="col-md-6 mb-3">
                                             <label for="supplier" class="form-label">Select Supplier</label>
                                             <select class="form-select" id="supplier" name="supplier_id" required>

                                                  <option selected disabled>Select supplier</option>
                                                  <option value="1">This is Sample only 1</option>
                                                  <option value="2">This is Sample only 2</option>
                                                  <option value="3">This is Sample only 3</option>
                                                  <option value="4">This is Sample only 4</option>
                                                  <option value="5">This is Sample only 5</option>
                                             </select>
                                        </div>

                                        <!-- Unit of Measure -->
                                        <div class="col-md-6 mb-3">
                                             <label for="unitOfMeasure" class="form-label">Unit Of Measure</label>
                                             <select class="form-select" id="unitOfMeasure" name="unit_of_measure">

                                                  <option selected>Select unit</option>
                                                  <option value="Kilos">Kilos</option>
                                                  <option value="Liters">Liters</option>
                                                  <option value="Boxes">Boxes</option>
                                                  <option value="Bag">Bag</option>
                                                  <option value="Ream">Ream</option>
                                                  <option value="Pack">Pack</option>
                                                  <option value="Sack">Sack</option>
                                                  <option value="Gallon">Gallon</option>
                                                  <option value="Case">Case</option>
                                                  <option value="Bundle">Bundle</option>
                                                  <option value="Pcs">Pcs</option>
                                             </select>
                                        </div>
                                        
                                        <!-- Stock Level -->
                                        <div class="col-md-6 mb-3">
                                             <label for="stockLevel" class="form-label">Stock Level</label>
                                             <input type="number" class="form-control" id="stockLevel" name="stock_level" placeholder="Current stock quantity">

                                        </div>

                                        <!-- Regular Price Per Unit -->
                                        <div class="col-md-6 mb-3">
                                             <label for="regularPricePerUnit" class="form-label">Regular Price Per Unit</label>
                                             <input type="number" step="0.01" class="form-control" id="regularPricePerUnit" name="regular_price" placeholder="e.g., 45.00" required>
                                        </div>

                                        
                                        <!-- Minimum Stock Threshold -->
                                        <div class="col-md-6 mb-3">
                                             <label for="minimumStockThreshold" class="form-label">Minimum Stock Threshold</label>
                                             <input type="number" class="form-control" id="minimumStockThreshold" name="minimum_stock_threshold" placeholder="e.g., 50">
                                        </div>

                                        <!-- Submit Buttons -->
                                        <div class="col-md-12 d-flex justify-content-end gap-2 mt-4">
                                             <button type="reset" class="btn btn-light">Reset</button>
                                             <button type="submit" class="btn btn-primary">Save Product</button>
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
    document.querySelector('form').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    // Show loading state
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalBtnText = submitBtn.innerHTML;
    submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...';
    submitBtn.disabled = true;

    try {
        const formData = new FormData(this);
        
        // Handle the case when "Others" is selected
        if (formData.get('type') === 'Others') {
            formData.set('type', formData.get('type_other'));
            if (!formData.get('type')) {
                throw new Error('Please specify the product type');
            }
        }
        formData.delete('type_other');
        
        const response = await fetch("{{ route('products.store') }}", {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: formData  // Send FormData directly
        });
        
        if (!response.ok) {
            const errorData = await response.json();
            throw new Error(errorData.message || 'Failed to create product');
        }

        // Redirect to products list
        window.location.href = "{{ route('products.index') }}";

    } catch (error) {
        console.error('Error:', error);
        alert(error.message || 'An error occurred while saving the product');
    } finally {
        // Restore button state
        submitBtn.innerHTML = originalBtnText;
        submitBtn.disabled = false;
    }
});
</script>
     

</body>
</html>
