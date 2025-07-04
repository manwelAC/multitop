
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from techzaa.in/venton/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 May 2025 02:56:19 GMT -->
<head>
     <!-- Title Meta -->
     <meta charset="utf-8" />
     <title>Dashboard</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="A fully responsive premium admin dashboard template" />
     <meta name="csrf-token" content="{{ csrf_token() }}">
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
                            <h4 class="mb-0 fw-semibold">Product List</h4>
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
                                        <a href="{{ route('products.create') }}" class="btn btn-primary" id="addNewProductBtn">
                                            <i class='bx bx-plus'></i> Add New Product
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-centered table-striped dt-responsive nowrap w-100" id="datatable">
                                        <thead>
                                            <tr>
                                                <th>Product ID</th>
                                                <th>Product Name</th>
                                                <th>Category</th>
                                                <th>Stock</th>
                                                <th>Status</th>
                                                <th>Regular Price</th>
                                                <th>Supplier</th>
                                                <th>Created At</th>
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

                <!-- Edit Modal -->
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Product</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="editForm">
                                    <input type="hidden" id="editProductId">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="editProductName" class="form-label">Product Name</label>
                                            <input type="text" class="form-control" id="editProductName" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="editCategory" class="form-label">Category</label>
                                            <input type="text" class="form-control" id="editCategory" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="editStock" class="form-label">Stock</label>
                                            <input type="number" class="form-control" id="editStock" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="editStatus" class="form-label">Status</label>
                                            <select class="form-select" id="editStatus" required>
                                                <option value="In Stock">In Stock</option>
                                                <option value="Out of Stock">Out of Stock</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="editSpecialPrice" class="form-label">Special Price</label>
                                            <input type="number" step="0.01" class="form-control" id="editSpecialPrice" name="special_price">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="editRegularPrice" class="form-label">Regular Price</label>
                                            <input type="number" step="0.01" class="form-control" id="editRegularPrice" name="regular_price" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="editOriginalPrice" class="form-label">Original Price</label>
                                            <input type="number" step="0.01" class="form-control" id="editOriginalPrice" name="original_price">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="editCreatedAt" class="form-label">Created At</label>
                                            <input type="date" class="form-control" id="editCreatedAt" required>
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
                                <h5 class="modal-title" id="deleteModalLabel">Delete Product</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete <strong id="deleteProductName"></strong>?
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
    // DOM Elements
    const rowsPerPageElement = document.getElementById("entriesSelect");
    let rowsPerPage = parseInt(rowsPerPageElement.value);
    const tbody = document.getElementById("table-body");
    const paginationContainer = document.getElementById("pagination");
    const searchInput = document.getElementById("customSearchInput");
    const searchButton = document.getElementById("customSearchBtn");
    const loadingSpinner = document.getElementById("loading-spinner");
    
    // Initialize Bootstrap components
    const editModal = new bootstrap.Modal(document.getElementById('editModal'));
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
    const toast = new bootstrap.Toast(document.getElementById('successToast'));
    
    // Data storage
    let currentPage = 1;
    let currentSearchTerm = "";
    let currentProductId = null;
    
    // API base URL
    const apiBaseUrl = '/api/products';
    
    // CSRF token for secure requests
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    
    // Show current page of products
    function showPage(page, search = "") {
        tbody.innerHTML = "";
        loadingSpinner.classList.remove("d-none");
        currentPage = page;
        currentSearchTerm = search;

        let url = `${apiBaseUrl}?page=${page}&per_page=${rowsPerPage}`;
        if (search) {
            url += `&search=${encodeURIComponent(search)}`;
        }

        fetch(url, {
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => {
            if (!response.ok) throw new Error('Network response was not ok');
            return response.json();
        })
        .then(response => {
            if (!response.success) throw new Error(response.message || 'Failed to load products');
            
            const data = response.data;
            const products = data.data; // The actual product array
            
            if (products.length === 0) {
                showNoResults();
            } else {
                renderProducts(products);
            }
            renderPagination({
                current_page: data.current_page,
                last_page: data.last_page,
                per_page: data.per_page,
                total: data.total
            });
        })
        .catch(error => {
            console.error('Error fetching products:', error);
            showError(error.message || "Failed to load products. Please try again.");
        })
        .finally(() => {
            loadingSpinner.classList.add("d-none");
        });
    }
    
    // Show "no results" message
    function showNoResults() {
        const tr = document.createElement("tr");
        tr.innerHTML = `<td colspan="9" class="text-center">No matching records found</td>`;
        tbody.appendChild(tr);
    }
    
    // Render product rows
    function renderProducts(products) {
        tbody.innerHTML = ""; // Clear existing rows
        
        products.forEach(product => {
            const tr = document.createElement("tr");
            tr.innerHTML = `
                <td>${product.id}</td>
                <td>${product.name}</td>
                <td>${product.type}</td>
                <td>${product.stock_level}</td>
                <td>
                    <span class="badge rounded-pill ${product.stock_level > 0 ? 'bg-success' : 'bg-danger'}">
                        ${product.stock_level > 0 ? 'In Stock' : 'Out of Stock'}
                    </span>
                </td>
                <td>₱${parseFloat(product.regular_price).toFixed(2)}</td>
                <td>${product.supplier?.name || 'N/A'}</td>
                <td>${new Date(product.created_at).toLocaleDateString()}</td>
                <td>
                    <a href="javascript:void(0);" class="action-icon edit-btn" data-id="${product.id}">
                        <i class="bx bx-edit"></i>
                    </a>
                    <a href="javascript:void(0);" class="action-icon delete-btn" data-id="${product.id}">
                        <i class="bx bx-trash"></i>
                    </a>
                </td>
            `;
            tbody.appendChild(tr);
        });
        
        // Reattach event listeners after rendering
        attachEditDeleteHandlers();
    }
    
    function attachEditDeleteHandlers() {
        // Edit buttons
        document.querySelectorAll('.edit-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const productId = this.getAttribute('data-id');
                loadProductForEdit(productId);
            });
        });
        
        // Delete buttons
        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const productId = this.getAttribute('data-id');
                loadProductForDelete(productId);
            });
        });
    }
    
    // Render pagination controls
    function renderPagination(data) {
        paginationContainer.innerHTML = "";
        if (data.last_page <= 1) return;

        const createPageItem = (page, label, disabled = false, active = false) => {
            const li = document.createElement("li");
            li.className = `page-item ${disabled ? 'disabled' : ''} ${active ? 'active' : ''}`;
            const a = document.createElement("a");
            a.className = "page-link";
            a.href = "#";
            a.textContent = label;
            if (!disabled && !active) {
                a.addEventListener("click", (e) => {
                    e.preventDefault();
                    showPage(page, currentSearchTerm);
                });
            }
            li.appendChild(a);
            return li;
        };

        // Previous buttons
        paginationContainer.appendChild(createPageItem(1, "«", data.current_page === 1));
        paginationContainer.appendChild(createPageItem(data.current_page - 1, "‹", data.current_page === 1));

        // Page numbers
        const maxVisiblePages = 5;
        let startPage = Math.max(1, data.current_page - Math.floor(maxVisiblePages / 2));
        let endPage = Math.min(data.last_page, startPage + maxVisiblePages - 1);

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
            paginationContainer.appendChild(createPageItem(i, i, false, i === data.current_page));
        }

        if (endPage < data.last_page) {
            if (endPage < data.last_page - 1) {
                const li = document.createElement("li");
                li.className = "page-item disabled";
                li.innerHTML = '<span class="page-link">...</span>';
                paginationContainer.appendChild(li);
            }
            paginationContainer.appendChild(createPageItem(data.last_page, data.last_page));
        }

        // Next buttons
        paginationContainer.appendChild(createPageItem(data.current_page + 1, "›", data.current_page === data.last_page));
        paginationContainer.appendChild(createPageItem(data.last_page, "»", data.current_page === data.last_page));
    }
    
    // Handle search functionality
    function performSearch() {
        const term = searchInput.value.trim();
        showPage(1, term);
    }
    
    // Handle entries per page change
    function handleEntriesChange() {
        rowsPerPage = parseInt(rowsPerPageElement.value);
        showPage(1, currentSearchTerm);
    }
    
    // Show toast notification
    function showToast(message, isError = false) {
        const toastElement = document.getElementById('successToast');
        const toastMessage = document.getElementById("toastMessage");
        
        if (isError) {
            toastElement.classList.remove('bg-success');
            toastElement.classList.add('bg-danger');
        } else {
            toastElement.classList.remove('bg-danger');
            toastElement.classList.add('bg-success');
        }
        
        toastMessage.textContent = message;
        toast.show();
    }
    
    function showError(message) {
        showToast(message, true);
    }
    
    // Load product data for editing
    function loadProductForEdit(id) {
        fetch(`${apiBaseUrl}/${id}`, {
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => {
            if (!response.ok) throw new Error('Failed to load product');
            return response.json();
        })
        .then(response => {
            if (!response.success) throw new Error(response.message);
            populateEditForm(response.data);
            editModal.show();
        })
        .catch(error => {
            console.error('Error fetching product:', error);
            showError("Failed to load product details. Please try again.");
        });
    }
    
    // Populate edit form with product data
    function populateEditForm(product) {
        document.getElementById("editProductId").value = product.id;
        document.getElementById("editProductName").value = product.name;
        document.getElementById("editCategory").value = product.type;
        document.getElementById("editStock").value = product.stock_level;
        document.getElementById("editStatus").value = product.stock_level > 0 ? 'In Stock' : 'Out of Stock';
        document.getElementById("editRegularPrice").value = product.regular_price;
        document.getElementById("editCreatedAt").value = product.created_at.split('T')[0];
    }
    
    // Save product changes
    function saveProduct() {
        const formData = {
            name: document.getElementById("editProductName").value,
            type: document.getElementById("editCategory").value,
            stock_level: document.getElementById("editStock").value,
            regular_price: document.getElementById("editRegularPrice").value,
            created_at: document.getElementById("editCreatedAt").value
        };

        fetch(`${apiBaseUrl}/${currentProductId}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify(formData)
        })
        .then(response => {
            if (!response.ok) return response.json().then(err => { throw err; });
            return response.json();
        })
        .then(() => {
            showPage(currentPage, currentSearchTerm);
            showToast("Product updated successfully!");
            editModal.hide();
        })
        .catch(error => {
            console.error('Error updating product:', error);
            showError(error.message || "Failed to update product. Please try again.");
        });
    }
    
    // Load product data for deletion confirmation
    function loadProductForDelete(id) {
        fetch(`${apiBaseUrl}/${id}`, {
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => {
            if (!response.ok) throw new Error('Failed to load product');
            return response.json();
        })
        .then(response => {
            if (!response.success) throw new Error(response.message);
            document.getElementById("deleteProductName").textContent = response.data.name;
            deleteModal.show();
        })
        .catch(error => {
            console.error('Error fetching product:', error);
            showError("Failed to load product details. Please try again.");
        });
    }
    
    // Delete product
    function deleteProduct() {
        fetch(`${apiBaseUrl}/${currentProductId}`, {
            method: 'DELETE',
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': csrfToken
            }
        })
        .then(response => {
            if (!response.ok) return response.json().then(err => { throw err; });
            return response.json();
        })
        .then(() => {
            // Adjust page if we deleted the last item on the current page
            const newPage = tbody.children.length === 1 && currentPage > 1 
                ? currentPage - 1 
                : currentPage;
                
            showPage(newPage, currentSearchTerm);
            showToast("Product deleted successfully!");
            deleteModal.hide();
        })
        .catch(error => {
            console.error('Error deleting product:', error);
            showError(error.message || "Failed to delete product. Please try again.");
        });
    }
    
    // Initialize event listeners
    function initEventListeners() {
        searchButton.addEventListener("click", performSearch);
        searchInput.addEventListener("keypress", function(e) {
            if (e.key === "Enter") performSearch();
        });
        rowsPerPageElement.addEventListener("change", handleEntriesChange);
        
        // Edit form submission
        document.getElementById("saveEditBtn").addEventListener("click", saveProduct);
        
        // Delete confirmation
        document.getElementById("confirmDeleteBtn").addEventListener("click", deleteProduct);
    }
    
    // Initialize the application
    function init() {
        initEventListeners();
        showPage(1);
    }
    
    // Start the app
    init();
});
</script>
</body>
</html>
