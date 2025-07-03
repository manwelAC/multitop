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
                              <div class="page-title-box d-flex align-items-center justify-content-between">
                                   <h4 class="mb-0 fw-semibold">Withdrawal Sales</h4>
                                   <div class="d-flex">
                                        <input type="text" id="orderSearchInput" class="form-control w-auto me-2" placeholder="Search orders...">
                                        <button class="btn btn-primary" id="orderSearchBtn">Search</button>
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
                                             <a href="withdrawal.html" class="btn btn-primary" id="addNewWithdrawalBtn">
                                                  <i class='bx bx-plus'></i> New Withdrawal
                                             </a>
                                             </div>
                                        </div>
                                   </div>
                                   <div class="card-body">
                                        <div class="table-responsive">
                                             <table class="table table-centered table-striped dt-responsive nowrap w-100" id="datatable">
                                             <thead>
                                                  <tr>
                                                       <th>DATE</th>
                                                       <th>WITHDRAWAL #</th>
                                                       <th>CUSTOMER</th>
                                                       <th>ORDER #</th>
                                                       <th>TOTAL ITEMS</th>
                                                       <th>TOTAL PRICE</th>
                                                       <th style="width: 150px;">ACTIONS</th>
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
                                             <div class="row">
                                             <div class="col-12 text-center">
                                                  <div class="dataTables_info" id="entriesInfo" role="status" aria-live="polite">
                                                       Showing 0 to 0 of 0 entries
                                                  </div>
                                             </div>
                                             </div>
                                             <div class="row">
                                             <div class="col-12">
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
                         </div>
                         </div>

                         <!-- View Modal -->
                         <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                         <div class="modal-dialog modal-lg modal-dialog-scrollable">
                              <div class="modal-content">
                                   <div class="modal-header">
                                        <h5 class="modal-title" id="viewModalLabel">Withdrawal Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                   </div>
                                   <div class="modal-body">
                                        <div class="row mb-4">
                                             <div class="col-md-6">
                                             <div class="mb-3">
                                                  <strong>WITHDRAWAL #:</strong>
                                                  <p id="viewWithdrawalNo"></p>
                                             </div>
                                             <div class="mb-3">
                                                  <strong>DATE:</strong>
                                                  <p id="viewDate"></p>
                                             </div>
                                             </div>
                                             <div class="col-md-6">
                                             <div class="mb-3">
                                                  <strong>TOTAL ORDERS:</strong>
                                                  <p id="viewTotalOrders"></p>
                                             </div>
                                             <div class="mb-3">
                                                  <strong>GRAND TOTAL:</strong>
                                                  <p id="viewGrandTotal"></p>
                                             </div>
                                             </div>
                                        </div>
                                        
                                        <div id="ordersContainer">
                                             <!-- Orders will be injected here -->
                                        </div>
                                   </div>
                                   <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" id="downloadReceiptBtn">
                                             <i class="bx bx-download"></i> Download Receipt
                                        </button>
                                   </div>
                              </div>
                         </div>
                         </div>

                         <!-- Delete Confirmation Modal -->
                         <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
                         <div class="modal-dialog">
                              <div class="modal-content">
                                   <div class="modal-header">
                                        <h5 class="modal-title">Confirm Deletion</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                   </div>
                                   <div class="modal-body">
                                        <p>Are you sure you want to delete withdrawal <strong id="deleteWithdrawalNumber"></strong>?</p>
                                        <p class="text-danger mt-2">This action cannot be undone.</p>
                                        <input type="hidden" id="withdrawalToDelete">
                                   </div>
                                   <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
                                   </div>
                              </div>
                         </div>
                         </div>

                         <!-- Toast Notifications -->
                         <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
                         <div id="successToast" class="toast align-items-center text-white bg-success" role="alert" aria-live="assertive" aria-atomic="true">
                              <div class="d-flex">
                                   <div class="toast-body" id="toastMessage">
                                        Operation completed successfully!
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
    // Initialize toast
    const successToast = new bootstrap.Toast(document.getElementById('successToast'));
    
    // Show toast notification
    function showToast(message) {
        document.getElementById('toastMessage').textContent = message;
        successToast.show();
    }

    // Database simulation
    const database = {
        withdrawals: [],
        receipts: [],
        orders: [
            {
                orderNumber: "ORDER-001",
                phone: "09665494231",
                address: "Caloocan City",
                items: [
                    {id:1, name:"Styro Cup Coffee Express 8oz", stock:50, price:45.99},
                    {id:2, name:"Styro Cup 8oz MP", stock:30, price:18.50},
                    {id:3, name:"Styro Bowl Eps12oz STC", stock:25, price:32.75}
                ]
            },
            {
                orderNumber: "ORDER-002",
                phone: "09887452145",
                address: "Las Pinas",
                items: [
                    {id:4, name:"Styro Bowl EPS12oz MP", stock:40, price:22.99},
                    {id:5, name:"Styro Plate Round FC", stock:15, price:15.25}
                ]
            },
            {
                orderNumber: "ORDER-003",
                phone: "09864872198",
                address: "Romblon",
                items: [
                    {id:6, name:"Styro Cup 12oz", stock:60, price:20.50},
                    {id:7, name:"Styro Plate Square", stock:35, price:18.75},
                    {id:8, name:"Styro Bowl 16oz", stock:20, price:28.99},
                    {id:9, name:"Styro Cup Lid", stock:100, price:5.25}
                ]
            }
        ]
    };

    // Generate sample data
    function generateSampleWithdrawals() {
        database.withdrawals = [];
        database.receipts = [];
        
        for (let i = 1; i <= 15; i++) {
            const date = new Date();
            date.setDate(date.getDate() - Math.floor(Math.random() * 30));
            
            const orderCount = Math.floor(Math.random() * 3) + 1;
            const selectedOrders = [];
            const orderIndices = [];
            
            while (orderIndices.length < orderCount) {
                const randomIndex = Math.floor(Math.random() * database.orders.length);
                if (!orderIndices.includes(randomIndex)) {
                    orderIndices.push(randomIndex);
                    selectedOrders.push(database.orders[randomIndex]);
                }
            }
            
            const withdrawalNumber = `WD-${date.getFullYear()}${String(date.getMonth() + 1).padStart(2, '0')}${String(date.getDate()).padStart(2, '0')}-${i}`;
            
            const withdrawalRecord = {
                id: Date.now() + i,
                withdrawalNumber: withdrawalNumber,
                date: date.toISOString().split('T')[0],
                orders: selectedOrders.map(order => {
                    const receiptNumber = `RCPT-${date.getFullYear().toString().slice(-2)}${String(date.getMonth() + 1).padStart(2, '0')}${String(date.getDate()).padStart(2, '0')}-${i}`;
                    
                    const itemsWithQuantities = order.items.map(item => {
                        const withdrawalQty = Math.floor(Math.random() * item.stock) + 1;
                        return {
                            ...item,
                            withdrawalQuantity: withdrawalQty,
                            total: item.price * withdrawalQty
                        };
                    });
                    
                    const totalPrice = itemsWithQuantities.reduce((sum, item) => sum + item.total, 0);
                    const totalItems = itemsWithQuantities.reduce((sum, item) => sum + item.withdrawalQuantity, 0);
                    
                    database.receipts.push({
                        receiptNumber: receiptNumber,
                        withdrawalNumber: withdrawalNumber,
                        orderNumber: order.orderNumber,
                        items: itemsWithQuantities,
                        totalPrice: totalPrice,
                        totalItems: totalItems,
                        date: date.toISOString().split('T')[0]
                    });
                    
                    return {
                        orderNumber: order.orderNumber,
                        receiptNumber: receiptNumber,
                        phone: order.phone,
                        address: order.address,
                        items: itemsWithQuantities,
                        totalPrice: totalPrice,
                        totalItems: totalItems
                    };
                }),
                createdAt: new Date().toISOString(),
                status: 'completed'
            };
            
            withdrawalRecord.totalPrice = withdrawalRecord.orders.reduce((sum, order) => sum + order.totalPrice, 0);
            withdrawalRecord.totalItems = withdrawalRecord.orders.reduce((sum, order) => sum + order.totalItems, 0);
            
            database.withdrawals.push(withdrawalRecord);
        }
    }

    // Current page state
    let currentPage = 1;
    let currentFilter = '';

    // Initialize the page
    document.addEventListener('DOMContentLoaded', function() {
        generateSampleWithdrawals();
        renderWithdrawalTable();
        setupEventListeners();
    });

    // Render withdrawal table
    function renderWithdrawalTable(filter = '', page = 1) {
        const tbody = document.getElementById('table-body');
        tbody.innerHTML = '';
        
        document.getElementById('loading-spinner').classList.remove('d-none');
        
        currentFilter = filter;
        currentPage = page;
        
        const filteredWithdrawals = filter ? 
            database.withdrawals.filter(w => 
                w.withdrawalNumber.toLowerCase().includes(filter.toLowerCase()) ||
                w.orders.some(o => o.orderNumber.toLowerCase().includes(filter.toLowerCase()))
            ) : 
            database.withdrawals;
        
        setTimeout(() => {
            const itemsPerPage = parseInt(document.getElementById('entriesSelect').value);
            const startIndex = (page - 1) * itemsPerPage;
            const endIndex = startIndex + itemsPerPage;
            const paginatedWithdrawals = filteredWithdrawals.slice(startIndex, endIndex);
            
            if (paginatedWithdrawals.length === 0) {
                tbody.innerHTML = `
                    <tr>
                        <td colspan="7" class="text-center">No withdrawals found</td>
                    </tr>
                `;
            } else {
                paginatedWithdrawals.forEach(withdrawal => {
                    const row = document.createElement('tr');
                    const ordersList = withdrawal.orders.map(o => o.orderNumber).join(', ');
                    
                    row.innerHTML = `
                        <td>${withdrawal.date}</td>
                        <td>${withdrawal.withdrawalNumber}</td>
                        <td>${withdrawal.orders[0].address}</td>
                        <td>${ordersList}</td>
                        <td>${withdrawal.totalItems}</td>
                        <td>₱${withdrawal.totalPrice.toFixed(2)}</td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="javascript:void(0);" class="action-icon" title="View" data-withdrawal="${withdrawal.withdrawalNumber}">
                                    <i class="bx bx-show"></i>
                                </a>
                                <a href="javascript:void(0);" class="action-icon" title="Edit" data-withdrawal="${withdrawal.withdrawalNumber}">
                                    <i class="bx bx-edit"></i>
                                </a>
                                <a href="javascript:void(0);" class="action-icon" title="Delete" data-withdrawal="${withdrawal.withdrawalNumber}">
                                    <i class="bx bx-trash"></i>
                                </a>
                            </div>
                        </td>
                    `;
                    tbody.appendChild(row);
                });
            }
            
            // Update entries info
            updateEntriesInfo(filteredWithdrawals.length, startIndex, endIndex);
            
            document.getElementById('loading-spinner').classList.add('d-none');
            updatePagination(filteredWithdrawals.length, page);
        }, 500);
    }

    // Update entries information
    function updateEntriesInfo(totalItems, startIndex, endIndex) {
        const entriesInfo = document.getElementById('entriesInfo');
        if (totalItems === 0) {
            entriesInfo.textContent = 'Showing 0 to 0 of 0 entries';
        } else {
            const start = startIndex + 1;
            const end = Math.min(endIndex, totalItems);
            entriesInfo.textContent = `Showing ${start} to ${end} of ${totalItems} entries`;
        }
    }

    // Update pagination
    function updatePagination(totalItems, currentPage = 1) {
        const pagination = document.getElementById('pagination');
        pagination.innerHTML = '';
        
        const itemsPerPage = parseInt(document.getElementById('entriesSelect').value);
        const pageCount = Math.ceil(totalItems / itemsPerPage);
        
        if (pageCount <= 1) return;
        
        // Previous button
        const prevLi = document.createElement('li');
        prevLi.className = 'page-item' + (currentPage === 1 ? ' disabled' : '');
        prevLi.innerHTML = `<a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>`;
        prevLi.addEventListener('click', (e) => {
            e.preventDefault();
            if (currentPage > 1) {
                renderWithdrawalTable(currentFilter, currentPage - 1);
            }
        });
        pagination.appendChild(prevLi);
        
        // Page numbers
        const maxVisiblePages = 5;
        let startPage = Math.max(1, currentPage - Math.floor(maxVisiblePages / 2));
        let endPage = Math.min(pageCount, startPage + maxVisiblePages - 1);
        
        if (endPage - startPage + 1 < maxVisiblePages) {
            startPage = Math.max(1, endPage - maxVisiblePages + 1);
        }
        
        if (startPage > 1) {
            const firstLi = document.createElement('li');
            firstLi.className = 'page-item';
            firstLi.innerHTML = `<a class="page-link" href="#">1</a>`;
            firstLi.addEventListener('click', (e) => {
                e.preventDefault();
                renderWithdrawalTable(currentFilter, 1);
            });
            pagination.appendChild(firstLi);
            
            if (startPage > 2) {
                const ellipsisLi = document.createElement('li');
                ellipsisLi.className = 'page-item disabled';
                ellipsisLi.innerHTML = `<span class="page-link">...</span>`;
                pagination.appendChild(ellipsisLi);
            }
        }
        
        for (let i = startPage; i <= endPage; i++) {
            const li = document.createElement('li');
            li.className = `page-item ${i === currentPage ? 'active' : ''}`;
            li.innerHTML = `<a class="page-link" href="#">${i}</a>`;
            li.addEventListener('click', (e) => {
                e.preventDefault();
                renderWithdrawalTable(currentFilter, i);
            });
            pagination.appendChild(li);
        }
        
        if (endPage < pageCount) {
            if (endPage < pageCount - 1) {
                const ellipsisLi = document.createElement('li');
                ellipsisLi.className = 'page-item disabled';
                ellipsisLi.innerHTML = `<span class="page-link">...</span>`;
                pagination.appendChild(ellipsisLi);
            }
            
            const lastLi = document.createElement('li');
            lastLi.className = 'page-item';
            lastLi.innerHTML = `<a class="page-link" href="#">${pageCount}</a>`;
            lastLi.addEventListener('click', (e) => {
                e.preventDefault();
                renderWithdrawalTable(currentFilter, pageCount);
            });
            pagination.appendChild(lastLi);
        }
        
        // Next button
        const nextLi = document.createElement('li');
        nextLi.className = 'page-item' + (currentPage === pageCount ? ' disabled' : '');
        nextLi.innerHTML = `<a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a>`;
        nextLi.addEventListener('click', (e) => {
            e.preventDefault();
            if (currentPage < pageCount) {
                renderWithdrawalTable(currentFilter, currentPage + 1);
            }
        });
        pagination.appendChild(nextLi);
    }

    // Setup event listeners
    function setupEventListeners() {
        // Search functionality
        document.getElementById('orderSearchBtn').addEventListener('click', function() {
            const searchTerm = document.getElementById('orderSearchInput').value;
            renderWithdrawalTable(searchTerm);
        });
        
        document.getElementById('orderSearchInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                const searchTerm = document.getElementById('orderSearchInput').value;
                renderWithdrawalTable(searchTerm);
            }
        });
        
        // Entries per page
        document.getElementById('entriesSelect').addEventListener('change', function() {
            renderWithdrawalTable(currentFilter);
        });
        
        // Action icons
        document.addEventListener('click', function(e) {
            const icon = e.target.closest('.action-icon');
            if (!icon) return;
            
            const withdrawalNumber = icon.getAttribute('data-withdrawal');
            const action = icon.getAttribute('title');
            
            if (action === 'View') {
                showWithdrawalDetails(withdrawalNumber);
            } else if (action === 'Edit') {
                editWithdrawal(withdrawalNumber);
            } else if (action === 'Delete') {
                showDeleteConfirmation(withdrawalNumber);
            }
        });
        
        // Download receipt
        document.getElementById('downloadReceiptBtn').addEventListener('click', function() {
            const withdrawalNumber = document.getElementById('viewWithdrawalNo').textContent;
            downloadReceipt(withdrawalNumber);
            showToast(`Receipt for ${withdrawalNumber} downloaded successfully`);
        });
        
        // Confirm delete
        document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
            const withdrawalNumber = document.getElementById('withdrawalToDelete').value;
            deleteWithdrawal(withdrawalNumber);
            const deleteModal = bootstrap.Modal.getInstance(document.getElementById('deleteModal'));
            deleteModal.hide();
        });
    }

    // Show delete confirmation
    function showDeleteConfirmation(withdrawalNumber) {
        document.getElementById('deleteWithdrawalNumber').textContent = withdrawalNumber;
        document.getElementById('withdrawalToDelete').value = withdrawalNumber;
        const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
        deleteModal.show();
    }

    // Show withdrawal details
    function showWithdrawalDetails(withdrawalNumber) {
        const withdrawal = database.withdrawals.find(w => w.withdrawalNumber === withdrawalNumber);
        if (!withdrawal) return;
        
        const modal = new bootstrap.Modal(document.getElementById('viewModal'));
        
        document.getElementById('viewWithdrawalNo').textContent = withdrawal.withdrawalNumber;
        document.getElementById('viewDate').textContent = withdrawal.date;
        document.getElementById('viewTotalOrders').textContent = withdrawal.orders.length;
        document.getElementById('viewGrandTotal').textContent = `₱${withdrawal.totalPrice.toFixed(2)}`;
        
        const ordersContainer = document.getElementById('ordersContainer');
        ordersContainer.innerHTML = '';
        
        withdrawal.orders.forEach((order, index) => {
            const orderCard = document.createElement('div');
            orderCard.className = 'card mb-3';
            orderCard.innerHTML = `
                <div class="card-header">
                    <h5 class="mb-0">Order ${index + 1}: ${order.orderNumber}</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p><strong>Phone:</strong> ${order.phone}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Address:</strong> ${order.address}</p>
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Unit</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                ${order.items.map(item => `
                                    <tr>
                                        <td>${item.name}</td>
                                        <td>${item.withdrawalQuantity}</td>
                                        <td>pack</td>
                                        <td>₱${item.price.toFixed(2)}</td>
                                        <td>₱${item.total.toFixed(2)}</td>
                                    </tr>
                                `).join('')}
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4" class="text-end">Subtotal:</th>
                                    <th>₱${order.totalPrice.toFixed(2)}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            `;
            ordersContainer.appendChild(orderCard);
        });
        
        modal.show();
    }

    // Edit withdrawal
    function editWithdrawal(withdrawalNumber) {
        showToast(`Edit mode for withdrawal ${withdrawalNumber}`);
        // window.location.href = `edit-withdrawal.html?id=${withdrawalNumber}`;
    }

    // Delete withdrawal
    function deleteWithdrawal(withdrawalNumber) {
        database.withdrawals = database.withdrawals.filter(w => w.withdrawalNumber !== withdrawalNumber);
        database.receipts = database.receipts.filter(r => r.withdrawalNumber !== withdrawalNumber);
        renderWithdrawalTable(currentFilter, currentPage);
        showToast(`Withdrawal ${withdrawalNumber} deleted successfully`);
    }

    // Download receipt
    function downloadReceipt(withdrawalNumber) {
        const withdrawal = database.withdrawals.find(w => w.withdrawalNumber === withdrawalNumber);
        if (!withdrawal) return;
        
        const receiptHtml = `
            <div style="font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px;">
                <div style="text-align: center; margin-bottom: 20px;">
                    <h2 style="margin-bottom: 5px;">WITHDRAWAL RECEIPT</h2>
                    <p style="margin: 0;">${withdrawal.withdrawalNumber}</p>
                    <p style="margin: 0;">${withdrawal.date}</p>
                </div>
                
                ${withdrawal.orders.map((order, index) => `
                    <div style="margin-bottom: 30px; ${index < withdrawal.orders.length - 1 ? 'page-break-after: always;' : ''}">
                        <div style="margin-bottom: 15px;">
                            <p><strong>Order ${index + 1}:</strong> ${order.orderNumber}</p>
                            <p><strong>Phone:</strong> ${order.phone}</p>
                            <p><strong>Address:</strong> ${order.address}</p>
                        </div>
                        
                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                            <thead>
                                <tr style="background-color: #f8f9fa;">
                                    <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Product</th>
                                    <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Quantity</th>
                                    <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Unit</th>
                                    <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Price</th>
                                    <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                ${order.items.map(item => `
                                    <tr>
                                        <td style="border: 1px solid #ddd; padding: 8px;">${item.name}</td>
                                        <td style="border: 1px solid #ddd; padding: 8px;">${item.withdrawalQuantity}</td>
                                        <td style="border: 1px solid #ddd; padding: 8px;">pack</td>
                                        <td style="border: 1px solid #ddd; padding: 8px;">₱${item.price.toFixed(2)}</td>
                                        <td style="border: 1px solid #ddd; padding: 8px;">₱${item.total.toFixed(2)}</td>
                                    </tr>
                                `).join('')}
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4" style="border: 1px solid #ddd; padding: 8px; text-align: right;">Subtotal:</th>
                                    <th style="border: 1px solid #ddd; padding: 8px;">₱${order.totalPrice.toFixed(2)}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                `).join('')}
                
                <div style="page-break-before: always; padding-top: 20px;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <tr>
                            <th colspan="4" style="text-align: right; padding: 8px;">GRAND TOTAL:</th>
                            <th style="border: 1px solid #ddd; padding: 8px;">₱${withdrawal.totalPrice.toFixed(2)}</th>
                        </tr>
                    </table>
                </div>
            </div>
        `;
        
        const element = document.createElement('div');
        element.innerHTML = receiptHtml;
        
        const opt = {
            margin: 10,
            filename: `withdrawal_${withdrawal.withdrawalNumber}.pdf`,
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
        };
        
        html2pdf().set(opt).from(element).save();
    }
</script>

</body>
</html>