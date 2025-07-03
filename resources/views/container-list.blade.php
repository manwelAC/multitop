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
                            <h4 class="mb-0 fw-semibold">Container Inventory</h4>
                            <input type="text" id="customSearchInput" class="form-control w-25 ms-auto" placeholder="Search containers...">
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
                                        <a href="add-container.html" class="btn btn-primary" id="addNewProductBtn">
                                            <i class='bx bx-plus'></i> Add New Container
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-centered table-striped dt-responsive nowrap w-100" id="datatable">
                                        <thead>
                                            <tr>
                                                <th>Cont ID</th>
                                                <th>Customer Name</th>
                                                <th>White Tall</th>
                                                <th>Spring Deposit</th>
                                                <th>Container Type</th>
                                                <th>Container Status</th>
                                                <th>Container Cost</th>
                                                <th>Approved By</th>
                                                <th>Time In</th>
                                                <th>Time Out</th>
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
                                <h5 class="modal-title" id="editModalLabel">Edit Container</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="editForm">
                                    <input type="hidden" id="editContId">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="editCustomerName" class="form-label">Customer Name</label>
                                            <input type="text" class="form-control" id="editCustomerName" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="editWhiteTall" class="form-label">White Tall</label>
                                            <select class="form-select" id="editWhiteTall" required>
                                                <option value="With">With</option>
                                                <option value="Without">Without</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="editSpringDeposit" class="form-label">Spring Deposit</label>
                                            <div class="input-group">
                                                <span class="input-group-text">₱</span>
                                                <input type="number" step="0.01" class="form-control" id="editSpringDeposit" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="editContainerType" class="form-label">Container Type</label>
                                            <select class="form-select" id="editContainerType" required>
                                                <option value="White Tall">White Tall</option>
                                                <option value="Yellow Tall">Yellow Tall</option>
                                                <option value="Assorted White">Assorted White</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="editContainerStatus" class="form-label">Container Status</label>
                                            <select class="form-select" id="editContainerStatus" required>
                                                <option value="Damaged">Damaged</option>
                                                <option value="For Cleaning">For Cleaning</option>
                                                <option value="For Selling">For Selling</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="editContainerCost" class="form-label">Container Cost</label>
                                            <div class="input-group">
                                                <span class="input-group-text">₱</span>
                                                <input type="number" step="0.01" class="form-control" id="editContainerCost" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="editApprovedBy" class="form-label">Approved By</label>
                                            <select class="form-select" id="editApprovedBy" required>
                                                <option value="John">John</option>
                                                <option value="Jane">Jane</option>
                                                <option value="Alice">Alice</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="editTimeIn" class="form-label">Time In</label>
                                            <input type="datetime-local" class="form-control" id="editTimeIn" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="editTimeOut" class="form-label">Time Out</label>
                                            <input type="datetime-local" class="form-control" id="editTimeOut">
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
                                <h5 class="modal-title" id="deleteModalLabel">Delete Container</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete container <strong id="deleteContId"></strong>?
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
    // DOM Elements
    const rowsPerPageElement = document.getElementById("entriesSelect");
    let rowsPerPage = parseInt(rowsPerPageElement.value);
    const totalRows = 61000;
    const maxVisiblePages = 5;
    const tbody = document.getElementById("table-body");
    const paginationContainer = document.getElementById("pagination");
    const searchInput = document.getElementById("customSearchInput");
    const searchButton = document.getElementById("customSearchBtn");
    const loadingSpinner = document.getElementById("loading-spinner");

    const containerTypes = ["White Tall", "Yellow Tall", "Assorted White"];
    const containerStatuses = ["Damaged", "For Cleaning", "For Selling"];
    const approvers = ["John", "Jane", "Alice"];

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
            const randomDay = String(Math.floor(Math.random() * 28) + 1).padStart(2, '0');
            const randomHour = String(Math.floor(Math.random() * 24)).padStart(2, '0');
            const randomMinute = String(Math.floor(Math.random() * 60)).padStart(2, '0');
            
            originalData.push({
                contId: `CN${String(i).padStart(5, '0')}`,
                customerName: `Customer ${i}`,
                whiteTall: i % 3 === 0 ? "Without" : "With",
                springDeposit: (Math.random() * 100).toFixed(2),
                containerType: containerTypes[i % containerTypes.length],
                containerStatus: containerStatuses[i % containerStatuses.length],
                containerCost: (Math.random() * 200).toFixed(2),
                approvedBy: approvers[i % approvers.length],
                timeIn: `2025-06-${randomDay}T${randomHour}:${randomMinute}`,
                timeOut: `2025-06-${String(parseInt(randomDay) + 1).padStart(2, '0')}T${String((parseInt(randomHour) + 1) % 24).padStart(2, '0')}:${randomMinute}`
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
                tr.innerHTML = `<td colspan="11" class="text-center">No matching records found</td>`;
                tbody.appendChild(tr);
            } else {
                for (let i = start; i < end; i++) {
                    const row = filteredData[i];
                    const tr = document.createElement("tr");
                    tr.innerHTML = `
                        <td>${row.contId}</td>
                        <td>${row.customerName}</td>
                        <td>${row.whiteTall}</td>
                        <td>₱${row.springDeposit}</td>
                        <td>${row.containerType}</td>
                        <td>${row.containerStatus}</td>
                        <td>₱${row.containerCost}</td>
                        <td>${row.approvedBy}</td>
                        <td>${formatDateTime(row.timeIn)}</td>
                        <td>${row.timeOut ? formatDateTime(row.timeOut) : 'N/A'}</td>
                        <td>
                            <a href="javascript:void(0);" class="action-icon edit-btn" title="Edit" data-id="${row.contId}"><i class="bx bx-edit"></i></a>
                            <a href="javascript:void(0);" class="action-icon delete-btn" title="Delete" data-id="${row.contId}"><i class="bx bx-trash"></i></a>
                        </td>
                    `;
                    tbody.appendChild(tr);
                }
            }

            renderPagination(page, totalPages, filter);
            loadingSpinner.classList.add("d-none");
        }, 500);
    }

    function formatDateTime(datetimeStr) {
        if (!datetimeStr) return 'N/A';
        const date = new Date(datetimeStr);
        return date.toLocaleString();
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

    function setupEditContainer() {
        document.addEventListener("click", function(e) {
            if (e.target.closest(".edit-btn")) {
                const btn = e.target.closest(".edit-btn");
                const id = btn.getAttribute("data-id");
                const container = originalData.find(item => item.contId === id);
                if (container) {
                    document.getElementById("editContId").value = container.contId;
                    document.getElementById("editCustomerName").value = container.customerName;
                    document.getElementById("editWhiteTall").value = container.whiteTall;
                    document.getElementById("editSpringDeposit").value = container.springDeposit;
                    document.getElementById("editContainerType").value = container.containerType;
                    document.getElementById("editContainerStatus").value = container.containerStatus;
                    document.getElementById("editContainerCost").value = container.containerCost;
                    document.getElementById("editApprovedBy").value = container.approvedBy;
                    document.getElementById("editTimeIn").value = container.timeIn;
                    document.getElementById("editTimeOut").value = container.timeOut || "";
                    
                    document.getElementById("editModalLabel").textContent = "Edit Container";
                    editModal.show();
                }
            }
        });

        document.getElementById("saveEditBtn").addEventListener("click", function() {
            const id = document.getElementById("editContId").value;
            const index = originalData.findIndex(item => item.contId === id);
            
            if (index !== -1) {
                // Update existing record
                originalData[index] = {
                    contId: id,
                    customerName: document.getElementById("editCustomerName").value,
                    whiteTall: document.getElementById("editWhiteTall").value,
                    springDeposit: document.getElementById("editSpringDeposit").value,
                    containerType: document.getElementById("editContainerType").value,
                    containerStatus: document.getElementById("editContainerStatus").value,
                    containerCost: document.getElementById("editContainerCost").value,
                    approvedBy: document.getElementById("editApprovedBy").value,
                    timeIn: document.getElementById("editTimeIn").value,
                    timeOut: document.getElementById("editTimeOut").value || null
                };
                showToast("Container updated successfully!");
            } else {
                // Add new record
                originalData.unshift({
                    contId: `CN${String(originalData.length + 1).padStart(5, '0')}`,
                    customerName: document.getElementById("editCustomerName").value,
                    whiteTall: document.getElementById("editWhiteTall").value,
                    springDeposit: document.getElementById("editSpringDeposit").value,
                    containerType: document.getElementById("editContainerType").value,
                    containerStatus: document.getElementById("editContainerStatus").value,
                    containerCost: document.getElementById("editContainerCost").value,
                    approvedBy: document.getElementById("editApprovedBy").value,
                    timeIn: document.getElementById("editTimeIn").value,
                    timeOut: document.getElementById("editTimeOut").value || null
                });
                showToast("New container added successfully!");
            }
            
            showPage(currentPage, currentFilter);
            editModal.hide();
        });
    }

    function setupDeleteContainer() {
        document.addEventListener("click", function(e) {
            if (e.target.closest(".delete-btn")) {
                const btn = e.target.closest(".delete-btn");
                const id = btn.getAttribute("data-id");
                const container = originalData.find(item => item.contId === id);
                if (container) {
                    document.getElementById("deleteContId").textContent = id;
                    currentEditIndex = originalData.findIndex(item => item.contId === id);
                    deleteModal.show();
                }
            }
        });

        document.getElementById("confirmDeleteBtn").addEventListener("click", function() {
            if (currentEditIndex !== null && currentEditIndex !== -1) {
                originalData.splice(currentEditIndex, 1);
                showPage(Math.min(currentPage, Math.ceil(originalData.length / rowsPerPage)), currentFilter);
                showToast("Container deleted successfully!");
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
        setupEditContainer();
        setupDeleteContainer();
        
        // Add new container button
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