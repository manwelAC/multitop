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
                                        <a href="add-customer.html" class="btn btn-primary" id="addNewCustomerBtn">
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
                                                  <th>Contact Info</th>
                                                  <th>Store Address</th>
                                                  <th>Business Type</th>
                                                  <th>Contact</th>
                                                  <th>Payment Terms</th>
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
                                   <form id="editForm">
                                        <input type="hidden" id="editCustomerId">
                                        <div class="row">
                                        <div class="col-md-6 mb-3">
                                             <label for="editCustomerName" class="form-label">Customer Name</label>
                                             <input type="text" class="form-control" id="editCustomerName" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                             <label for="editStoreName" class="form-label">Store Name</label>
                                             <input type="text" class="form-control" id="editStoreName" required>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-6 mb-3">
                                             <label for="editContactInfo" class="form-label">Contact Info</label>
                                             <input type="text" class="form-control" id="editContactInfo" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                             <label for="editStoreAddress" class="form-label">Store Address</label>
                                             <input type="text" class="form-control" id="editStoreAddress" required>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-6 mb-3">
                                             <label for="editBusinessType" class="form-label">Business Type</label>
                                             <select class="form-select" id="editBusinessType" required>
                                                  <option value="Super Market">Super Market</option>
                                                  <option value="Grocery">Grocery</option>
                                                  <option value="Bakery">Bakery</option>
                                                  <option value="Plastic">Plastic</option>
                                                  <option value="Sari-Sari Store">Sari-Sari Store</option>
                                                  <option value="Palengke">Palengke</option>
                                                  <option value="Others">Others</option>
                                             </select>
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
                                                  <option value="Net 7 Days">Net 7 Days</option>
                                                  <option value="Net 15 Days">Net 15 Days</option>
                                                  <option value="Net 21 Days">Net 21 Days</option>
                                                  <option value="Net 30 Days">Net 30 Days</option>
                                                  <option value="Cash on Delivery">Cash on Delivery</option>
                                                  <option value="Cheque">Cheque</option>
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
                                        
                                        <!-- Product Pricing Section -->
                                        <div class="row mt-4">
                                        <div class="col-12">
                                             <h5 class="mb-3">Product Pricing</h5>
                                             <div class="alert alert-info">
                                                  <i class="bx bx-info-circle"></i> Special prices must be lower than regular prices
                                             </div>
                                             <div class="table-responsive">
                                                  <table class="table table-bordered" id="productTable">
                                                       <thead>
                                                            <tr>
                                                            <th style="width: 50%">Product</th>
                                                            <th style="width: 25%">Regular Price</th>
                                                            <th style="width: 25%">Special Price</th>
                                                            </tr>
                                                       </thead>
                                                       <tbody id="productTableBody">
                                                            <!-- Product rows will be added here automatically -->
                                                       </tbody>
                                                  </table>
                                             </div>
                                        </div>
                                        </div>
                                   </form>
                              </div>
                              <div class="modal-footer">
                                   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
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
                    <div id="toast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
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

    <script src="{{ asset('venton/assets/js/vendor.js') }}"></script>
    <script src="{{ asset('venton/assets/js/app.js') }}"></script>
    <script src="{{ asset('venton/assets/vendor/jsvectormap/js/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('venton/assets/vendor/jsvectormap/maps/world-merc.js') }}"></script>
    <script src="{{ asset('venton/assets/vendor/jsvectormap/maps/world-merc.js') }}"></script>
    <script src="{{ asset('venton/assets/vendor/jsvectormap/maps/world.js') }}"></script>
    <script src="{{ asset('venton/assets/js/pages/dashboard.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    // Initialize required variables
    const rowsPerPageElement = document.getElementById("entriesSelect");
    let rowsPerPage = parseInt(rowsPerPageElement.value);
    const totalRows = 100;
    const maxVisiblePages = 5;
    const tbody = document.getElementById("table-body");
    const paginationContainer = document.getElementById("pagination");
    const loadingSpinner = document.getElementById("loading-spinner");

    const businessTypes = ['Super Market', 'Grocery', 'Bakery', 'Plastic', 'Sari-Sari Store', 'Palengke', 'Others'];
    const viewModal = new bootstrap.Modal(document.getElementById('viewModal'));
    const editModal = new bootstrap.Modal(document.getElementById('editModal'));
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
    const toast = new bootstrap.Toast(document.getElementById('toast'));

    // Sample product data
    const products = [
        { id: 1, name: 'Product 1', regular_price: 100.00 },
        { id: 2, name: 'Product 2', regular_price: 150.00 },
        { id: 3, name: 'Product 3', regular_price: 75.50 },
        { id: 4, name: 'Product 4', regular_price: 200.00 },
        { id: 5, name: 'Product 5', regular_price: 50.25 }
    ];

    let originalData = [];
    let currentEditIndex = null;
    let currentPage = 1;
    let currentFilter = "";

    // Generate sample customer data
    function generateFakeData() {
        originalData = [];
        
        for (let i = 1; i <= totalRows; i++) {
            const randomType = businessTypes[Math.floor(Math.random() * businessTypes.length)];
            const randomDay = String(Math.floor(Math.random() * 28) + 1).padStart(2, '0');
            const randomMonth = String(Math.floor(Math.random() * 12) + 1).padStart(2, '0');
            const randomYear = Math.floor(Math.random() * 30) + 1980;
            
            // Generate some random product pricing for each customer
            const productPricing = products.map(product => {
                return {
                    product_id: product.id,
                    regular_price: product.regular_price,
                    special_price: Math.random() > 0.3 ? 
                        (product.regular_price * (0.5 + Math.random() * 0.4)).toFixed(2) : null
                };
            });

            originalData.push({
                id: i,
                name: `Customer ${i}`,
                store_name: `Store ${i}`,
                contact_info: `contact${i}@example.com`,
                store_address: `${i} Market St, City ${Math.floor(i / 10) + 1}`,
                business_type: randomType,
                contact: `Person ${i}`,
                payment_terms: `${Math.floor(Math.random() * 30) + 1} days`,
                birthday: Math.random() > 0.7 ? `${randomYear}-${randomMonth}-${randomDay}` : null,
                address: `${i} Main St, City ${Math.floor(i / 10) + 1}`,
                warehouse_address: `${i} Industrial Zone, City ${Math.floor(i / 10) + 1}`,
                product_pricing: productPricing
            });
        }
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
                tr.innerHTML = `<td colspan="9" class="text-center">No matching records found</td>`;
                tbody.appendChild(tr);
            } else {
                for (let i = start; i < end; i++) {
                    const row = filteredData[i];
                    const tr = document.createElement("tr");
                    tr.innerHTML = `
                        <td>${row.id}</td>
                        <td>${row.name}</td>
                        <td>${row.store_name}</td>
                        <td>${row.contact_info}</td>
                        <td>${row.store_address}</td>
                        <td>${row.business_type}</td>
                        <td>${row.contact}</td>
                        <td>${row.payment_terms}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="javascript:void(0);" class="action-icon view-btn" title="View" data-id="${row.id}"><i class="bx bx-show"></i></a>
                                <a href="javascript:void(0);" class="action-icon edit-btn" title="Edit" data-id="${row.id}"><i class="bx bx-edit"></i></a>
                                <a href="javascript:void(0);" class="action-icon delete-btn" title="Delete" data-id="${row.id}"><i class="bx bx-trash"></i></a>
                            </div>
                        </td>
                    `;
                    tbody.appendChild(tr);
                }
            }

            renderPagination(page, totalPages, filter);
            loadingSpinner.classList.add("d-none");
        }, 500);
    }

    // Load product pricing for a customer
    function loadProductPricing(customerId) {
        const customer = originalData.find(item => item.id === customerId);
        if (!customer) return;

        const productTableBody = document.getElementById('productTableBody');
        productTableBody.innerHTML = '';

        // Create a row for each product
        products.forEach(product => {
            const row = document.createElement('tr');
            row.dataset.productId = product.id;
            
            // Find if this customer has special pricing for this product
            const customerPricing = customer.product_pricing?.find(p => p.product_id === product.id);
            const specialPrice = customerPricing?.special_price || '';
            
            row.innerHTML = `
                <td>${product.name}</td>
                <td>
                    <div class="input-group">
                        <span class="input-group-text bg-light">₱</span>
                        <input type="number" class="form-control bg-light regular-price" 
                               value="${product.regular_price}" 
                               readonly
                               data-regular-price="${product.regular_price}">
                    </div>
                </td>
                <td>
                    <div class="input-group">
                        <span class="input-group-text">₱</span>
                        <input type="number" class="form-control special-price" 
                               value="${specialPrice}" 
                               placeholder="Enter special price" 
                               step="0.01"
                               data-product-id="${product.id}">
                    </div>
                </td>
            `;
            
            productTableBody.appendChild(row);
        });
    }

    // Save product pricing for a customer
    function saveProductPricing(customerId) {
        const customer = originalData.find(item => item.id === customerId);
        if (!customer) return;

        // Initialize product_pricing array
        customer.product_pricing = [];

        // Get all special price inputs
        const specialPriceInputs = document.querySelectorAll('.special-price');
        
        specialPriceInputs.forEach(input => {
            const productId = parseInt(input.dataset.productId);
            const specialPrice = parseFloat(input.value);
            
            if (!isNaN(specialPrice)) {
                // Find the product to get regular price
                const product = products.find(p => p.id === productId);
                
                customer.product_pricing.push({
                    product_id: productId,
                    regular_price: product.regular_price,
                    special_price: specialPrice
                });
            }
        });

        return true;
    }

    // Setup edit functionality
    function setupEditCustomer() {
        document.addEventListener("click", function(e) {
            if (e.target.closest(".edit-btn")) {
                const btn = e.target.closest(".edit-btn");
                const id = parseInt(btn.getAttribute("data-id"));
                const customer = originalData.find(item => item.id === id);
                if (customer) {
                    document.getElementById("editCustomerId").value = customer.id;
                    document.getElementById("editCustomerName").value = customer.name;
                    document.getElementById("editStoreName").value = customer.store_name;
                    document.getElementById("editContactInfo").value = customer.contact_info;
                    document.getElementById("editStoreAddress").value = customer.store_address;
                    document.getElementById("editBusinessType").value = customer.business_type;
                    document.getElementById("editContact").value = customer.contact;
                    document.getElementById("editPaymentTerms").value = customer.payment_terms;
                    document.getElementById("editBirthday").value = customer.birthday || '';
                    document.getElementById("editAddress").value = customer.address;
                    document.getElementById("editWarehouseAddress").value = customer.warehouse_address;
                    
                    // Load all products with pricing
                    loadProductPricing(id);
                    
                    editModal.show();
                }
            }
        });

        document.getElementById("saveEditBtn").addEventListener("click", function() {
            const id = parseInt(document.getElementById("editCustomerId").value);
            const index = originalData.findIndex(item => item.id === id);
            if (index !== -1) {
                // Save product pricing
                saveProductPricing(id);
                
                originalData[index] = {
                    ...originalData[index],
                    name: document.getElementById("editCustomerName").value,
                    store_name: document.getElementById("editStoreName").value,
                    contact_info: document.getElementById("editContactInfo").value,
                    store_address: document.getElementById("editStoreAddress").value,
                    business_type: document.getElementById("editBusinessType").value,
                    contact: document.getElementById("editContact").value,
                    payment_terms: document.getElementById("editPaymentTerms").value,
                    birthday: document.getElementById("editBirthday").value || null,
                    address: document.getElementById("editAddress").value,
                    warehouse_address: document.getElementById("editWarehouseAddress").value
                };
                
                showPage(currentPage, currentFilter);
                showToast("Customer updated successfully!");
                editModal.hide();
            }
        });
    }

    // Setup view functionality
    function setupViewCustomer() {
        document.addEventListener("click", function(e) {
            if (e.target.closest(".view-btn")) {
                const btn = e.target.closest(".view-btn");
                const id = parseInt(btn.getAttribute("data-id"));
                const customer = originalData.find(item => item.id === id);
                if (customer) {
                    document.getElementById("viewBirthday").textContent = customer.birthday || "Not specified";
                    document.getElementById("viewAddress").textContent = customer.address;
                    document.getElementById("viewWarehouseAddress").textContent = customer.warehouse_address;
                    viewModal.show();
                }
            }
        });
    }

    // Setup delete functionality
    function setupDeleteCustomer() {
        document.addEventListener("click", function(e) {
            if (e.target.closest(".delete-btn")) {
                const btn = e.target.closest(".delete-btn");
                const id = parseInt(btn.getAttribute("data-id"));
                const customer = originalData.find(item => item.id === id);
                if (customer) {
                    document.getElementById("deleteCustomerName").textContent = customer.name;
                    currentEditIndex = originalData.findIndex(item => item.id === id);
                    deleteModal.show();
                }
            }
        });

        document.getElementById("confirmDeleteBtn").addEventListener("click", function() {
            if (currentEditIndex !== null && currentEditIndex !== -1) {
                originalData.splice(currentEditIndex, 1);
                showPage(Math.min(currentPage, Math.ceil(originalData.length / rowsPerPage)), currentFilter);
                showToast("Customer deleted successfully!");
                deleteModal.hide();
                currentEditIndex = null;
            }
        });
    }

    // Show toast notification
    function showToast(message, type = "success") {
        const toast = document.getElementById("toast");
        toast.className = `toast align-items-center text-white bg-${type} border-0`;
        document.getElementById("toastMessage").textContent = message;
        bootstrap.Toast.getOrCreateInstance(toast).show();
    }

    // Search functionality
    function setupSearch() {
        document.getElementById("customSearchBtn").addEventListener("click", function() {
            const searchTerm = document.getElementById("customSearchInput").value;
            showPage(1, searchTerm);
        });

        document.getElementById("customSearchInput").addEventListener("keypress", function(e) {
            if (e.key === "Enter") {
                const searchTerm = this.value;
                showPage(1, searchTerm);
            }
        });
    }

    // Initialize the page
    function init() {
        generateFakeData();
        showPage(1);
        
        setupViewCustomer();
        setupEditCustomer();
        setupDeleteCustomer();
        setupSearch();

        // Handle entries select change
        rowsPerPageElement.addEventListener("change", function() {
            rowsPerPage = parseInt(this.value);
            showPage(1, currentFilter);
        });
    }

    // Start the application when DOM is loaded
    document.addEventListener('DOMContentLoaded', init);
</script>
</body>
</html>