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
                                <h4 class="mb-0 fw-semibold">Expenses Report</h4>
                                <input type="text" id="customSearchInput" class="form-control w-25 ms-auto" placeholder="Search expenses...">
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
                                        <button id="exportExpenseExcelBtn" class="btn btn-success me-2">
                                            <i class='bx bx-export'></i> Export to Excel
                                        </button>
                                            <a href="add-expenses.html" class="btn btn-primary" id="addNewExpenseBtn">
                                                <i class='bx bx-plus'></i> Add New Expense
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
                                                    <th>Category</th>
                                                    <th>Electric and Water bills</th>
                                                    <th>Particular</th>
                                                    <th>Payment Terms</th>
                                                    <th>Office supplies</th>
                                                    <th>Amount</th>
                                                    <th>Balance</th>
                                                    <th>Approved By</th>
                                                    <th>Truck Maintenance/repair</th>
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
                                                <label for="editCategory" class="form-label">Category</label>
                                                <input type="text" class="form-control" id="editCategory" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="editElectricWaterBills" class="form-label">Electric and Water bills</label>
                                                <input type="text" class="form-control" id="editElectricWaterBills">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="editParticular" class="form-label">Particular</label>
                                                <input type="text" class="form-control" id="editParticular">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="editPaymentTerms" class="form-label">Payment Terms</label>
                                                <input type="text" class="form-control" id="editPaymentTerms">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="editOfficeSupplies" class="form-label">Office supplies</label>
                                                <input type="text" class="form-control" id="editOfficeSupplies">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="editAmount" class="form-label">Amount</label>
                                                <input type="number" class="form-control" id="editAmount" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="editBalance" class="form-label">Balance</label>
                                                <input type="number" class="form-control" id="editBalance">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="editApprovedBy" class="form-label">Approved By</label>
                                                <input type="text" class="form-control" id="editApprovedBy">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="editTruckMaintenance" class="form-label">Truck Maintenance/repair</label>
                                                <input type="text" class="form-control" id="editTruckMaintenance">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <!-- custom script here -->
    <script>
    const rowsPerPageElement = document.getElementById("entriesSelect");
    let rowsPerPage = parseInt(rowsPerPageElement.value);
    const totalRows = 100;
    const maxVisiblePages = 5;
    const tbody = document.getElementById("table-body");
    const paginationContainer = document.getElementById("pagination");
    const searchInput = document.getElementById("customSearchInput");
    const searchButton = document.getElementById("customSearchBtn");
    const loadingSpinner = document.getElementById("loading-spinner");

    const expenseCategories = ['Utilities', 'Office Supplies', 'Vehicle Maintenance', 'Rent', 'Insurance'];
    const paymentTerms = ['Net 15', 'Net 30', 'Due on Receipt', '50% Advance', 'Full Advance'];
    const approvers = ['John Smith', 'Sarah Johnson', 'Michael Brown', 'Emily Davis', 'David Wilson'];

    const editModal = new bootstrap.Modal(document.getElementById('editModal'));
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
    const toast = new bootstrap.Toast(document.getElementById('successToast'));

    let originalData = [];
    let currentEditIndex = null;
    let currentPage = 1;
    let currentFilter = "";
    // Add this function to your existing script
function exportExpenseToExcel() {
    // Show loading state
    const exportBtn = document.getElementById('exportExpenseExcelBtn');
    const originalBtnHTML = exportBtn.innerHTML;
    exportBtn.innerHTML = '<i class="bx bx-loader bx-spin"></i> Exporting...';
    exportBtn.disabled = true;

    // Get filtered data (all records matching current filter)
    const filteredData = currentFilter
        ? originalData.filter(row =>
            Object.values(row).some(val =>
                val.toString().toLowerCase().includes(currentFilter.toLowerCase())
            )
        )
        : originalData;

    if (filteredData.length === 0) {
        showToast("No data to export!");
        exportBtn.innerHTML = originalBtnHTML;
        exportBtn.disabled = false;
        return;
    }

    // Prepare worksheet data
    const worksheetData = [
        // Headers
        [
            "ID", "Date", "Category", "Electric and Water bills", 
            "Particular", "Payment Terms", "Office supplies", 
            "Amount", "Balance", "Approved By", 
            "Truck Maintenance/repair"
        ],
        // Data rows
        ...filteredData.map(item => [
            item.id,
            item.date,
            item.category,
            `₱${item.electric_water_bills}`,
            item.particular,
            item.payment_terms,
            `₱${item.office_supplies}`,
            `₱${item.amount}`,
            `₱${item.balance}`,
            item.approved_by,
            `₱${item.truck_maintenance}`
        ])
    ];

    // Create workbook and worksheet
    const workbook = XLSX.utils.book_new();
    const worksheet = XLSX.utils.aoa_to_sheet(worksheetData);
    XLSX.utils.book_append_sheet(workbook, worksheet, "Expenses");

    // Generate file name with timestamp
    const timestamp = new Date().toISOString().replace(/[:.]/g, '-');
    const fileName = `Expenses_${currentFilter || 'all'}_${timestamp}.xlsx`;

    // Export to Excel
    XLSX.writeFile(workbook, fileName);

    // Restore button state
    exportBtn.innerHTML = originalBtnHTML;
    exportBtn.disabled = false;
    showToast(`Exported ${filteredData.length} expense records to Excel`);
}

// Add this to your initEventListeners function:
function initEventListeners() {
    searchButton.addEventListener("click", performSearch);
    searchInput.addEventListener("keypress", function(e) {
        if (e.key === "Enter") performSearch();
    });
    rowsPerPageElement.addEventListener("change", handleEntriesChange);
    document.getElementById('exportExpenseExcelBtn').addEventListener('click', exportExpenseToExcel);
    setupEditExpense();
    setupDeleteExpense();
}

    function generateFakeData() {
        originalData = [];
        for (let i = 1; i <= totalRows; i++) {
            const randomDay = String(Math.floor(Math.random() * 28) + 1).padStart(2, '0');
            const randomMonth = String(Math.floor(Math.random() * 12) + 1).padStart(2, '0');
            const randomAmount = (Math.random() * 10000).toFixed(2);
            const randomBalance = (Math.random() * 5000).toFixed(2);
            
            originalData.push({
                id: i,
                date: `2024-${randomMonth}-${randomDay}`,
                category: expenseCategories[Math.floor(Math.random() * expenseCategories.length)],
                electric_water_bills: Math.random() > 0.7 ? (Math.random() * 2000).toFixed(2) : '0.00',
                particular: `Expense for ${['March', 'April', 'May', 'June'][Math.floor(Math.random() * 4)]} ${2023 + Math.floor(Math.random() * 2)}`,
                payment_terms: paymentTerms[Math.floor(Math.random() * paymentTerms.length)],
                office_supplies: Math.random() > 0.5 ? (Math.random() * 500).toFixed(2) : '0.00',
                amount: randomAmount,
                balance: randomBalance,
                approved_by: approvers[Math.floor(Math.random() * approvers.length)],
                truck_maintenance: Math.random() > 0.6 ? (Math.random() * 3000).toFixed(2) : '0.00'
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
                tr.innerHTML = `<td colspan="12" class="text-center">No matching records found</td>`;
                tbody.appendChild(tr);
            } else {
                for (let i = start; i < end; i++) {
                    const row = filteredData[i];
                    const tr = document.createElement("tr");
                    tr.innerHTML = `
                        <td>${row.id}</td>
                        <td>${row.date}</td>
                        <td>${row.category}</td>
                        <td>₱${row.electric_water_bills}</td>
                        <td>${row.particular}</td>
                        <td>${row.payment_terms}</td>
                        <td>₱${row.office_supplies}</td>
                        <td>₱${row.amount}</td>
                        <td>₱${row.balance}</td>
                        <td>${row.approved_by}</td>
                        <td>₱${row.truck_maintenance}</td>
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

    function setupEditExpense() {
        document.addEventListener("click", function(e) {
            if (e.target.closest(".edit-btn")) {
                const btn = e.target.closest(".edit-btn");
                const id = parseInt(btn.getAttribute("data-id"));
                const expense = originalData.find(item => item.id === id);
                if (expense) {
                    document.getElementById("editExpenseId").value = expense.id;
                    document.getElementById("editDate").value = expense.date;
                    document.getElementById("editCategory").value = expense.category;
                    document.getElementById("editElectricWaterBills").value = expense.electric_water_bills;
                    document.getElementById("editParticular").value = expense.particular;
                    document.getElementById("editPaymentTerms").value = expense.payment_terms;
                    document.getElementById("editOfficeSupplies").value = expense.office_supplies;
                    document.getElementById("editAmount").value = expense.amount;
                    document.getElementById("editBalance").value = expense.balance;
                    document.getElementById("editApprovedBy").value = expense.approved_by;
                    document.getElementById("editTruckMaintenance").value = expense.truck_maintenance;
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
                    category: document.getElementById("editCategory").value,
                    electric_water_bills: document.getElementById("editElectricWaterBills").value,
                    particular: document.getElementById("editParticular").value,
                    payment_terms: document.getElementById("editPaymentTerms").value,
                    office_supplies: document.getElementById("editOfficeSupplies").value,
                    amount: document.getElementById("editAmount").value,
                    balance: document.getElementById("editBalance").value,
                    approved_by: document.getElementById("editApprovedBy").value,
                    truck_maintenance: document.getElementById("editTruckMaintenance").value
                };
                showPage(currentPage, currentFilter);
                showToast("Expense updated successfully!");
                editModal.hide();
            }
        });
    }

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
                showPage(Math.min(currentPage, Math.ceil(originalData.length / rowsPerPage)), currentFilter);
                showToast("Expense deleted successfully!");
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
        setupEditExpense();
        setupDeleteExpense();
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