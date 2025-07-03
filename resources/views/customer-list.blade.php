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
                            <h4 class="mb-0 fw-semibold">Customer List</h4>
                            <input type="text" id="customSearchInput" class="form-control w-25 ms-auto" placeholder="Search suppliers...">
                            <button class="btn btn-primary" id="customSearchBtn">Search</button>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                         <div class="card">
                              <div class="card-header">
                                   <div class="row align-items-center">
                                        <div class="col-md-6 d-flex align-items-center gap-2">
                                        <label for="entriesSelect" class="mb-0">Show</label>
                                        <select id="entriesSelect" class="form-select form-select-sm w-auto">
                                             <option value="10" selected>10</option>
                                             <option value="25">25</option>
                                             <option value="50">50</option>
                                             <option value="100">100</option>
                                        </select>
                                        <span class="ms-2">entries</span>
                                        </div>
                                        <div class="col-md-6 d-flex justify-content-end">
                                        <a href="{{ route('add.customer') }}" class="btn btn-primary" id="addNewCustomerBtn">
                                             <i class='bx bx-plus'></i> Add New Customer
                                        </a>
                                        </div>
                                   </div>
                              </div>
                              <div class="card-body">
                                   <div class="table-responsive">
                                        <table class="table table-centered table-striped dt-responsive nowrap w-100" id="datatable">
                                        <thead>
                                             <tr>
                                                  <th>ID</th>
                                                  <th>Customer Name</th>
                                                  <th>Store Name</th>
                                                  <th>Email</th>
                                                  <th>Address</th>
                                                  <th>Store Address</th>
                                                  <th>Warehouse Address</th>
                                                  <th>Business Type</th>
                                                  <th>Contact Person</th>
                                                  <th style="width: 100px;">Action</th>
                                             </tr>
                                        </thead>
                                        <tbody id="table-body">
                                             <!-- Data will be injected by JavaScript -->
                                        </tbody>
                                        </table>
                                        <div id="loading-spinner" class="d-none text-center mt-3">
                                        <div class="spinner-border text-primary" role="status">
                                             <span class="visually-hidden">Loading...</span>
                                        </div>
                                        <p class="mt-2">Loading data, please wait...</p>
                                        </div>
                                        <nav aria-label="Page navigation">
                                        <ul class="pagination justify-content-center mt-3" id="pagination">
                                             <!-- Buttons will be injected by JS -->
                                        </ul>
                                        </nav>
                                   </div>
                              </div>
                         </div>
                    </div>
                    </div>

                    <!-- View Modal -->
                    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                         <div class="modal-content">
                              <div class="modal-header">
                                   <h5 class="modal-title" id="viewModalLabel">Customer Details</h5>
                                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                   <div class="mb-3">
                                        <strong>Birthday:</strong>
                                        <p id="viewBirthday" class="text-muted">Not specified</p>
                                   </div>
                                   <div class="mb-3">
                                        <strong>Address:</strong>
                                        <p id="viewAddress" class="text-muted"></p>
                                   </div>
                                   <div class="mb-3">
                                        <strong>Warehouse Address:</strong>
                                        <p id="viewWarehouseAddress" class="text-muted"></p>
                                   </div>
                              </div>
                              <div class="modal-footer">
                                   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              </div>
                         </div>
                    </div>
                    </div>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                         <div class="modal-content">
                              <div class="modal-header">
                                   <h5 class="modal-title" id="editModalLabel">Edit Customer</h5>
                                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                   <form id="editCustomerForm">
                                        <input type="hidden" id="editCustomerId">
                                        <div class="row mb-3">
                                             <div class="col-md-6">
                                                  <label for="editCustomerName" class="form-label">Customer Name</label>
                                                  <input type="text" class="form-control" id="editCustomerName" required>
                                             </div>
                                             <div class="col-md-6">
                                                  <label for="editStoreName" class="form-label">Store Name</label>
                                                  <input type="text" class="form-control" id="editStoreName" required>
                                             </div>
                                        </div>
                                        <div class="row mb-3">
                                             <div class="col-md-6">
                                                  <label for="editContactInfo" class="form-label">Email</label>
                                                  <input type="email" class="form-control" id="editContactInfo" required>
                                             </div>
                                             <div class="col-md-6">
                                                  <label for="editBusinessType" class="form-label">Business Type</label>
                                                  <select class="form-select" id="editBusinessType" required onchange="toggleOtherBusinessType('edit')">
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
                                        </div>
                                        <div class="row mb-3" id="editOtherBusinessTypeContainer" style="display: none;">
                                             <div class="col-md-12">
                                                  <label for="editOtherBusinessType" class="form-label">Other Business Type</label>
                                                  <input type="text" class="form-control" id="editOtherBusinessType">
                                             </div>
                                        </div>
                                        <div class="row">
                                             <div class="col-md-6 mb-3">
                                                  <label for="editStoreAddress" class="form-label">Store Address</label>
                                                  <input type="text" class="form-control" id="editStoreAddress" required>
                                             </div>
                                             <div class="col-md-6 mb-3">
                                                  <label for="editContact" class="form-label">Contact Person</label>
                                                  <input type="text" class="form-control" id="editContact" required>
                                             </div>
                                        </div>
                                        <div class="row">
                                             <div class="col-md-6 mb-3">
                                                  <label for="editPaymentTerms" class="form-label">Payment Terms</label>
                                                  <select class="form-select" id="editPaymentTerms" required>
                                                       <option value="">Select Payment Terms</option>
                                                       <option value="COD">COD</option>
                                                       <option value="Net 15 Days">Net 15 Days</option>
                                                       <option value="Net 30 Days">Net 30 Days</option>
                                                       <option value="Net 45 Days">Net 45 Days</option>
                                                       <option value="Net 60 Days">Net 60 Days</option>
                                                       <option value="Advance Payment">Advance Payment</option>
                                                       <option value="Monthly">Monthly</option>
                                                       <option value="Quarterly">Quarterly</option>
                                                  </select>
                                             </div>
                                             <div class="col-md-6 mb-3">
                                                  <label for="editBirthday" class="form-label">Birthday</label>
                                                  <input type="date" class="form-control" id="editBirthday">
                                             </div>
                                        </div>
                                        <div class="row">
                                             <div class="col-md-6 mb-3">
                                                  <label for="editAddress" class="form-label">Address</label>
                                                  <input type="text" class="form-control" id="editAddress">
                                             </div>
                                             <div class="col-md-6 mb-3">
                                                  <label for="editWarehouseAddress" class="form-label">Warehouse Address</label>
                                                  <input type="text" class="form-control" id="editWarehouseAddress">
                                             </div>
                                        </div>
                                   </form>
                              </div>
                              <div class="modal-footer">
                                   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                   <button type="button" class="btn btn-primary" id="saveEditBtn">Save Changes</button>
                              </div>
                         </div>
                    </div>
                    </div>

                    <!-- Delete Modal -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                         <div class="modal-content">
                              <div class="modal-header">
                                   <h5 class="modal-title" id="deleteModalLabel">Delete Customer</h5>
                                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                   Are you sure you want to delete <strong id="deleteCustomerName"></strong>?
                                   <p class="text-danger mt-2">This action cannot be undone.</p>
                              </div>
                              <div class="modal-footer">
                                   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                   <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
                              </div>
                         </div>
                    </div>
                    </div>

                    <!-- Toast Notification -->
                    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999;">
                    <div id="successToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
                         <div class="d-flex">
                              <div class="toast-body" id="toastMessage">
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

    <script src="{{ asset('venton/assets/js/vendor.js') }}"></script>
    <script src="{{ asset('venton/assets/js/app.js') }}"></script>
    <script src="{{ asset('venton/assets/vendor/jsvectormap/js/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('venton/assets/vendor/jsvectormap/maps/world-merc.js') }}"></script>
    <script src="{{ asset('venton/assets/vendor/jsvectormap/maps/world-merc.js') }}"></script>
    <script src="{{ asset('venton/assets/vendor/jsvectormap/maps/world.js') }}"></script>
    <script src="{{ asset('venton/assets/js/pages/dashboard.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize required variables
            const rowsPerPageElement = document.getElementById("entriesSelect");
            let rowsPerPage = parseInt(rowsPerPageElement.value);
            const totalRows = 100;
            const maxVisiblePages = 5;
            const tbody = document.getElementById("table-body");
            const paginationContainer = document.getElementById("pagination");
            const loadingSpinner = document.getElementById("loading-spinner");

            let originalData = [];
            let currentPage = 1;
            let currentFilter = "";

            // Fetch customers from your API
            async function fetchCustomers() {
                try {
                    loadingSpinner.classList.remove("d-none");
                    tbody.innerHTML = "";
                    
                    const response = await fetch('/api/customers', {
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        }
                    });

                    const data = await response.json();
                    
                    if (data.status === 'success') {
                        originalData = data.data;
                        showPage(1);
                    } else {
                        throw new Error(data.message || 'Failed to fetch customers');
                    }
                } catch (error) {
                    console.error('Error fetching customers:', error);
                    tbody.innerHTML = `
                        <tr>
                            <td colspan="10" class="text-center text-danger">
                                Error loading customers: ${error.message}
                            </td>
                        </tr>
                    `;
                } finally {
                    loadingSpinner.classList.add("d-none");
                }
            }

            // Display table data
            function showPage(page, filter = "") {
                tbody.innerHTML = "";
                loadingSpinner.classList.remove("d-none");
                currentPage = page;
                currentFilter = filter;

                setTimeout(() => {
                    const filteredData = filter
                        ? originalData.filter(row => 
                            Object.values(row).some(val =>
                                val && val.toString().toLowerCase().includes(filter.toLowerCase())
                            ))
                        : originalData;

                    const totalPages = Math.ceil(filteredData.length / rowsPerPage);
                    const start = (page - 1) * rowsPerPage;
                    const end = Math.min(start + rowsPerPage, filteredData.length);

                    if (filteredData.length === 0) {
                        const tr = document.createElement("tr");
                        tr.innerHTML = `<td colspan="10" class="text-center">No matching records found</td>`;
                        tbody.appendChild(tr);
                    } else {
                        for (let i = start; i < end; i++) {
                            const row = filteredData[i];
                            const tr = document.createElement("tr");
                            tr.innerHTML = `
                                <td>${row.customer_id || ''}</td>
                                <td>${row.customer_name || ''}</td>
                                <td>${row.store_name || ''}</td>
                                <td>${row.email || ''}</td>
                                <td>${row.address || ''}</td>
                                <td>${row.store_address || ''}</td>
                                <td>${row.warehouse_address || ''}</td>
                                <td>${row.businessType || ''}</td>
                                <td>${row.contact_person || ''}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="javascript:void(0);" class="action-icon view-btn" data-id="${row.customer_id}" onclick="viewCustomer(${row.customer_id})">
                                            <i class="bx bx-show"></i>
                                        </a>
                                        <a href="javascript:void(0);" class="action-icon edit-btn" data-id="${row.customer_id}" onclick="editCustomer(${row.customer_id})">
                                            <i class="bx bx-edit"></i>
                                        </a>
                                        <a href="javascript:void(0);" class="action-icon delete-btn" data-id="${row.customer_id}">
                                            <i class="bx bx-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            `;
                            tbody.appendChild(tr);
                        }
                    }

                    renderPagination(page, totalPages, filter);
                    setupEventListeners();
                    loadingSpinner.classList.add("d-none");
                }, 500);
            }

            // Function to handle viewing a customer
            window.viewCustomer = function(id) {
                const customer = originalData.find(c => c.customer_id == id);
                if (customer) {
                    document.getElementById('viewBirthday').textContent = customer.birthday || 'Not specified';
                    document.getElementById('viewAddress').textContent = customer.address || 'Not specified';
                    document.getElementById('viewWarehouseAddress').textContent = customer.warehouse_address || 'Not specified';
                    
                    const viewModal = new bootstrap.Modal(document.getElementById('viewModal'));
                    viewModal.show();
                }
            };

            // Function to toggle Other Business Type field
            function toggleOtherBusinessType(prefix) {
                const businessType = document.getElementById(prefix + 'BusinessType').value;
                const otherContainer = document.getElementById(prefix + 'OtherBusinessTypeContainer');
                const otherInput = document.getElementById(prefix + 'OtherBusinessType');
                
                if (businessType === 'Others') {
                    otherContainer.style.display = 'block';
                    otherInput.required = true;
                } else {
                    otherContainer.style.display = 'none';
                    otherInput.required = false;
                    otherInput.value = '';
                }
            }

            // Function to handle editing a customer
            window.editCustomer = function(id) {
                const customer = originalData.find(c => c.customer_id == id);
                if (customer) {
                    document.getElementById('editCustomerId').value = customer.customer_id;
                    document.getElementById('editCustomerName').value = customer.customer_name;
                    document.getElementById('editStoreName').value = customer.store_name;
                    document.getElementById('editContactInfo').value = customer.email;
                    document.getElementById('editStoreAddress').value = customer.store_address;
                    document.getElementById('editContact').value = customer.contact_person;
                    document.getElementById('editPaymentTerms').value = customer.payment_terms || '';
                    document.getElementById('editBirthday').value = customer.birthday || '';
                    document.getElementById('editAddress').value = customer.address || '';
                    document.getElementById('editWarehouseAddress').value = customer.warehouse_address || '';

                    // Handle business type
                    const businessTypeSelect = document.getElementById('editBusinessType');
                    const otherBusinessTypeContainer = document.getElementById('editOtherBusinessTypeContainer');
                    const otherBusinessTypeInput = document.getElementById('editOtherBusinessType');

                    // Check if the business type is in the predefined options
                    const businessTypeExists = Array.from(businessTypeSelect.options).some(option => 
                        option.value === customer.businessType
                    );

                    if (businessTypeExists) {
                        businessTypeSelect.value = customer.businessType;
                        otherBusinessTypeContainer.style.display = 'none';
                        otherBusinessTypeInput.value = '';
                    } else {
                        businessTypeSelect.value = 'Others';
                        otherBusinessTypeContainer.style.display = 'block';
                        otherBusinessTypeInput.value = customer.businessType;
                    }
                    
                    const editModal = new bootstrap.Modal(document.getElementById('editModal'));
                    editModal.show();
                }
            };

            // Setup event listeners for buttons
            function setupEventListeners() {
                // Delete button click handler
                document.querySelectorAll('.delete-btn').forEach(button => {
                    button.addEventListener('click', function() {
                        const id = this.getAttribute('data-id');
                        const customer = originalData.find(c => c.customer_id == id);
                        
                        if (customer) {
                            document.getElementById('deleteCustomerName').textContent = customer.customer_name;
                            document.getElementById('confirmDeleteBtn').setAttribute('data-id', id);
                            
                            const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
                            deleteModal.show();
                        }
                    });
                });
            }

            // Create pagination items
            function createPageItem(pageNumber, label, disabledOrActive = "") {
                const li = document.createElement("li");
                li.className = `page-item ${disabledOrActive}`;
                const a = document.createElement("a");
                a.className = "page-link";
                a.href = "#";
                a.textContent = label;
                if (!["disabled", "active"].includes(disabledOrActive)) {
                    a.addEventListener("click", (e) => {
                        e.preventDefault();
                        showPage(pageNumber, currentFilter);
                    });
                }
                li.appendChild(a);
                return li;
            }

            // Render pagination
            function renderPagination(currentPage, totalPages, filter = "") {
                paginationContainer.innerHTML = "";
                if (totalPages <= 0) return;

                paginationContainer.appendChild(createPageItem(1, "«", currentPage === 1 ? "disabled" : ""));
                paginationContainer.appendChild(createPageItem(currentPage - 1, "‹", currentPage === 1 ? "disabled" : ""));

                let startPage = Math.max(1, currentPage - Math.floor(maxVisiblePages / 2));
                let endPage = Math.min(totalPages, startPage + maxVisiblePages - 1);

                if (endPage - startPage + 1 < maxVisiblePages) {
                    startPage = Math.max(1, endPage - maxVisiblePages + 1);
                }

                if (startPage > 1) {
                    paginationContainer.appendChild(createPageItem(1, "1"));
                    if (startPage > 2) {
                        const li = document.createElement("li");
                        li.className = "page-item disabled";
                        li.innerHTML = '<span class="page-link">...</span>';
                        paginationContainer.appendChild(li);
                    }
                }

                for (let i = startPage; i <= endPage; i++) {
                    paginationContainer.appendChild(createPageItem(i, i, i === currentPage ? "active" : ""));
                }

                if (endPage < totalPages) {
                    if (endPage < totalPages - 1) {
                        const li = document.createElement("li");
                        li.className = "page-item disabled";
                        li.innerHTML = '<span class="page-link">...</span>';
                        paginationContainer.appendChild(li);
                    }
                    paginationContainer.appendChild(createPageItem(totalPages, totalPages));
                }

                paginationContainer.appendChild(createPageItem(currentPage + 1, "›", currentPage === totalPages ? "disabled" : ""));
                paginationContainer.appendChild(createPageItem(totalPages, "»", currentPage === totalPages ? "disabled" : ""));
            }

            // Handle entries select change
            rowsPerPageElement.addEventListener("change", function() {
                rowsPerPage = parseInt(this.value);
                showPage(1, currentFilter);
            });

            // Handle search
            document.getElementById("customSearchBtn").addEventListener("click", function() {
                const searchTerm = document.getElementById("customSearchInput").value;
                showPage(1, searchTerm);
            });

            document.getElementById("customSearchInput").addEventListener("keyup", function(e) {
                if (e.key === 'Enter') {
                    const searchTerm = this.value;
                    showPage(1, searchTerm);
                }
            });

            // Handle save edit
            document.getElementById('saveEditBtn').addEventListener('click', function() {
                const customerId = document.getElementById('editCustomerId').value;
                const businessType = document.getElementById('editBusinessType').value;
                const otherBusinessType = document.getElementById('editOtherBusinessType').value;

                const formData = {
                    customer_name: document.getElementById('editCustomerName').value,
                    store_name: document.getElementById('editStoreName').value,
                    email: document.getElementById('editContactInfo').value,
                    store_address: document.getElementById('editStoreAddress').value,
                    businessType: businessType === 'Others' ? otherBusinessType : businessType,
                    contact_person: document.getElementById('editContact').value,
                    payment_terms: document.getElementById('editPaymentTerms').value,
                    birthday: document.getElementById('editBirthday').value || null,
                    address: document.getElementById('editAddress').value || null,
                    warehouse_address: document.getElementById('editWarehouseAddress').value || null
                };

                // Show loading state
                const saveBtn = document.getElementById('saveEditBtn');
                const originalText = saveBtn.textContent;
                saveBtn.disabled = true;
                saveBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...';

                fetch(`/api/customers/${customerId}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify(formData)
                })
                .then(response => {
                    if (!response.ok) {
                        return response.json().then(err => Promise.reject(err));
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.status === 'success') {
                        const editModal = bootstrap.Modal.getInstance(document.getElementById('editModal'));
                        editModal.hide();
                        showToast('Customer updated successfully');
                        fetchCustomers(); // Refresh the table
                    } else {
                        throw new Error(data.message || 'Failed to update customer');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showToast(error.message || 'Error updating customer');
                })
                .finally(() => {
                    // Reset button state
                    saveBtn.disabled = false;
                    saveBtn.textContent = originalText;
                });
            });

            // Handle confirm delete
            document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                
                fetch(`/api/customers/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        const deleteModal = bootstrap.Modal.getInstance(document.getElementById('deleteModal'));
                        deleteModal.hide();
                        showToast('Customer deleted successfully');
                        fetchCustomers();
                    } else {
                        showToast('Error deleting customer: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showToast('Error deleting customer');
                });
            });

            // Show toast notification
            function showToast(message) {
                document.getElementById("toastMessage").textContent = message;
                const toast = new bootstrap.Toast(document.getElementById('successToast'));
                toast.show();
            }

            // Initial load
            fetchCustomers();
        });
    </script>
</body>
</html>