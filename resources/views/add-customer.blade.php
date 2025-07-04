<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from techzaa.in/venton/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 May 2025 02:56:19 GMT -->
<head>
     <!-- Title Meta -->
     <meta charset="utf-8" />
     <title>Add Customer</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="Add new customer" />
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
                                   <h4 class="page-title">Add New Customer</h4>
                              </div>
                         </div>
                         </div>

                         <!-- Search Results Table -->
                         <div class="row mb-4" id="searchResultsContainer" style="display: none;">
                         <div class="col-12">
                              <div class="card">
                                   <div class="card-body">
                                        <h5 class="card-title mb-3">Search Results</h5>
                                        <div class="table-responsive">
                                             <table class="table table-centered table-striped">
                                             <thead>
                                                  <tr>
                                                       <th>Customer Name</th>
                                                       <th>Contact Info</th>
                                                       <th>Business Type</th>
                                                       <th>Contact</th>
                                                       <th>Action</th>
                                                  </tr>
                                             </thead>
                                             <tbody id="searchResults">
                                                  <!-- Search results will be inserted here -->
                                             </tbody>
                                             </table>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         </div>

                         <div class="row">
                         <div class="col-12">
                              <div class="card">
                                   <div class="card-body">
                                        <form id="addCustomerForm">
                                             <div class="row">

                                             <!-- Customer Name -->
                                             <div class="col-md-6 mb-3">
                                                  <label for="customer_name" class="form-label">Customer Name</label>
                                                  <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                                             </div>

                                             <!-- Store Name -->
                                             <div class="col-md-6 mb-3">
                                                  <label for="store_name" class="form-label">Store Name</label>
                                                  <input type="text" class="form-control" id="store_name" name="store_name" required>
                                             </div>

                                             <!-- Contact Info -->
                                             <div class="col-md-6 mb-3">
                                                  <label for="email" class="form-label">Email</label>
                                                  <input type="email" class="form-control" id="email" name="email" required>
                                             </div>

                                             <!-- Address -->
                                             <div class="col-md-6 mb-3">
                                                  <label for="address" class="form-label">Address</label>
                                                  <textarea class="form-control" id="address" name="address" rows="2"></textarea>
                                             </div>

                                             <!-- Store Address -->
                                             <div class="col-md-6 mb-3">
                                                  <label for="store_address" class="form-label">Store Address</label>
                                                  <textarea class="form-control" id="store_address" name="store_address" rows="2" required></textarea>
                                             </div>

                                             <!-- Warehouse Address -->
                                             <div class="col-md-6 mb-3">
                                                  <label for="warehouse_address" class="form-label">Warehouse Address</label>
                                                  <textarea class="form-control" id="warehouse_address" name="warehouse_address" rows="2"></textarea>
                                             </div>

                                             <!-- Business Type -->
                                             <div class="col-md-6 mb-3">
                                                  <label for="businessType" class="form-label">Business Type</label>
                                                  <select class="form-select" id="businessType" name="businessType" required>
                                                       <option value="">Select Business Type</option>
                                                       <option value="Sari-sari Store">Sari-sari Store</option>
                                                       <option value="Palengke/Market Vendor">Palengke/Market Vendor</option>
                                                       <option value="Grocery Store">Grocery Store</option>
                                                       <option value="Convenience Store">Convenience Store</option>
                                                       <option value="Wholesaler">Wholesaler</option>
                                                       <option value="Distributor">Distributor</option>
                                                       <option value="Restaurant">Restaurant</option>
                                                       <option value="Catering Service">Catering Service</option>
                                                       <option value="Mini Mart">Mini Mart</option>
                                                       <option value="Department Store">Department Store</option>
                                                       <option value="Pharmacy/Drug Store">Pharmacy/Drug Store</option>
                                                       <option value="Others">Others</option>
                                                  </select>
                                             </div>

                                             <!-- Other Business Type (Hidden by default) -->
                                             <div class="col-md-6 mb-3" id="otherBusinessTypeContainer" style="display: none;">
                                                  <label for="otherBusinessType" class="form-label">Specify Other Business Type</label>
                                                  <input type="text" class="form-control" id="otherBusinessType" name="otherBusinessType">
                                             </div>

                                             <!-- Contact -->
                                             <div class="col-md-6 mb-3">
                                                  <label for="contact_person" class="form-label">Contact Person</label>
                                                  <input type="text" class="form-control" id="contact_person" name="contact_person" required>
                                             </div>

                                             <!-- Birthday (Optional) -->
                                             <div class="col-md-6 mb-3">
                                                  <label for="birthday" class="form-label">Birthday</label>
                                                  <input type="date" class="form-control" id="birthday" name="birthday">
                                             </div>

                                             <!-- Payment Terms -->
                                             <div class="col-md-6 mb-3">
                                                  <label for="payment_terms" class="form-label">Payment Terms</label>
                                                  <select class="form-select" id="payment_terms" name="payment_terms">
                                                       <option value="">Select Payment Terms</option>
                                                       <option value="COD">Cash on Delivery (COD)</option>
                                                       <option value="Net 15">Net 15 Days</option>
                                                       <option value="Net 30">Net 30 Days</option>
                                                       <option value="Net 45">Net 45 Days</option>
                                                       <option value="Net 60">Net 60 Days</option>
                                                       <option value="Advance Payment">Advance Payment</option>
                                                       <option value="Monthly">Monthly</option>
                                                       <option value="Quarterly">Quarterly</option>
                                                  </select>
                                             </div>

                                                <div class="row mt-3">
                                                    <div class="col-12">
                                                       <h5 class="mb-3">Bank Account Information</h5>
                                              </div>
    
    <!-- Primary Bank Account (Left Column) -->
                                               <div class="col-md-6">
                                                     <div class="card mb-3">
                                                               <div class="card-header bg-light">
                                                                    <h6 class="mb-0">Primary Bank Account (Required)</h6>
                                               </div>
                                               <div class="card-body">
                                                         <div class="mb-3">
                                                               <label for="account_name_1" class="form-label">Account Name</label>
                                                                <input type="text" class="form-control" id="account_name_1" name="account_name_1" required>
                                               </div>
                                                <div class="mb-3">
                                                               <label for="bank_account_1" class="form-label">Account Number</label>
                                                               <input type="text" class="form-control" id="bank_account_1" name="bank_account_1" required>
                                                </div>
                                               <div class="mb-3">
                                                              <label for="bank_branch_1" class="form-label">Bank Branch</label>
                                                             <input type="text" class="form-control" id="bank_branch_1" name="bank_branch_1" required>
                                               </div>
                                         </div>
                                   </div>
                            </div>
    
    <!-- Secondary Bank Account (Right Column) -->
                                              <div class="col-md-6">
                                                     <div class="card mb-3">
                                                         <div class="card-header bg-light">
                                                      <h6 class="mb-0">Secondary Bank Account (Optional)</h6>
                                              </div>
                                             <div class="card-body">
                                                        <div class="mb-3">
                                                               <label for="account_name_2" class="form-label">Account Name</label>
                                                               <input type="text" class="form-control" id="account_name_2" name="account_name_2">
                                             </div>
                                              <div class="mb-3">
                                                    <label for="bank_account_2" class="form-label">Account Number</label>
                                                    <input type="text" class="form-control" id="bank_account_2" name="bank_account_2">
                                              </div>
                                             <div class="mb-3">
                                                    <label for="bank_branch_2" class="form-label">Bank Branch</label>
                                                    <input type="text" class="form-control" id="bank_branch_2" name="bank_branch_2">
                                              </div>
                                     </div>
                               </div>
                         </div>
                       </div>

                                             <!-- Submit Buttons -->
                                             <div class="col-md-12 d-flex justify-content-end gap-2 mt-4">
                                                  <button type="button" class="btn btn-secondary me-1" onclick="window.location.href='{{ url('/customer-list') }}'">Cancel</button>
                                                  <button type="submit" class="btn btn-primary">Save Customer</button>
                                             </div>
                                             </div>
                                        </form>
                                   </div>
                              </div>
                         </div>
                         </div>
                <!-- Toast Notification -->
                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999;">
                    <div id="toast" class="toast align-items-center text-white border-0" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body" id="toastMessage"></div>
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
    <script>
        // Sample customer data (replace with your actual data source)
     //    const customers = [
     //        { id: 1, name: 'John Doe', contact_info: 'john@example.com', business_type: 'Super Market', contact: '123-456-7890' },
     //        { id: 2, name: 'Jane Smith', contact_info: 'jane@example.com', business_type: 'Grocery', contact: '098-765-4321' },
     //        // Add more sample data as needed
     //    ];
   
   document.addEventListener('DOMContentLoaded', function() {
    // Initialize toast first
    const toastEl = document.getElementById('toast');
    const toast = new bootstrap.Toast(toastEl);
    
    // Handle Business Type "Others" option
    const businessTypeSelect = document.getElementById('businessType');
    const otherContainer = document.getElementById('otherBusinessTypeContainer');
    const otherInput = document.getElementById('otherBusinessType');

    businessTypeSelect.addEventListener('change', function() {
        if (this.value === 'Others') {
            otherContainer.style.display = 'block';
            otherInput.setAttribute('required', 'required');
        } else {
            otherContainer.style.display = 'none';
            otherInput.removeAttribute('required');
        }
    });

    document.getElementById('addCustomerForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        
        // Get the final business type value
        let finalBusinessType = businessTypeSelect.value;
        if (finalBusinessType === 'Others') {
            finalBusinessType = otherInput.value;
        }
        
        const formData = {
            customer_name: document.getElementById('customer_name').value,
            store_name: document.getElementById('store_name').value,
            email: document.getElementById('email').value,
            address: document.getElementById('address').value,
            store_address: document.getElementById('store_address').value,
            warehouse_address: document.getElementById('warehouse_address').value,
            businessType: finalBusinessType,
            contact_person: document.getElementById('contact_person').value,
            birthday: document.getElementById('birthday').value,
            payment_terms: document.getElementById('payment_terms').value
        };
        
        // Debug: Log the data being sent
        console.log('Form data being sent:', formData);
        
        // Prepare headers
        const headers = {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        };
        
        // Only add CSRF token if it exists
        const csrfToken = document.querySelector('meta[name="csrf-token"]');
        if (csrfToken && csrfToken.content) {
            headers['X-CSRF-TOKEN'] = csrfToken.content;
        }
        
        console.log('Request headers:', headers);
        console.log('Request URL:', this.action);
        
        try {
            const response = await fetch(this.action, {
                method: 'POST',
                headers: headers,
                body: JSON.stringify(formData)
            });

            const result = await response.json();

            if (response.ok) {
                // Show success message
                toastEl.classList.remove('bg-danger'); // Remove any previous error class
                toastEl.classList.add('bg-success');
                document.getElementById('toastMessage').textContent = result.message || 'Customer saved successfully!';
                toast.show();
                
                // Reset form
                this.reset();
                document.getElementById('otherBusinessTypeContainer').style.display = 'none';
                
                // Redirect to customer list after 2 seconds
                setTimeout(() => {
                    window.location.href = '{{ url("/customer-list") }}';
                }, 2000);
            } else {
                throw new Error(result.message || 'Failed to save customer');
            }
        } catch (error) {
            console.error('Error details:', error);
            toastEl.classList.remove('bg-success'); // Remove any previous success class
            toastEl.classList.add('bg-danger');
            document.getElementById('toastMessage').textContent = error.message || 'An error occurred while saving the customer';
            toast.show();
        }
    });

    // Search functionality (keep this if needed)
    const searchInput = document.getElementById('searchInput');
    const searchBtn = document.getElementById('searchBtn');
    const searchResults = document.getElementById('searchResults');
    const searchResultsContainer = document.getElementById('searchResultsContainer');

    function performSearch() {
        // Your search implementation
    }

    // Event listeners for search
    if (searchBtn) {
        searchBtn.addEventListener('click', performSearch);
    }
    if (searchInput) {
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                performSearch();
            }
        });
    }
});
    </script>
</body>
</html>