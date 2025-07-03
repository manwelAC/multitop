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
                              <h4 class="mb-0 fw-semibold">Supplier List</h4>
                              <input type="text" id="customSearchInput" class="form-control w-25 ms-auto" placeholder="Search Supplier...">
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
                                             <a href="/add-suppliers">
                                        <button class="btn btn-primary" id="addNewInventoryBtn">
                                             <i class='bx bx-plus'></i> Add New Supplier
                                        </button>
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
                                                  <th>Quantity</th>
                                                  <th>Net Quantity</th>
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

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                         <div class="modal-content">
                              <div class="modal-header">
                                   <h5 class="modal-title" id="editModalLabel">Edit Inventory</h5>
                                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                   <form id="editForm">
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
                                             <label for="editQuantity" class="form-label">Quantity</label>
                                             <input type="number" class="form-control" id="editQuantity" required>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-6 mb-3">
                                             <label for="editNetQuantity" class="form-label">Net Quantity</label>
                                             <input type="number" class="form-control" id="editNetQuantity" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                             <label for="editUnitOfMeasure" class="form-label">Unit of Measure</label>
                                             <select class="form-select" id="editUnitOfMeasure" required>
                                                  <option value="kg">Kilograms (kg)</option>
                                                  <option value="g">Grams (g)</option>
                                                  <option value="lb">Pounds (lb)</option>
                                                  <option value="oz">Ounces (oz)</option>
                                                  <option value="l">Liters (l)</option>
                                                  <option value="ml">Milliliters (ml)</option>
                                                  <option value="pcs">Pieces (pcs)</option>
                                                  <option value="box">Boxes</option>
                                                  <option value="pack">Packs</option>
                                             </select>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-6 mb-3">
                                             <label for="editDateIn" class="form-label">Date In</label>
                                             <input type="date" class="form-control" id="editDateIn" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                             <label for="editDateOut" class="form-label">Date Out</label>
                                             <input type="date" class="form-control" id="editDateOut">
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

                         <!-- Vendor Scripts -->
                         <script src="{{ asset('venton/assets/js/vendor.js') }}"></script>
                         <script src="{{ asset('venton/assets/js/app.js') }}"></script>
                         <script src="{{ asset('venton/assets/vendor/jsvectormap/js/jsvectormap.min.js') }}"></script>
                         <script src="{{ asset('venton/assets/vendor/jsvectormap/maps/world-merc.js') }}"></script>
                         <script src="{{ asset('venton/assets/vendor/jsvectormap/maps/world.js') }}"></script>
                         <script src="{{ asset('venton/assets/js/pages/dashboard.js') }}"></script>

                         <!-- Bootstrap JS Bundle -->
                         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> 

                         <!-- Main Script -->
                         <script>
    // DOM Elements
    const rowsPerPageElement = document.getElementById("entriesSelect");
    let rowsPerPage = parseInt(rowsPerPageElement.value);
    const totalRows = 100;
    const maxVisiblePages = 5;
    const tbody = document.getElementById("table-body");
    const paginationContainer = document.getElementById("pagination");
    const searchInput = document.getElementById("customSearchInput");
    const searchButton = document.getElementById("customSearchBtn");
    const loadingSpinner = document.getElementById("loading-spinner");

    const unitsOfMeasure = ['kg', 'g', 'lb', 'oz', 'l', 'ml', 'pcs', 'box', 'pack'];
    const items = ['Flour', 'Sugar', 'Salt', 'Rice', 'Pasta', 'Oil', 'Vinegar', 'Spices', 'Herbs', 'Nuts', 'Dried Fruits', 'Canned Goods'];

    const editModal = new bootstrap.Modal(document.getElementById('editModal'));
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
    const toast = new bootstrap.Toast(document.getElementById('successToast'));

    let originalData = [];
    let currentEditIndex = null;
    let currentPage = 1;
    let currentFilter = "";

    function generateFakeData() {
        originalData = [];
        for (let i = 1; i <= totalRows; i++) {
            const randomDayIn = String(Math.floor(Math.random() * 28) + 1).padStart(2, '0');
            const randomMonthIn = String(Math.floor(Math.random() * 12) + 1).padStart(2, '0');
            const randomDayOut = Math.random() > 0.3 ? String(Math.floor(Math.random() * 28) + 1).padStart(2, '0') : null;
            const randomMonthOut = randomDayOut ? String(Math.floor(Math.random() * 12) + 1).padStart(2, '0') : null;
            
            originalData.push({
                id: i,
                supplier_id: `SUP${String(i).padStart(4, '0')}`,
                supplier_name: `Supplier ${i}`,
                item: items[Math.floor(Math.random() * items.length)],
                quantity: Math.floor(Math.random() * 1000) + 1,
                net_quantity: Math.floor(Math.random() * 800) + 1,
                unit_of_measure: unitsOfMeasure[Math.floor(Math.random() * unitsOfMeasure.length)],
                date_in: `2024-${randomMonthIn}-${randomDayIn}`,
                date_out: randomDayOut ? `2024-${randomMonthOut}-${randomDayOut}` : null
            });
        }
    }

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
                        <td>${row.supplier_name}</td>
                        <td>${row.item}</td>
                        <td>${row.quantity}</td>
                        <td>${row.net_quantity}</td>
                        <td>${row.unit_of_measure}</td>
                        <td>${row.date_in}</td>
                        <td>${row.date_out || 'N/A'}</td>
                        <td>
                            <a href="javascript:void(0);" class="action-icon edit-btn" title="Edit" data-id="${row.id}"><i class="bx bx-edit"></i></a>
                            <a href="javascript:void(0);" class="action-icon delete-btn" title="Delete" data-id="${row.id}"><i class="bx bx-trash"></i></a>
                        </td>
                    `;
                    tbody.appendChild(tr);
                }
            }

            renderPagination(page, totalPages, filter);
            loadingSpinner.classList.add("d-none");
        }, 500);
    }

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

    function performSearch() {
        const term = searchInput.value;
        showPage(1, term);
    }

    function handleEntriesChange() {
        rowsPerPage = parseInt(rowsPerPageElement.value);
        showPage(1, currentFilter);
    }

    function showToast(message) {
        document.getElementById("toastMessage").textContent = message;
        toast.show();
    }

    function setupEditInventory() {
        document.addEventListener("click", function(e) {
            if (e.target.closest(".edit-btn")) {
                const btn = e.target.closest(".edit-btn");
                const id = parseInt(btn.getAttribute("data-id"));
                const inventory = originalData.find(item => item.id === id);
                if (inventory) {
                    document.getElementById("editInventoryId").value = inventory.id;
                    document.getElementById("editSupplierId").value = inventory.supplier_id;
                    document.getElementById("editSupplierName").value = inventory.supplier_name;
                    document.getElementById("editItem").value = inventory.item;
                    document.getElementById("editQuantity").value = inventory.quantity;
                    document.getElementById("editNetQuantity").value = inventory.net_quantity;
                    document.getElementById("editUnitOfMeasure").value = inventory.unit_of_measure;
                    document.getElementById("editDateIn").value = inventory.date_in;
                    document.getElementById("editDateOut").value = inventory.date_out || '';
                    editModal.show();
                }
            }
        });

        document.getElementById("saveEditBtn").addEventListener("click", function() {
            const id = parseInt(document.getElementById("editInventoryId").value);
            const index = originalData.findIndex(item => item.id === id);
            if (index !== -1) {
                originalData[index] = {
                    id: id,
                    supplier_id: document.getElementById("editSupplierId").value,
                    supplier_name: document.getElementById("editSupplierName").value,
                    item: document.getElementById("editItem").value,
                    quantity: parseInt(document.getElementById("editQuantity").value),
                    net_quantity: parseInt(document.getElementById("editNetQuantity").value),
                    unit_of_measure: document.getElementById("editUnitOfMeasure").value,
                    date_in: document.getElementById("editDateIn").value,
                    date_out: document.getElementById("editDateOut").value || null
                };
                showPage(currentPage, currentFilter);
                showToast("Inventory record updated successfully!");
                editModal.hide();
            }
        });
    }

    function setupDeleteInventory() {
        document.addEventListener("click", function(e) {
            if (e.target.closest(".delete-btn")) {
                const btn = e.target.closest(".delete-btn");
                const id = parseInt(btn.getAttribute("data-id"));
                currentEditIndex = originalData.findIndex(item => item.id === id);
                deleteModal.show();
            }
        });

        document.getElementById("confirmDeleteBtn").addEventListener("click", function() {
            if (currentEditIndex !== null && currentEditIndex !== -1) {
                originalData.splice(currentEditIndex, 1);
                showPage(Math.min(currentPage, Math.ceil(originalData.length / rowsPerPage)), currentFilter);
                showToast("Inventory record deleted successfully!");
                deleteModal.hide();
                currentEditIndex = null;
            }
        });
    }

    function initEventListeners() {
        searchButton.addEventListener("click", performSearch);
        searchInput.addEventListener("keypress", function(e) {
            if (e.key === "Enter") performSearch();
        });
        rowsPerPageElement.addEventListener("change", handleEntriesChange);
        setupEditInventory();
        setupDeleteInventory();
        
    }

    function init() {
        generateFakeData();
        initEventListeners();
        showPage(1);
    }

    init();
</script>

                         </body>
                         </html>