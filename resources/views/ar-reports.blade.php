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
                            <h4 class="mb-0 fw-semibold">AR Reports</h4>
                            <input type="text" id="customSearchInput" class="form-control w-25 ms-auto" placeholder="Search payments...">
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
                                        <a href="add-ar-reports.html" class="btn btn-primary" id="addNewPaymentBtn">
                                            <i class='bx bx-plus'></i> Add New Payment
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-centered table-striped dt-responsive nowrap w-100" id="datatable">
                                        <thead>
                                            <tr>
                                                <th>Customer ID</th>
                                                <th>Delivery Date</th>
                                                <th>Customer Name</th>
                                                <th>Item</th>
                                                <th>Payment Terms</th>
                                                <th>Total Bill</th>
                                                <th>Due Date</th>
                                                <th>DR Number</th>
                                                <th>Date Paid</th>
                                                <th>Amount Paid</th>
                                                <th>Payment Details</th>
                                                <th>Cheque Date</th>
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
                                <h5 class="modal-title" id="editModalLabel">Edit Payment Record</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="editForm">
                                    <input type="hidden" id="editRecordId">
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="editCustomerId" class="form-label">Customer ID</label>
                                            <input type="text" class="form-control" id="editCustomerId" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="editDeliveryDate" class="form-label">Delivery Date</label>
                                            <input type="date" class="form-control" id="editDeliveryDate" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="editCustomerName" class="form-label">Customer Name</label>
                                            <input type="text" class="form-control" id="editCustomerName" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="editItem" class="form-label">Item</label>
                                            <input type="text" class="form-control" id="editItem" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="editPaymentTerms" class="form-label">Payment Terms</label>
                                            <input type="text" class="form-control" id="editPaymentTerms" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="editTotalBill" class="form-label">Total Bill</label>
                                            <input type="number" step="0.01" class="form-control" id="editTotalBill" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="editDueDate" class="form-label">Due Date</label>
                                            <input type="date" class="form-control" id="editDueDate" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="editDrNumber" class="form-label">DR Number</label>
                                            <input type="text" class="form-control" id="editDrNumber" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="editDatePaid" class="form-label">Date Paid</label>
                                            <input type="date" class="form-control" id="editDatePaid">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="editAmountPaid" class="form-label">Amount Paid</label>
                                            <input type="number" step="0.01" class="form-control" id="editAmountPaid">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="editPaymentDetails" class="form-label">Payment Details</label>
                                            <input type="text" class="form-control" id="editPaymentDetails">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="editChequeDate" class="form-label">Cheque Date</label>
                                            <input type="date" class="form-control" id="editChequeDate">
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
                                <h5 class="modal-title" id="deleteModalLabel">Delete Payment Record</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this payment record?
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
    </script>
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

    const items = ['Product A', 'Product B', 'Product C', 'Product D', 'Product E'];
    const paymentTerms = ['30 days', '60 days', '90 days', 'COD', 'Partial Payment'];
    const paymentDetails = ['Cash', 'Check', 'Bank Transfer', 'Credit Card', 'Online Payment'];

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
            const deliveryDate = new Date();
            deliveryDate.setDate(deliveryDate.getDate() - Math.floor(Math.random() * 30));
            
            const dueDate = new Date(deliveryDate);
            const terms = paymentTerms[Math.floor(Math.random() * paymentTerms.length)];
            if (terms.includes('days')) {
                const days = parseInt(terms);
                dueDate.setDate(dueDate.getDate() + days);
            }
            
            const datePaid = new Date(dueDate);
            datePaid.setDate(datePaid.getDate() - Math.floor(Math.random() * 10));
            
            const chequeDate = new Date(datePaid);
            chequeDate.setDate(chequeDate.getDate() - Math.floor(Math.random() * 5));
            
            originalData.push({
                customerId: `CUST${String(i).padStart(4, '0')}`,
                deliveryDate: deliveryDate.toISOString().split('T')[0],
                customerName: `Customer ${i}`,
                item: items[Math.floor(Math.random() * items.length)],
                paymentTerms: terms,
                totalBill: (Math.random() * 10000 + 100).toFixed(2),
                dueDate: dueDate.toISOString().split('T')[0],
                drNumber: `DR${String(i).padStart(5, '0')}`,
                datePaid: Math.random() > 0.2 ? datePaid.toISOString().split('T')[0] : null,
                amountPaid: Math.random() > 0.2 ? (Math.random() * 10000 + 100).toFixed(2) : null,
                paymentDetails: Math.random() > 0.2 ? paymentDetails[Math.floor(Math.random() * paymentDetails.length)] : null,
                chequeDate: Math.random() > 0.5 ? chequeDate.toISOString().split('T')[0] : null
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
                tr.innerHTML = `<td colspan="13" class="text-center">No matching records found</td>`;
                tbody.appendChild(tr);
            } else {
                for (let i = start; i < end; i++) {
                    const row = filteredData[i];
                    const tr = document.createElement("tr");
                    tr.innerHTML = `
                        <td>${row.customerId}</td>
                        <td>${row.deliveryDate}</td>
                        <td>${row.customerName}</td>
                        <td>${row.item}</td>
                        <td>${row.paymentTerms}</td>
                        <td>₱${row.totalBill}</td>
                        <td>${row.dueDate}</td>
                        <td>${row.drNumber}</td>
                        <td>${row.datePaid || '-'}</td>
                        <td>₱${row.amountPaid}</td>
                        <td>${row.paymentDetails || '-'}</td>
                        <td>${row.chequeDate || '-'}</td>
                        <td>
                            <a href="javascript:void(0);" class="action-icon edit-btn" title="Edit" data-id="${row.customerId}"><i class="bx bx-edit"></i></a>
                            <a href="javascript:void(0);" class="action-icon delete-btn" title="Delete" data-id="${row.customerId}"><i class="bx bx-trash"></i></a>
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

    function setupEditRecord() {
        document.addEventListener("click", function(e) {
            if (e.target.closest(".edit-btn")) {
                const btn = e.target.closest(".edit-btn");
                const id = btn.getAttribute("data-id");
                const record = originalData.find(item => item.customerId === id);
                if (record) {
                    document.getElementById("editRecordId").value = record.customerId;
                    document.getElementById("editCustomerId").value = record.customerId;
                    document.getElementById("editDeliveryDate").value = record.deliveryDate;
                    document.getElementById("editCustomerName").value = record.customerName;
                    document.getElementById("editItem").value = record.item;
                    document.getElementById("editPaymentTerms").value = record.paymentTerms;
                    document.getElementById("editTotalBill").value = record.totalBill;
                    document.getElementById("editDueDate").value = record.dueDate;
                    document.getElementById("editDrNumber").value = record.drNumber;
                    document.getElementById("editDatePaid").value = record.datePaid || '';
                    document.getElementById("editAmountPaid").value = record.amountPaid || '';
                    document.getElementById("editPaymentDetails").value = record.paymentDetails || '';
                    document.getElementById("editChequeDate").value = record.chequeDate || '';
                    editModal.show();
                }
            }
        });

        document.getElementById("saveEditBtn").addEventListener("click", function() {
            const id = document.getElementById("editRecordId").value;
            const index = originalData.findIndex(item => item.customerId === id);
            if (index !== -1) {
                originalData[index] = {
                    customerId: id,
                    deliveryDate: document.getElementById("editDeliveryDate").value,
                    customerName: document.getElementById("editCustomerName").value,
                    item: document.getElementById("editItem").value,
                    paymentTerms: document.getElementById("editPaymentTerms").value,
                    totalBill: document.getElementById("editTotalBill").value,
                    dueDate: document.getElementById("editDueDate").value,
                    drNumber: document.getElementById("editDrNumber").value,
                    datePaid: document.getElementById("editDatePaid").value || null,
                    amountPaid: document.getElementById("editAmountPaid").value || null,
                    paymentDetails: document.getElementById("editPaymentDetails").value || null,
                    chequeDate: document.getElementById("editChequeDate").value || null
                };
                showPage(currentPage, currentFilter);
                showToast("Payment record updated successfully!");
                editModal.hide();
            }
        });
    }

    function setupDeleteRecord() {
        document.addEventListener("click", function(e) {
            if (e.target.closest(".delete-btn")) {
                const btn = e.target.closest(".delete-btn");
                const id = btn.getAttribute("data-id");
                const record = originalData.find(item => item.customerId === id);
                if (record) {
                    document.getElementById("deleteCustomerName").textContent = record.customerName;
                    currentEditIndex = originalData.findIndex(item => item.customerId === id);
                    deleteModal.show();
                }
            }
        });

        document.getElementById("confirmDeleteBtn").addEventListener("click", function() {
            if (currentEditIndex !== null && currentEditIndex !== -1) {
                originalData.splice(currentEditIndex, 1);
                showPage(Math.min(currentPage, Math.ceil(originalData.length / rowsPerPage)), currentFilter);
                showToast("Payment record deleted successfully!");
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
        setupEditRecord();
        setupDeleteRecord();
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