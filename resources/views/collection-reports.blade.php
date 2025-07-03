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
                                   <h4 class="mb-0 fw-semibold">Collection Reports</h4>
                                   <input type="text" id="collectionSearchInput" class="form-control w-25 ms-auto" placeholder="Search collections...">
                                   <button class="btn btn-primary" id="collectionSearchBtn">Search</button>
                              </div>
                         </div>
                         </div>

                         <div class="row">
                         <div class="col-12">
                              <div class="card">
                                   <div class="card-header">
                                        <div class="row align-items-center">
                                             <div class="col-md-6 d-flex align-items-center gap-2">
                                             <label for="collectionEntriesSelect" class="mb-0">Show</label>
                                             <select id="collectionEntriesSelect" class="form-select form-select-sm w-auto">
                                                  <option value="10" selected>10</option>
                                                  <option value="25">25</option>
                                                  <option value="50">50</option>
                                                  <option value="100">100</option>
                                             </select>
                                             <span class="ms-2">entries</span>
                                             </div>
                                             
                                             <div class="col-md-6 d-flex justify-content-end">
                                             <button id="exportCollectionExcelBtn" class="btn btn-success me-2">
                                                  <i class='bx bx-export'></i> Export to Excel
                                             </button>
                                             <a href="add-collection.html" class="btn btn-primary">
                                                  <i class='bx bx-plus'></i> Add New Collection
                                             </a>
                                             </div>
                                        </div>
                                   </div>
                                   <div class="card-body">
                                        <div class="table-responsive">
                                             <table class="table table-centered table-striped dt-responsive nowrap w-100" id="collectionDatatable">
                                             <thead>
                                                  <tr>
                                                       <th>Collector ID</th>
                                                       <th>Collector Name</th>
                                                       <th>Area</th>
                                                       <th>Collect Type</th>
                                                       <th>Customer Name</th>
                                                       <th>Delivery Date</th>
                                                       <th>Payment Method</th>
                                                       <th>CNTR Deposit</th>
                                                       <th>CNTR Refund</th>
                                                       <th>Total Amount</th>
                                                       <th>Gcash Number</th>
                                                       <th>Checked By</th>
                                                       <th>Approved By</th>
                                                       <th style="width: 100px;">Action</th>
                                                  </tr>
                                             </thead>
                                             <tbody id="collection-table-body">
                                                  <!-- Data will be injected by JavaScript -->
                                             </tbody>
                                             </table>
                                             <div id="collection-loading-spinner" class="d-none text-center mt-3">
                                             <div class="spinner-border text-primary" role="status">
                                                  <span class="visually-hidden">Loading...</span>
                                             </div>
                                             <p class="mt-2">Loading data, please wait...</p>
                                             </div>
                                             <nav aria-label="Page navigation">
                                             <ul class="pagination justify-content-center mt-3" id="collection-pagination">
                                                  <!-- Buttons will be injected by JS -->
                                             </ul>
                                             </nav>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         </div>

                         <!-- Edit Modal for Collection -->
                         <div class="modal fade" id="editCollectionModal" tabindex="-1" aria-labelledby="editCollectionModalLabel" aria-hidden="true">
                         <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                   <div class="modal-header">
                                        <h5 class="modal-title" id="editCollectionModalLabel">Edit Collection</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                   </div>
                                   <div class="modal-body">
                                        <form id="editCollectionForm">
                                             <input type="hidden" id="editCollectionId">
                                             <div class="row">
                                             <div class="col-md-6 mb-3">
                                                  <label for="editCollectorName" class="form-label">Collector Name</label>
                                                  <input type="text" class="form-control" id="editCollectorName" required>
                                             </div>
                                             <div class="col-md-6 mb-3">
                                                  <label for="editArea" class="form-label">Area</label>
                                                  <input type="text" class="form-control" id="editArea" required>
                                             </div>
                                             </div>
                                             <div class="row">
                                             <div class="col-md-6 mb-3">
                                                  <label for="editCollectType" class="form-label">Collect Type</label>
                                                  <select class="form-select" id="editCollectType" required>
                                                       <option value="daily">Daily</option>
                                                       <option value="weekly">Weekly</option>
                                                       <option value="monthly">Monthly</option>
                                                       <option value="special">Special</option>
                                                  </select>
                                             </div>
                                             <div class="col-md-6 mb-3">
                                                  <label for="editCustomerName" class="form-label">Customer Name</label>
                                                  <input type="text" class="form-control" id="editCustomerName" required>
                                             </div>
                                             </div>
                                             <div class="row">
                                             <div class="col-md-6 mb-3">
                                                  <label for="editDeliveryDate" class="form-label">Delivery Date</label>
                                                  <input type="date" class="form-control" id="editDeliveryDate" required>
                                             </div>
                                             <div class="col-md-6 mb-3">
                                                  <label for="editPaymentMethod" class="form-label">Payment Method</label>
                                                  <select class="form-select" id="editPaymentMethod" required>
                                                       <option value="cash">Cash</option>
                                                       <option value="gcash">GCash</option>
                                                       <option value="bank_transfer">Bank Transfer</option>
                                                       <option value="cheque">Cheque</option>
                                                  </select>
                                             </div>
                                             </div>
                                             <!-- Cheque Details Section (Hidden by default) -->
                                             <div class="row" id="chequeDetailsSection" style="display: none;">
                                             <div class="col-md-3 mb-3">
                                                  <label for="editBankName" class="form-label">Bank Name</label>
                                                  <input type="text" class="form-control" id="editBankName">
                                             </div>
                                             <div class="col-md-3 mb-3">
                                                  <label for="editBankBranch" class="form-label">Bank Branch</label>
                                                  <input type="text" class="form-control" id="editBankBranch">
                                             </div>
                                             <div class="col-md-3 mb-3">
                                                  <label for="editChequeNumber" class="form-label">Cheque Number</label>
                                                  <input type="text" class="form-control" id="editChequeNumber">
                                             </div>
                                             <div class="col-md-3 mb-3">
                                                  <label for="editChequeDate" class="form-label">Cheque Date</label>
                                                  <input type="date" class="form-control" id="editChequeDate">
                                             </div>
                                             </div>
                                             <div class="row">
                                             <div class="col-md-4 mb-3">
                                                  <label for="editCntrDeposit" class="form-label">CNTR Deposit</label>
                                                  <input type="number" class="form-control" id="editCntrDeposit" required>
                                             </div>
                                             <div class="col-md-4 mb-3">
                                                  <label for="editCntrRefund" class="form-label">CNTR Refund</label>
                                                  <input type="number" class="form-control" id="editCntrRefund" required>
                                             </div>
                                             <div class="col-md-4 mb-3">
                                                  <label for="editTotalAmount" class="form-label">Total Amount</label>
                                                  <input type="number" class="form-control" id="editTotalAmount" required>
                                             </div>
                                             </div>
                                             <div class="row">
                                             <div class="col-md-6 mb-3">
                                                  <label for="editGcashNumber" class="form-label">GCash Number</label>
                                                  <input type="text" class="form-control" id="editGcashNumber">
                                             </div>
                                             <div class="col-md-6 mb-3">
                                                  <label for="editCheckedBy" class="form-label">Checked By</label>
                                                  <input type="text" class="form-control" id="editCheckedBy" required>
                                             </div>
                                             </div>
                                             <div class="row">
                                             <div class="col-md-6 mb-3">
                                                  <label for="editApprovedBy" class="form-label">Approved By</label>
                                                  <input type="text" class="form-control" id="editApprovedBy" required>
                                             </div>
                                             </div>
                                        </form>
                                   </div>
                                   <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-primary" id="saveCollectionEditBtn">Save Changes</button>
                                   </div>
                              </div>
                         </div>
                         </div>

                         <!-- Cheque Details Modal -->
                         <div class="modal fade" id="chequeDetailsModal" tabindex="-1" aria-labelledby="chequeDetailsModalLabel" aria-hidden="true">
                         <div class="modal-dialog">
                              <div class="modal-content">
                                   <div class="modal-header">
                                        <h5 class="modal-title" id="chequeDetailsModalLabel">Cheque Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                   </div>
                                   <div class="modal-body">
                                        <div class="mb-3">
                                             <label class="form-label fw-bold">Bank Name:</label>
                                             <p id="viewBankName" class="form-control-static">-</p>
                                        </div>
                                        <div class="mb-3">
                                             <label class="form-label fw-bold">Bank Branch:</label>
                                             <p id="viewBankBranch" class="form-control-static">-</p>
                                        </div>
                                        <div class="mb-3">
                                             <label class="form-label fw-bold">Cheque Number:</label>
                                             <p id="viewChequeNumber" class="form-control-static">-</p>
                                        </div>
                                        <div class="mb-3">
                                             <label class="form-label fw-bold">Cheque Date:</label>
                                             <p id="viewChequeDate" class="form-control-static">-</p>
                                        </div>
                                   </div>
                                   <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                   </div>
                              </div>
                         </div>
                         </div>

                         <!-- Delete Modal for Collection -->
                         <div class="modal fade" id="deleteCollectionModal" tabindex="-1" aria-labelledby="deleteCollectionModalLabel" aria-hidden="true">
                         <div class="modal-dialog">
                              <div class="modal-content">
                                   <div class="modal-header">
                                        <h5 class="modal-title" id="deleteCollectionModalLabel">Delete Collection</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                   </div>
                                   <div class="modal-body">
                                        Are you sure you want to delete this collection record?
                                        <p class="text-danger mt-2">This action cannot be undone.</p>
                                   </div>
                                   <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-danger" id="confirmCollectionDeleteBtn">Delete</button>
                                   </div>
                              </div>
                         </div>
                         </div>

                         <!-- Toast Notification -->
                         <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999;">
                         <div id="collectionSuccessToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
                              <div class="d-flex">
                                   <div class="toast-body" id="collectionToastMessage">
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
// Collection List JavaScript
const collectionRowsPerPageElement = document.getElementById("collectionEntriesSelect");
let collectionRowsPerPage = parseInt(collectionRowsPerPageElement.value);
const collectionTotalRows = 100;
const collectionMaxVisiblePages = 5;
const collectionTbody = document.getElementById("collection-table-body");
const collectionPaginationContainer = document.getElementById("collection-pagination");
const collectionSearchInput = document.getElementById("collectionSearchInput");
const collectionSearchButton = document.getElementById("collectionSearchBtn");
const collectionLoadingSpinner = document.getElementById("collection-loading-spinner");

const collectTypes = ['daily', 'weekly', 'monthly', 'special'];
const paymentMethods = ['cash', 'gcash', 'bank_transfer', 'cheque'];

const editCollectionModal = new bootstrap.Modal(document.getElementById('editCollectionModal'));
const deleteCollectionModal = new bootstrap.Modal(document.getElementById('deleteCollectionModal'));
const chequeDetailsModal = new bootstrap.Modal(document.getElementById('chequeDetailsModal'));
const collectionToast = new bootstrap.Toast(document.getElementById('collectionSuccessToast'));

let collectionOriginalData = [];
let currentCollectionEditIndex = null;
let currentCollectionPage = 1;
let currentCollectionFilter = "";

function generateFakeCollectionData() {
    collectionOriginalData = [];
    for (let i = 1; i <= collectionTotalRows; i++) {
        const randomCollectType = collectTypes[Math.floor(Math.random() * collectTypes.length)];
        const randomPaymentMethod = paymentMethods[Math.floor(Math.random() * paymentMethods.length)];
        const randomDay = String(Math.floor(Math.random() * 28) + 1).padStart(2, '0');
        const randomMonth = String(Math.floor(Math.random() * 12) + 1).padStart(2, '0');
        
        // Only add cheque details if payment method is cheque
        const isCheque = randomPaymentMethod === 'cheque';
        
        collectionOriginalData.push({
            id: i,
            collector_name: `Collector ${i}`,
            area: `Area ${Math.floor(i / 10) + 1}`,
            collect_type: randomCollectType,
            customer_name: `Customer ${i}`,
            delivery_date: `2024-${randomMonth}-${randomDay}`,
            payment_method: randomPaymentMethod,
            cntr_deposit: (Math.random() * 1000).toFixed(2),
            cntr_refund: (Math.random() * 500).toFixed(2),
            total_amount: (Math.random() * 2000).toFixed(2),
            gcash_number: randomPaymentMethod === 'gcash' ? `09${Math.floor(100000000 + Math.random() * 900000000)}` : '',
            checked_by: `Supervisor ${Math.floor(i / 20) + 1}`,
            approved_by: `Manager ${Math.floor(i / 30) + 1}`,
            // Cheque details (only for cheque payments)
            bank_name: isCheque ? `Bank ${Math.floor(Math.random() * 5) + 1}` : '',
            bank_branch: isCheque ? `Branch ${Math.floor(Math.random() * 10) + 1}` : '',
            cheque_number: isCheque ? `CHQ${Math.floor(1000 + Math.random() * 9000)}` : '',
            cheque_date: isCheque ? `2024-${randomMonth}-${randomDay}` : ''
        });
    }
}

function showCollectionPage(page, filter = "") {
    collectionTbody.innerHTML = "";
    collectionLoadingSpinner.classList.remove("d-none");
    currentCollectionPage = page;
    currentCollectionFilter = filter;

    setTimeout(() => {
        const filteredData = filter
            ? collectionOriginalData.filter(row =>
                Object.values(row).some(val =>
                    val.toString().toLowerCase().includes(filter.toLowerCase())
                )
            )
            : collectionOriginalData;

        const totalPages = Math.ceil(filteredData.length / collectionRowsPerPage);
        const start = (page - 1) * collectionRowsPerPage;
        const end = Math.min(start + collectionRowsPerPage, filteredData.length);

        if (filteredData.length === 0) {
            const tr = document.createElement("tr");
            tr.innerHTML = `<td colspan="14" class="text-center">No matching records found</td>`;
            collectionTbody.appendChild(tr);
        } else {
            for (let i = start; i < end; i++) {
                const row = filteredData[i];
                const tr = document.createElement("tr");
                
                // Add view cheque button if payment method is cheque
                const paymentMethodCell = row.payment_method === 'cheque' 
                    ? `<td>${row.payment_method} <a href="javascript:void(0);" class="ms-1 view-cheque-btn" title="View Cheque Details" data-id="${row.id}"><i class="bx bx-show"></i></a></td>`
                    : `<td>${row.payment_method}</td>`;
                
                tr.innerHTML = `
                    <td>${row.id}</td>
                    <td>${row.collector_name}</td>
                    <td>${row.area}</td>
                    <td>${row.collect_type}</td>
                    <td>${row.customer_name}</td>
                    <td>${row.delivery_date}</td>
                    ${paymentMethodCell}
                    <td>₱${row.cntr_deposit}</td>
                    <td>₱${row.cntr_refund}</td>
                    <td>₱${row.total_amount}</td>
                    <td>${row.gcash_number || 'N/A'}</td>
                    <td>${row.checked_by}</td>
                    <td>${row.approved_by}</td>
                    <td>
                        <a href="javascript:void(0);" class="action-icon collection-edit-btn" title="Edit" data-id="${row.id}"><i class="bx bx-edit"></i></a>
                        <a href="javascript:void(0);" class="action-icon collection-delete-btn" title="Delete" data-id="${row.id}"><i class="bx bx-trash"></i></a>
                    </td>
                `;
                collectionTbody.appendChild(tr);
            }
        }

        renderCollectionPagination(page, totalPages, filter);
        collectionLoadingSpinner.classList.add("d-none");
        
        // Add event listeners for view cheque buttons
        document.querySelectorAll('.view-cheque-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const id = parseInt(this.getAttribute('data-id'));
                const collection = collectionOriginalData.find(item => item.id === id);
                if (collection && collection.payment_method === 'cheque') {
                    document.getElementById('viewBankName').textContent = collection.bank_name || '-';
                    document.getElementById('viewBankBranch').textContent = collection.bank_branch || '-';
                    document.getElementById('viewChequeNumber').textContent = collection.cheque_number || '-';
                    document.getElementById('viewChequeDate').textContent = collection.cheque_date || '-';
                    chequeDetailsModal.show();
                }
            });
        });
    }, 500);
}

function renderCollectionPagination(currentPage, totalPages, filter = "") {
    collectionPaginationContainer.innerHTML = "";
    if (totalPages <= 0) return;

    collectionPaginationContainer.appendChild(createCollectionPageItem(1, "«", currentPage === 1 ? "disabled" : ""));
    collectionPaginationContainer.appendChild(createCollectionPageItem(currentPage - 1, "‹", currentPage === 1 ? "disabled" : ""));

    let startPage = Math.max(1, currentPage - Math.floor(collectionMaxVisiblePages / 2));
    let endPage = Math.min(totalPages, startPage + collectionMaxVisiblePages - 1);

    if (endPage - startPage + 1 < collectionMaxVisiblePages) {
        startPage = Math.max(1, endPage - collectionMaxVisiblePages + 1);
    }

    if (startPage > 1) {
        collectionPaginationContainer.appendChild(createCollectionPageItem(1, "1"));
        if (startPage > 2) {
            const li = document.createElement("li");
            li.className = "page-item disabled";
            li.innerHTML = '<span class="page-link">...</span>';
            collectionPaginationContainer.appendChild(li);
        }
    }

    for (let i = startPage; i <= endPage; i++) {
        collectionPaginationContainer.appendChild(createCollectionPageItem(i, i, i === currentPage ? "active" : ""));
    }

    if (endPage < totalPages) {
        if (endPage < totalPages - 1) {
            const li = document.createElement("li");
            li.className = "page-item disabled";
            li.innerHTML = '<span class="page-link">...</span>';
            collectionPaginationContainer.appendChild(li);
        }
        collectionPaginationContainer.appendChild(createCollectionPageItem(totalPages, totalPages));
    }

    collectionPaginationContainer.appendChild(createCollectionPageItem(currentPage + 1, "›", currentPage === totalPages ? "disabled" : ""));
    collectionPaginationContainer.appendChild(createCollectionPageItem(totalPages, "»", currentPage === totalPages ? "disabled" : ""));
}

function createCollectionPageItem(pageNumber, label, disabledOrActive = "") {
    const li = document.createElement("li");
    li.className = `page-item ${disabledOrActive}`;
    const a = document.createElement("a");
    a.className = "page-link";
    a.href = "#";
    a.textContent = label;
    if (!["disabled", "active"].includes(disabledOrActive)) {
        a.addEventListener("click", (e) => {
            e.preventDefault();
            showCollectionPage(pageNumber, currentCollectionFilter);
        });
    }
    li.appendChild(a);
    return li;
}

function performCollectionSearch() {
    const term = collectionSearchInput.value;
    showCollectionPage(1, term);
}

function handleCollectionEntriesChange() {
    collectionRowsPerPage = parseInt(collectionRowsPerPageElement.value);
    showCollectionPage(1, currentCollectionFilter);
}

function showCollectionToast(message) {
    document.getElementById("collectionToastMessage").textContent = message;
    collectionToast.show();
}

function setupEditCollection() {
    // Toggle cheque details section based on payment method
    document.getElementById('editPaymentMethod').addEventListener('change', function() {
        const chequeDetailsSection = document.getElementById('chequeDetailsSection');
        if (this.value === 'cheque') {
            chequeDetailsSection.style.display = 'flex';
        } else {
            chequeDetailsSection.style.display = 'none';
        }
    });

    document.addEventListener("click", function(e) {
        if (e.target.closest(".collection-edit-btn")) {
            const btn = e.target.closest(".collection-edit-btn");
            const id = parseInt(btn.getAttribute("data-id"));
            const collection = collectionOriginalData.find(item => item.id === id);
            if (collection) {
                document.getElementById("editCollectionId").value = collection.id;
                document.getElementById("editCollectorName").value = collection.collector_name;
                document.getElementById("editArea").value = collection.area;
                document.getElementById("editCollectType").value = collection.collect_type;
                document.getElementById("editCustomerName").value = collection.customer_name;
                document.getElementById("editDeliveryDate").value = collection.delivery_date;
                document.getElementById("editPaymentMethod").value = collection.payment_method;
                document.getElementById("editCntrDeposit").value = collection.cntr_deposit;
                document.getElementById("editCntrRefund").value = collection.cntr_refund;
                document.getElementById("editTotalAmount").value = collection.total_amount;
                document.getElementById("editGcashNumber").value = collection.gcash_number;
                document.getElementById("editCheckedBy").value = collection.checked_by;
                document.getElementById("editApprovedBy").value = collection.approved_by;
                
                // Set cheque details if payment method is cheque
                if (collection.payment_method === 'cheque') {
                    document.getElementById('chequeDetailsSection').style.display = 'flex';
                    document.getElementById('editBankName').value = collection.bank_name || '';
                    document.getElementById('editBankBranch').value = collection.bank_branch || '';
                    document.getElementById('editChequeNumber').value = collection.cheque_number || '';
                    document.getElementById('editChequeDate').value = collection.cheque_date || '';
                } else {
                    document.getElementById('chequeDetailsSection').style.display = 'none';
                }
                
                editCollectionModal.show();
            }
        }
    });

    document.getElementById("saveCollectionEditBtn").addEventListener("click", function() {
        const id = parseInt(document.getElementById("editCollectionId").value);
        const index = collectionOriginalData.findIndex(item => item.id === id);
        if (index !== -1) {
            const isCheque = document.getElementById("editPaymentMethod").value === 'cheque';
            
            collectionOriginalData[index] = {
                id: id,
                collector_name: document.getElementById("editCollectorName").value,
                area: document.getElementById("editArea").value,
                collect_type: document.getElementById("editCollectType").value,
                customer_name: document.getElementById("editCustomerName").value,
                delivery_date: document.getElementById("editDeliveryDate").value,
                payment_method: document.getElementById("editPaymentMethod").value,
                cntr_deposit: document.getElementById("editCntrDeposit").value,
                cntr_refund: document.getElementById("editCntrRefund").value,
                total_amount: document.getElementById("editTotalAmount").value,
                gcash_number: document.getElementById("editGcashNumber").value,
                checked_by: document.getElementById("editCheckedBy").value,
                approved_by: document.getElementById("editApprovedBy").value,
                // Cheque details
                bank_name: isCheque ? document.getElementById("editBankName").value : '',
                bank_branch: isCheque ? document.getElementById("editBankBranch").value : '',
                cheque_number: isCheque ? document.getElementById("editChequeNumber").value : '',
                cheque_date: isCheque ? document.getElementById("editChequeDate").value : ''
            };
            showCollectionPage(currentCollectionPage, currentCollectionFilter);
            showCollectionToast("Collection updated successfully!");
            editCollectionModal.hide();
        }
    });
}

function setupDeleteCollection() {
    document.addEventListener("click", function(e) {
        if (e.target.closest(".collection-delete-btn")) {
            const btn = e.target.closest(".collection-delete-btn");
            const id = parseInt(btn.getAttribute("data-id"));
            currentCollectionEditIndex = collectionOriginalData.findIndex(item => item.id === id);
            deleteCollectionModal.show();
        }
    });

    document.getElementById("confirmCollectionDeleteBtn").addEventListener("click", function() {
        if (currentCollectionEditIndex !== null && currentCollectionEditIndex !== -1) {
            collectionOriginalData.splice(currentCollectionEditIndex, 1);
            showCollectionPage(Math.min(currentCollectionPage, Math.ceil(collectionOriginalData.length / collectionRowsPerPage)), currentCollectionFilter);
            showCollectionToast("Collection deleted successfully!");
            deleteCollectionModal.hide();
            currentCollectionEditIndex = null;
        }
    });
}

function exportCollectionToExcel() {
    // Show loading state
    const exportBtn = document.getElementById('exportCollectionExcelBtn');
    const originalBtnHTML = exportBtn.innerHTML;
    exportBtn.innerHTML = '<i class="bx bx-loader bx-spin"></i> Exporting...';
    exportBtn.disabled = true;

    // Get filtered data (all records matching current filter)
    const filteredData = currentCollectionFilter
        ? collectionOriginalData.filter(row =>
            Object.values(row).some(val =>
                val.toString().toLowerCase().includes(currentCollectionFilter.toLowerCase())
            )
        )
        : collectionOriginalData;

    if (filteredData.length === 0) {
        showCollectionToast("No data to export!");
        exportBtn.innerHTML = originalBtnHTML;
        exportBtn.disabled = false;
        return;
    }

    // Prepare worksheet data
    const worksheetData = [
        // Headers
        [
            "Collector ID", "Collector Name", "Area", "Collect Type", 
            "Customer Name", "Delivery Date", "Payment Method", 
            "CNTR Deposit", "CNTR Refund", "Total Amount", 
            "Gcash Number", "Checked By", "Approved By",
            "Bank Name", "Bank Branch", "Cheque Number", "Cheque Date"
        ],
        // Data rows
        ...filteredData.map(item => [
            item.id,
            item.collector_name,
            item.area,
            item.collect_type,
            item.customer_name,
            item.delivery_date,
            item.payment_method,
            `₱${item.cntr_deposit}`,
            `₱${item.cntr_refund}`,
            `₱${item.total_amount}`,
            item.gcash_number || 'N/A',
            item.checked_by,
            item.approved_by,
            item.bank_name || 'N/A',
            item.bank_branch || 'N/A',
            item.cheque_number || 'N/A',
            item.cheque_date || 'N/A'
        ])
    ];

    // Create workbook and worksheet
    const workbook = XLSX.utils.book_new();
    const worksheet = XLSX.utils.aoa_to_sheet(worksheetData);
    XLSX.utils.book_append_sheet(workbook, worksheet, "Collections");

    // Generate file name with timestamp
    const timestamp = new Date().toISOString().replace(/[:.]/g, '-');
    const fileName = `Collections_${currentCollectionFilter || 'all'}_${timestamp}.xlsx`;

    // Export to Excel
    XLSX.writeFile(workbook, fileName);

    // Restore button state
    exportBtn.innerHTML = originalBtnHTML;
    exportBtn.disabled = false;
    showCollectionToast(`Exported ${filteredData.length} records to Excel`);
}

function initCollectionEventListeners() {
    collectionSearchButton.addEventListener("click", performCollectionSearch);
    collectionSearchInput.addEventListener("keypress", function(e) {
        if (e.key === "Enter") performCollectionSearch();
    });
    collectionRowsPerPageElement.addEventListener("change", handleCollectionEntriesChange);
    document.getElementById('exportCollectionExcelBtn').addEventListener('click', exportCollectionToExcel);
    setupEditCollection();
    setupDeleteCollection();
}

// Initialize the collection page
generateFakeCollectionData();
initCollectionEventListeners();
showCollectionPage(1);
</script>



</body>
</html>