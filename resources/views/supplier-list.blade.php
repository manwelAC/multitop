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
     <meta name="csrf-token" content="{{ csrf_token() }}" />

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
                            <h4 class="mb-0 fw-semibold">Supplier Inventory</h4>
                            <input type="text" id="customSearchInput" class="form-control w-25 ms-auto" placeholder="Search inventory...">
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
                                        <a href="add-supplier" class="btn btn-primary" id="addNewProductBtn">
                                            <i class='bx bx-plus'></i> Add Supplier
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-centered table-striped dt-responsive nowrap w-100" id="datatable">
                                        <thead>
                                            <tr>
                                                <th>Supplier ID</th>
                                                <th>Supplier Name</th>
                                                <th>Item</th>
                                                <th>Qty</th>
                                                <th>Net Qty</th>
                                                <th>Unit of Measure</th>
                                                <th>Date In</th>
                                                <th>Date Out</th>
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

                <!-- Add/Edit Modal -->
                <div class="modal fade" id="inventoryModal" tabindex="-1" aria-labelledby="inventoryModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="inventoryModalLabel">Inventory Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="inventoryForm">
                                    <input type="hidden" id="editInventoryId">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="editSupplierId" class="form-label">Supplier ID</label>
                                            <input type="text" class="form-control" id="editSupplierId" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="editSupplierName" class="form-label">Supplier Name</label>
                                            <input type="text" class="form-control" id="editSupplierName" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="editItem" class="form-label">Item</label>
                                            <input type="text" class="form-control" id="editItem" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="editUnitOfMeasure" class="form-label">Unit of Measure</label>
                                            <select class="form-select" id="editUnitOfMeasure" required>
                                                <option value="Units">Units</option>
                                                <option value="Kilos">Kilos</option>
                                                <option value="Liters">Liters</option>
                                                <option value="Pieces">Pieces</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="editQty" class="form-label">Quantity</label>
                                            <input type="number" class="form-control" id="editQty" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="editNetQty" class="form-label">Net Quantity</label>
                                            <input type="number" class="form-control" id="editNetQty" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="editDateIn" class="form-label">Date In</label>
                                            <input type="date" class="form-control" id="editDateIn" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="editDateOut" class="form-label">Date Out</label>
                                            <input type="date" class="form-control" id="editDateOut">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary" id="saveInventoryBtn">Save Changes</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Delete Inventory</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this inventory record?
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
    // DOM Elements
    const rowsPerPageElement = document.getElementById("entriesSelect");
    let rowsPerPage = parseInt(rowsPerPageElement.value);
    const tbody = document.getElementById("table-body");
    const paginationContainer = document.getElementById("pagination");
    const searchInput = document.getElementById("customSearchInput");
    const searchButton = document.getElementById("customSearchBtn");
    const loadingSpinner = document.getElementById("loading-spinner");

    // Initialize Bootstrap modals
    const inventoryModal = new bootstrap.Modal(document.getElementById('inventoryModal'));
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
    const toast = new bootstrap.Toast(document.getElementById('successToast'));

    let originalData = [];
    let currentEditIndex = null;
    let currentPage = 1;
    let currentFilter = "";

    // Helper function to format date for input fields
    function formatDateForInput(dateString) {
        const date = new Date(dateString);
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    }

    // Helper function to show toast messages
    function showToast(message) {
        document.getElementById("toastMessage").textContent = message;
        toast.show();
    }

    async function fetchSupplierData() {
        loadingSpinner.classList.remove("d-none");
        
        try {
            const response = await fetch('/api/suppliers');
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            const data = await response.json();
            console.log('Fetched data:', data); // Debug log
            
            // Map the data to match the database column names
            originalData = data.map((supplier) => ({
                id: supplier.id,
                supplier_id: `SUP${String(supplier.supplier_id).padStart(3, '0')}`,
                supplierName: supplier.supplierName || '',
                item: supplier.item || '',
                qty: supplier.qty || 0,
                netQty: supplier.netQty || 0,
                unitofmeasure: supplier.unitofmeasure || '',
                dateIn: supplier.dateIn ? new Date(supplier.dateIn).toLocaleDateString() : '',
                dateOut: supplier.dateOut ? new Date(supplier.dateOut).toLocaleDateString() : 'N/A'
            }));
            
            showPage(1);
        } catch (error) {
            console.error('Error fetching supplier data:', error);
            tbody.innerHTML = `<tr><td colspan="9" class="text-center text-danger">Error loading supplier data: ${error.message}</td></tr>`;
        } finally {
            loadingSpinner.classList.add("d-none");
        }
    }

    function showPage(page, filter = "") {
        tbody.innerHTML = "";
        currentPage = page;
        currentFilter = filter;

        const filteredData = filter
            ? originalData.filter(row =>
                Object.values(row).some(val =>
                    val && val.toString().toLowerCase().includes(filter.toLowerCase())
                )
            )
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
                    <td>${row.supplier_id}</td>
                    <td>${row.supplierName}</td>
                    <td>${row.item}</td>
                    <td>${row.qty}</td>
                    <td>${row.netQty}</td>
                    <td>${row.unitofmeasure}</td>
                    <td>${row.dateIn}</td>
                    <td>${row.dateOut}</td>
                    <td>
                        <button class="btn btn-link action-icon edit-btn p-0 me-2" data-id="${row.id}">
                            <i class="bx bx-edit"></i>
                        </button>
                        <button class="btn btn-link action-icon delete-btn p-0" data-id="${row.id}">
                            <i class="bx bx-trash"></i>
                        </button>
                    </td>
                `;
                tbody.appendChild(tr);

                // Add click handlers directly to the buttons
                const editBtn = tr.querySelector('.edit-btn');
                editBtn.addEventListener('click', function() {
                    const id = parseInt(this.getAttribute('data-id'));
                    const supplier = originalData.find(item => item.id === id);
                    if (supplier) {
                        document.getElementById("editInventoryId").value = supplier.id;
                        document.getElementById("editSupplierId").value = supplier.supplier_id;
                        document.getElementById("editSupplierName").value = supplier.supplierName;
                        document.getElementById("editItem").value = supplier.item;
                        document.getElementById("editQty").value = supplier.qty;
                        document.getElementById("editNetQty").value = supplier.netQty;
                        document.getElementById("editUnitOfMeasure").value = supplier.unitofmeasure;
                        document.getElementById("editDateIn").value = formatDateForInput(supplier.dateIn);
                        document.getElementById("editDateOut").value = supplier.dateOut !== 'N/A' ? formatDateForInput(supplier.dateOut) : '';
                        inventoryModal.show();
                    }
                });

                const deleteBtn = tr.querySelector('.delete-btn');
                deleteBtn.addEventListener('click', function() {
                    const id = parseInt(this.getAttribute('data-id'));
                    currentEditIndex = originalData.findIndex(item => item.id === id);
                    deleteModal.show();
                });
            }
        }

        renderPagination(page, totalPages, filter);
    }

    function renderPagination(currentPage, totalPages, filter) {
        paginationContainer.innerHTML = "";
        if (totalPages <= 1) return;

        const createPageItem = (pageNum, text = pageNum) => {
            const li = document.createElement("li");
            li.className = `page-item${pageNum === currentPage ? " active" : ""}`;
            li.innerHTML = `
                <a class="page-link" href="javascript:void(0);" ${pageNum ? `onclick="showPage(${pageNum}, '${filter}')"` : ""}>
                    ${text}
                </a>
            `;
            return li;
        };

        // Previous button
        paginationContainer.appendChild(createPageItem(currentPage > 1 ? currentPage - 1 : 0, "Previous"));

        // Page numbers
        for (let i = 1; i <= totalPages; i++) {
            if (
                i === 1 ||
                i === totalPages ||
                (i >= currentPage - 2 && i <= currentPage + 2)
            ) {
                paginationContainer.appendChild(createPageItem(i));
            } else if (
                i === currentPage - 3 ||
                i === currentPage + 3
            ) {
                const li = document.createElement("li");
                li.className = "page-item disabled";
                li.innerHTML = '<a class="page-link" href="javascript:void(0);">...</a>';
                paginationContainer.appendChild(li);
            }
        }

        // Next button
        paginationContainer.appendChild(createPageItem(currentPage < totalPages ? currentPage + 1 : 0, "Next"));
    }

    // Initialize the page
    document.addEventListener('DOMContentLoaded', function() {
        fetchSupplierData();

        // Setup event listeners
        rowsPerPageElement.addEventListener("change", function() {
            rowsPerPage = parseInt(this.value);
            showPage(1, currentFilter);
        });

        searchInput.addEventListener("keyup", function(e) {
            if (e.key === "Enter") {
                showPage(1, this.value.trim());
            }
        });

        searchButton.addEventListener("click", function() {
            showPage(1, searchInput.value.trim());
        });

        // Setup save button click handler
        document.getElementById("saveInventoryBtn").addEventListener("click", async function() {
            const id = parseInt(document.getElementById("editInventoryId").value);
            const updatedData = {
                id: id,
                supplier_id: document.getElementById("editSupplierId").value.replace('SUP', ''),
                supplierName: document.getElementById("editSupplierName").value,
                item: document.getElementById("editItem").value,
                qty: parseInt(document.getElementById("editQty").value),
                netQty: parseInt(document.getElementById("editNetQty").value),
                unitofmeasure: document.getElementById("editUnitOfMeasure").value,
                dateIn: document.getElementById("editDateIn").value,
                dateOut: document.getElementById("editDateOut").value || null
            };

            try {
                const response = await fetch(`/api/suppliers/${id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify(updatedData)
                });

                if (!response.ok) {
                    throw new Error('Failed to update supplier');
                }

                const data = await response.json();
                
                // Update the local data
                const index = originalData.findIndex(item => item.id === id);
                if (index !== -1) {
                    originalData[index] = {
                        ...updatedData,
                        supplier_id: `SUP${String(updatedData.supplier_id).padStart(3, '0')}`,
                        dateIn: new Date(updatedData.dateIn).toLocaleDateString(),
                        dateOut: updatedData.dateOut ? new Date(updatedData.dateOut).toLocaleDateString() : 'N/A'
                    };
                }

                showPage(currentPage, currentFilter);
                showToast("Supplier updated successfully!");
                inventoryModal.hide();
            } catch (error) {
                console.error('Error updating supplier:', error);
                showToast("Failed to update supplier. Please try again.");
            }
        });

        // Setup confirm delete button click handler
        document.getElementById("confirmDeleteBtn").addEventListener("click", function() {
            if (currentEditIndex !== null && currentEditIndex !== -1) {
                originalData.splice(currentEditIndex, 1);
                showPage(Math.min(currentPage, Math.ceil(originalData.length / rowsPerPage)), currentFilter);
                showToast("Supplier deleted successfully!");
                deleteModal.hide();
                currentEditIndex = null;
            }
        });
    });
</script>

</body>
</html>