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
                                <h4 class="mb-0 fw-semibold">Final Loading Form</h4>
                                <div class="d-flex gap-2 mt-3">
                                    <input type="text" id="customSearchInput" class="form-control w-25" placeholder="Search expenses...">
                                    <input type="date" id="dateFromFilter" class="form-control">
                                    <input type="date" id="dateToFilter" class="form-control">
                                    <button class="btn btn-primary" id="customSearchBtn">Search</button>
                                    <button class="btn btn-secondary" id="resetFilterBtn">Reset</button>
                                </div>
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
                                            <button id="exportExpenseExcelBtn" class="btn btn-success me-2">
                                                <i class='bx bx-export'></i> Export to Excel
                                            </button>
                                            <a href="add-expenses.html" class="btn btn-primary" id="addNewExpenseBtn">
                                                <i class='bx bx-plus'></i> Add New Final Loading
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
                                                    <th>Date</th>
                                                    <th>Area</th>
                                                    <th>Item</th>
                                                    <th>Qty</th>
                                                    <th>Unit</th>
                                                    <th>Amount</th>
                                                    <th>Approved By</th>
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
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Edit Expense</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="editForm">
                                        <input type="hidden" id="editExpenseId">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="editDate" class="form-label">Date</label>
                                                <input type="date" class="form-control" id="editDate" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="editArea" class="form-label">Area</label>
                                                <select class="form-select" id="editArea" required>
                                                    <option value="Office">Office</option>
                                                    <option value="Warehouse">Warehouse</option>
                                                    <option value="Production">Production</option>
                                                    <option value="Logistics">Logistics</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="editItem" class="form-label">Item</label>
                                                <input type="text" class="form-control" id="editItem" required>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="editQty" class="form-label">Qty</label>
                                                <input type="number" class="form-control" id="editQty" required>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="editUnit" class="form-label">Unit</label>
                                                <select class="form-select" id="editUnit" required>
                                                    <option value="pcs">pcs</option>
                                                    <option value="kg">kg</option>
                                                    <option value="box">box</option>
                                                    <option value="liter">liter</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="editAmount" class="form-label">Amount</label>
                                                <input type="number" step="0.01" class="form-control" id="editAmount" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="editApprovedBy" class="form-label">Approved By</label>
                                                <select class="form-select" id="editApprovedBy" required>
                                                    <option value="John Smith">John Smith</option>
                                                    <option value="Sarah Johnson">Sarah Johnson</option>
                                                    <option value="Michael Brown">Michael Brown</option>
                                                    <option value="Emily Davis">Emily Davis</option>
                                                </select>
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
                                    <h5 class="modal-title" id="deleteModalLabel">Delete Expense</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this expense record?
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
    const totalRows = 150;
    const maxVisiblePages = 5;
    const tbody = document.getElementById("table-body");
    const paginationContainer = document.getElementById("pagination");
    const searchInput = document.getElementById("customSearchInput");
    const searchButton = document.getElementById("customSearchBtn");
    const resetButton = document.getElementById("resetFilterBtn");
    const dateFromFilter = document.getElementById("dateFromFilter");
    const dateToFilter = document.getElementById("dateToFilter");
    const loadingSpinner = document.getElementById("loading-spinner");
    const exportBtn = document.getElementById("exportExpenseExcelBtn");

    // Data options
    const areas = ['Office', 'Warehouse', 'Production', 'Logistics'];
    const items = ['Printer Paper', 'Ink Cartridges', 'Cleaning Supplies', 'Tools', 'Safety Equipment', 'Packaging Materials'];
    const units = ['pcs', 'kg', 'box', 'liter'];
    const approvers = ['John Smith', 'Sarah Johnson', 'Michael Brown', 'Emily Davis'];

    // Initialize modals and toast
    const editModal = new bootstrap.Modal(document.getElementById('editModal'));
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
    const toast = new bootstrap.Toast(document.getElementById('successToast'));

    // Data and state variables
    let originalData = [];
    let currentEditIndex = null;
    let currentPage = 1;
    let currentFilter = "";
    let currentDateFrom = "";
    let currentDateTo = "";

    // Generate fake data
    function generateFakeData() {
        originalData = [];
        const startDate = new Date(2023, 0, 1);
        const endDate = new Date();
        
        for (let i = 1; i <= totalRows; i++) {
            const randomDate = new Date(startDate.getTime() + Math.random() * (endDate.getTime() - startDate.getTime()));
            const formattedDate = randomDate.toISOString().split('T')[0];
            const randomArea = areas[Math.floor(Math.random() * areas.length)];
            const randomItem = items[Math.floor(Math.random() * items.length)];
            const randomQty = Math.floor(Math.random() * 20) + 1;
            const randomUnit = units[Math.floor(Math.random() * units.length)];
            const randomAmount = (Math.random() * 500 + 10).toFixed(2);
            const randomApprover = approvers[Math.floor(Math.random() * approvers.length)];
            
            originalData.push({
                id: i,
                date: formattedDate,
                area: randomArea,
                item: randomItem,
                qty: randomQty,
                unit: randomUnit,
                amount: randomAmount,
                approved_by: randomApprover
            });
        }
    }

    // Show page with filtered data
    function showPage(page, filter = "", dateFrom = "", dateTo = "") {
        tbody.innerHTML = "";
        loadingSpinner.classList.remove("d-none");
        currentPage = page;
        currentFilter = filter;
        currentDateFrom = dateFrom;
        currentDateTo = dateTo;

        setTimeout(() => {
            let filteredData = [...originalData];
            
            // Apply text filter if exists
            if (filter) {
                filteredData = filteredData.filter(row =>
                    Object.values(row).some(val =>
                        val.toString().toLowerCase().includes(filter.toLowerCase())
                    )
                );
            }
            
            // Apply date range filter if exists
            if (dateFrom || dateTo) {
                filteredData = filteredData.filter(row => {
                    const rowDate = new Date(row.date);
                    const fromDate = dateFrom ? new Date(dateFrom) : null;
                    const toDate = dateTo ? new Date(dateTo) : null;
                    
                    if (fromDate && toDate) {
                        return rowDate >= fromDate && rowDate <= toDate;
                    } else if (fromDate) {
                        return rowDate >= fromDate;
                    } else if (toDate) {
                        return rowDate <= toDate;
                    }
                    return true;
                });
            }

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
                        <td>${row.date}</td>
                        <td>${row.area}</td>
                        <td>${row.item}</td>
                        <td>${row.qty}</td>
                        <td>${row.unit}</td>
                        <td>₱${parseFloat(row.amount).toFixed(2)}</td>
                        <td>${row.approved_by}</td>
                        <td>
                            <a href="javascript:void(0);" class="action-icon edit-btn" title="Edit" data-id="${row.id}"><i class="bx bx-edit"></i></a>
                            <a href="javascript:void(0);" class="action-icon delete-btn" title="Delete" data-id="${row.id}"><i class="bx bx-trash"></i></a>
                        </td>
                    `;
                    tbody.appendChild(tr);
                }
            }

            renderPagination(page, totalPages, filter, dateFrom, dateTo);
            loadingSpinner.classList.add("d-none");
        }, 500);
    }

    // Render pagination controls
    function renderPagination(currentPage, totalPages, filter = "", dateFrom = "", dateTo = "") {
        paginationContainer.innerHTML = "";
        if (totalPages <= 0) return;

        // First and Previous buttons
        paginationContainer.appendChild(createPageItem(1, "«", currentPage === 1 ? "disabled" : "", filter, dateFrom, dateTo));
        paginationContainer.appendChild(createPageItem(currentPage - 1, "‹", currentPage === 1 ? "disabled" : "", filter, dateFrom, dateTo));

        // Calculate page range to show
        let startPage = Math.max(1, currentPage - Math.floor(maxVisiblePages / 2));
        let endPage = Math.min(totalPages, startPage + maxVisiblePages - 1);

        // Adjust if we don't have enough pages
        if (endPage - startPage + 1 < maxVisiblePages) {
            startPage = Math.max(1, endPage - maxVisiblePages + 1);
        }

        // First page and ellipsis if needed
        if (startPage > 1) {
            paginationContainer.appendChild(createPageItem(1, "1", "", filter, dateFrom, dateTo));
            if (startPage > 2) {
                const li = document.createElement("li");
                li.className = "page-item disabled";
                li.innerHTML = '<span class="page-link">...</span>';
                paginationContainer.appendChild(li);
            }
        }

        // Page numbers
        for (let i = startPage; i <= endPage; i++) {
            paginationContainer.appendChild(createPageItem(i, i, i === currentPage ? "active" : "", filter, dateFrom, dateTo));
        }

        // Last page and ellipsis if needed
        if (endPage < totalPages) {
            if (endPage < totalPages - 1) {
                const li = document.createElement("li");
                li.className = "page-item disabled";
                li.innerHTML = '<span class="page-link">...</span>';
                paginationContainer.appendChild(li);
            }
            paginationContainer.appendChild(createPageItem(totalPages, totalPages, "", filter, dateFrom, dateTo));
        }

        // Next and Last buttons
        paginationContainer.appendChild(createPageItem(currentPage + 1, "›", currentPage === totalPages ? "disabled" : "", filter, dateFrom, dateTo));
        paginationContainer.appendChild(createPageItem(totalPages, "»", currentPage === totalPages ? "disabled" : "", filter, dateFrom, dateTo));
    }

    // Create a pagination item
    function createPageItem(pageNumber, label, disabledOrActive = "", filter = "", dateFrom = "", dateTo = "") {
        const li = document.createElement("li");
        li.className = `page-item ${disabledOrActive}`;
        const a = document.createElement("a");
        a.className = "page-link";
        a.href = "#";
        a.textContent = label;
        if (!["disabled", "active"].includes(disabledOrActive)) {
            a.addEventListener("click", (e) => {
                e.preventDefault();
                showPage(pageNumber, filter, dateFrom, dateTo);
            });
        }
        li.appendChild(a);
        return li;
    }

    // Perform search with text and date filters
    function performSearch() {
        const term = searchInput.value;
        const dateFrom = dateFromFilter.value;
        const dateTo = dateToFilter.value;
        showPage(1, term, dateFrom, dateTo);
    }

    // Reset all filters
    function resetFilters() {
        searchInput.value = "";
        dateFromFilter.value = "";
        dateToFilter.value = "";
        showPage(1);
    }

    // Handle entries per page change
    function handleEntriesChange() {
        rowsPerPage = parseInt(rowsPerPageElement.value);
        showPage(1, currentFilter, currentDateFrom, currentDateTo);
    }

    // Show toast notification
    function showToast(message) {
        document.getElementById("toastMessage").textContent = message;
        toast.show();
    }

    // Export to Excel function
    function exportExpenseToExcel() {
        // Show loading state
        const originalBtnHTML = exportBtn.innerHTML;
        exportBtn.innerHTML = '<i class="bx bx-loader bx-spin"></i> Exporting...';
        exportBtn.disabled = true;

        // Get filtered data
        let filteredData = [...originalData];
        
        if (currentFilter) {
            filteredData = filteredData.filter(row =>
                Object.values(row).some(val =>
                    val.toString().toLowerCase().includes(currentFilter.toLowerCase())
                )
            );
        }
        
        if (currentDateFrom || currentDateTo) {
            filteredData = filteredData.filter(row => {
                const rowDate = new Date(row.date);
                const fromDate = currentDateFrom ? new Date(currentDateFrom) : null;
                const toDate = currentDateTo ? new Date(currentDateTo) : null;
                
                if (fromDate && toDate) {
                    return rowDate >= fromDate && rowDate <= toDate;
                } else if (fromDate) {
                    return rowDate >= fromDate;
                } else if (toDate) {
                    return rowDate <= toDate;
                }
                return true;
            });
        }

        if (filteredData.length === 0) {
            showToast("No data to export!");
            exportBtn.innerHTML = originalBtnHTML;
            exportBtn.disabled = false;
            return;
        }

        // Prepare worksheet data
        const worksheetData = [
            // Headers
            ["ID", "Date", "Area", "Item", "Qty", "Unit", "Amount", "Approved By"],
            // Data rows
            ...filteredData.map(item => [
                item.id,
                item.date,
                item.area,
                item.item,
                item.qty,
                item.unit,
                `₱${parseFloat(item.amount).toFixed(2)}`,
                item.approved_by
            ])
        ];

        // Create workbook and worksheet
        const workbook = XLSX.utils.book_new();
        const worksheet = XLSX.utils.aoa_to_sheet(worksheetData);
        XLSX.utils.book_append_sheet(workbook, worksheet, "Expenses");

        // Generate file name with timestamp
        const timestamp = new Date().toISOString().replace(/[:.]/g, '-');
        const fileName = `Expenses_Report_${timestamp}.xlsx`;

        // Export to Excel
        XLSX.writeFile(workbook, fileName);

        // Restore button state
        exportBtn.innerHTML = originalBtnHTML;
        exportBtn.disabled = false;
        showToast(`Exported ${filteredData.length} records to Excel`);
    }

    // Setup edit expense functionality
    function setupEditExpense() {
        document.addEventListener("click", function(e) {
            if (e.target.closest(".edit-btn")) {
                const btn = e.target.closest(".edit-btn");
                const id = parseInt(btn.getAttribute("data-id"));
                const expense = originalData.find(item => item.id === id);
                if (expense) {
                    document.getElementById("editExpenseId").value = expense.id;
                    document.getElementById("editDate").value = expense.date;
                    document.getElementById("editArea").value = expense.area;
                    document.getElementById("editItem").value = expense.item;
                    document.getElementById("editQty").value = expense.qty;
                    document.getElementById("editUnit").value = expense.unit;
                    document.getElementById("editAmount").value = expense.amount;
                    document.getElementById("editApprovedBy").value = expense.approved_by;
                    editModal.show();
                }
            }
        });

        document.getElementById("saveEditBtn").addEventListener("click", function() {
            const id = parseInt(document.getElementById("editExpenseId").value);
            const index = originalData.findIndex(item => item.id === id);
            if (index !== -1) {
                originalData[index] = {
                    id: id,
                    date: document.getElementById("editDate").value,
                    area: document.getElementById("editArea").value,
                    item: document.getElementById("editItem").value,
                    qty: parseInt(document.getElementById("editQty").value),
                    unit: document.getElementById("editUnit").value,
                    amount: parseFloat(document.getElementById("editAmount").value).toFixed(2),
                    approved_by: document.getElementById("editApprovedBy").value
                };
                showPage(currentPage, currentFilter, currentDateFrom, currentDateTo);
                showToast("Expense updated successfully!");
                editModal.hide();
            }
        });
    }

    // Setup delete expense functionality
    function setupDeleteExpense() {
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
                showPage(Math.min(currentPage, Math.ceil(originalData.length / rowsPerPage)), 
                          currentFilter, currentDateFrom, currentDateTo);
                showToast("Expense deleted successfully!");
                deleteModal.hide();
                currentEditIndex = null;
            }
        });
    }

    // Initialize event listeners
    function initEventListeners() {
        searchButton.addEventListener("click", performSearch);
        resetButton.addEventListener("click", resetFilters);
        searchInput.addEventListener("keypress", function(e) {
            if (e.key === "Enter") performSearch();
        });
        rowsPerPageElement.addEventListener("change", handleEntriesChange);
        exportBtn.addEventListener("click", exportExpenseToExcel);
        setupEditExpense();
        setupDeleteExpense();
    }

    // Initialize the application
    function init() {
        generateFakeData();
        initEventListeners();
        
        // Set default date range (last 30 days)
        const today = new Date();
        const thirtyDaysAgo = new Date();
        thirtyDaysAgo.setDate(today.getDate() - 30);
        
        dateFromFilter.valueAsDate = thirtyDaysAgo;
        dateToFilter.valueAsDate = today;
        
        // Show first page with default filters
        showPage(1);
    }
    
    // Start the application
    document.addEventListener("DOMContentLoaded", init);
</script>

</body>
</html>