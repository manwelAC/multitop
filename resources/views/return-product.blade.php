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
                            <h4 class="mb-0 fw-semibold">Return Product</h4>
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
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-centered table-striped dt-responsive nowrap w-100" id="datatable">
                                        <thead>
                                            <tr>
                                                <th>Return ID</th>
                                                <th>Product Name</th>
                                                <th>Customer Name</th>
                                                <th>Return Date</th>
                                                <th>Quantity</th>
                                                <th>Reason</th>
                                                <th>Status</th>
                                                <th>Action Taken</th>
                                                <th>Notes</th>
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
                                <h5 class="modal-title" id="editModalLabel">Edit Return</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="editForm">
                                    <input type="hidden" id="editReturnId">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="editProductName" class="form-label">Product Name</label>
                                            <input type="text" class="form-control" id="editProductName" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="editCustomerName" class="form-label">Customer Name</label>
                                            <input type="text" class="form-control" id="editCustomerName" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="editReturnDate" class="form-label">Return Date</label>
                                            <input type="date" class="form-control" id="editReturnDate" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="editQuantity" class="form-label">Quantity</label>
                                            <input type="number" class="form-control" id="editQuantity" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="editReason" class="form-label">Reason</label>
                                            <input type="text" class="form-control" id="editReason" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="editStatus" class="form-label">Status</label>
                                            <select class="form-select" id="editStatus" required>
                                                <option value="Pending">Pending</option>
                                                <option value="Processed">Processed</option>
                                                <option value="Rejected">Rejected</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="editActionTaken" class="form-label">Action Taken</label>
                                            <input type="text" class="form-control" id="editActionTaken" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="editNotes" class="form-label">Notes</label>
                                            <textarea class="form-control" id="editNotes" rows="1"></textarea>
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
                                <h5 class="modal-title" id="deleteModalLabel">Delete Return</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete return <strong id="deleteReturnID"></strong>?
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
    const totalRows = 100;
    const maxVisiblePages = 5;
    const tbody = document.getElementById("table-body");
    const paginationContainer = document.getElementById("pagination");
    const searchInput = document.getElementById("customSearchInput");
    const searchButton = document.getElementById("customSearchBtn");
    const loadingSpinner = document.getElementById("loading-spinner");

    const statusOptions = ['Pending', 'Processed', 'Rejected'];

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
            const randomStatus = statusOptions[Math.floor(Math.random() * statusOptions.length)];
            const randomDay = String(Math.floor(Math.random() * 28) + 1).padStart(2, '0');
            const randomMonth = String(Math.floor(Math.random() * 12) + 1).padStart(2, '0');
            originalData.push({
                id: i,
                product_name: `Product ${i}`,
                customer_name: `Customer ${i % 5}`,
                return_date: `2024-${randomMonth}-${randomDay}`,
                quantity: Math.floor(Math.random() * 10) + 1,
                reason: ["Damaged", "Wrong Item", "Defective", "No Longer Needed"][Math.floor(Math.random() * 4)],
                status: randomStatus,
                action_taken: ["Refund Initiated", "Replacement Sent", "Warranty Claim", "Returned to Stock"][Math.floor(Math.random() * 4)],
                notes: ["Box was broken.", "Sent correct model.", "Out of warranty.", "Restocked."][Math.floor(Math.random() * 4)]
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
                          val.toString().toLowerCase().includes(filter.toLowerCase())
                      )
                  )
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
                        <td>${row.id}</td>
                        <td>${row.product_name}</td>
                        <td>${row.customer_name}</td>
                        <td>${row.return_date}</td>
                        <td>${row.quantity}</td>
                        <td>${row.reason}</td>
                        <td><span class="badge rounded-pill ${row.status === 'Pending' ? 'bg-warning' : row.status === 'Processed' ? 'bg-success' : 'bg-danger'}">${row.status}</span></td>
                        <td>${row.action_taken}</td>
                        <td>${row.notes}</td>
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

        for (let i = startPage; i <= endPage && i <= totalPages; i++) {
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

    function setupEditReturn() {
        document.addEventListener("click", function(e) {
            if (e.target.closest(".edit-btn")) {
                const btn = e.target.closest(".edit-btn");
                const id = parseInt(btn.getAttribute("data-id"));
                const entry = originalData.find(item => item.id === id);
                if (entry) {
                    document.getElementById("editReturnId").value = entry.id;
                    document.getElementById("editProductName").value = entry.product_name;
                    document.getElementById("editCustomerName").value = entry.customer_name;
                    document.getElementById("editReturnDate").value = entry.return_date;
                    document.getElementById("editQuantity").value = entry.quantity;
                    document.getElementById("editReason").value = entry.reason;
                    document.getElementById("editStatus").value = entry.status;
                    document.getElementById("editActionTaken").value = entry.action_taken;
                    document.getElementById("editNotes").value = entry.notes || '';
                    editModal.show();
                }
            }
        });

        document.getElementById("saveEditBtn").addEventListener("click", function() {
            const id = parseInt(document.getElementById("editReturnId").value);
            const index = originalData.findIndex(item => item.id === id);
            if (index !== -1) {
                originalData[index] = {
                    id: id,
                    product_name: document.getElementById("editProductName").value,
                    customer_name: document.getElementById("editCustomerName").value,
                    return_date: document.getElementById("editReturnDate").value,
                    quantity: document.getElementById("editQuantity").value,
                    reason: document.getElementById("editReason").value,
                    status: document.getElementById("editStatus").value,
                    action_taken: document.getElementById("editActionTaken").value,
                    notes: document.getElementById("editNotes").value
                };
                showPage(currentPage, currentFilter);
                showToast("Return updated successfully!");
                editModal.hide();
            }
        });
    }

    function setupDeleteReturn() {
        document.addEventListener("click", function(e) {
            if (e.target.closest(".delete-btn")) {
                const btn = e.target.closest(".delete-btn");
                const id = parseInt(btn.getAttribute("data-id"));
                const entry = originalData.find(item => item.id === id);
                if (entry) {
                    document.getElementById("deleteReturnID").textContent = `#${id}`;
                    currentEditIndex = originalData.findIndex(item => item.id === id);
                    deleteModal.show();
                }
            }
        });

        document.getElementById("confirmDeleteBtn").addEventListener("click", function() {
            if (currentEditIndex !== null && currentEditIndex !== -1) {
                originalData.splice(currentEditIndex, 1);
                showPage(currentPage, currentFilter);
                showToast("Return deleted successfully!");
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
        setupEditReturn();
        setupDeleteReturn();
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