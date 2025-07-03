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
                            <h4 class="mb-0 fw-semibold">List Sales</h4>
                            <input type="text" id="orderSearchInput" class="form-control w-25 ms-auto" placeholder="Search orders...">
                            <button class="btn btn-primary" id="orderSearchBtn">Search</button>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-md-6 d-flex align-items-center gap-2">
                                        <label for="orderEntriesSelect" class="mb-0">Show</label>
                                        <select id="orderEntriesSelect" class="form-select form-select-sm w-auto">
                                            <option value="10" selected>10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                                        <span class="ms-2">entries</span>
                                    </div>
                                    <div class="col-md-6 d-flex justify-content-end">
                                        <a href="add-sales.html" class="btn btn-primary" id="addNewOrderBtn">
                                            <i class='bx bx-plus'></i> Add New Order
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-centered table-striped dt-responsive nowrap w-100" id="orderDatatable">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Date</th>
                                                <th>Customer Name</th>
                                                <th>Address</th>
                                                <th>Area</th>
                                                <th>Items</th>
                                                <th>Price</th>
                                                <th>Terms</th>
                                                <th>Via</th>
                                                <th>Delivery Date</th>
                                                <th>Remarks</th>
                                                <th>Balance For Delivery</th>
                                                <th>Invoice</th>
                                                <th style="width: 100px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="order-table-body">
                                            <!-- Data will be injected by JavaScript -->
                                        </tbody>
                                    </table>
                                    <div id="order-loading-spinner" class="d-none text-center mt-3">
                                        <div class="spinner-border text-primary" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                        <p class="mt-2">Loading data, please wait...</p>
                                    </div>
                                    <nav aria-label="Page navigation">
                                        <ul class="pagination justify-content-center mt-3" id="order-pagination">
                                            <!-- Buttons will be injected by JS -->
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Edit Modal -->
                <div class="modal fade" id="orderEditModal" tabindex="-1" aria-labelledby="orderEditModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="orderEditModalLabel">Edit Order</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="orderEditForm">
                                    <input type="hidden" id="editOrderId">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="editOrderDate" class="form-label">Date</label>
                                            <input type="date" class="form-control" id="editOrderDate" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="editCustomerName" class="form-label">Customer Name</label>
                                            <input type="text" class="form-control" id="editCustomerName" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="editAddress" class="form-label">Address</label>
                                            <input type="text" class="form-control" id="editAddress" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="editArea" class="form-label">Area</label>
                                            <select class="form-select" id="editArea" required>
                                                <option value="North">North</option>
                                                <option value="South">South</option>
                                                <option value="East">East</option>
                                                <option value="West">West</option>
                                                <option value="Central">Central</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="editItems" class="form-label">Items</label>
                                            <input type="text" class="form-control" id="editItems" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="editPrice" class="form-label">Price</label>
                                            <input type="number" class="form-control" id="editPrice" step="0.01" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="editTerms" class="form-label">Terms</label>
                                            <select class="form-select" id="editTerms" required>
                                                <option value="COD">COD</option>
                                                <option value="30 days">30 days</option>
                                                <option value="60 days">60 days</option>
                                                <option value="90 days">90 days</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="editVia" class="form-label">Via</label>
                                            <select class="form-select" id="editVia" required>
                                                <option value="Email">Email</option>
                                                <option value="Phone">Phone</option>
                                                <option value="In Person">In Person</option>
                                                <option value="Website">Website</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="editDeliveryDate" class="form-label">Delivery Date</label>
                                            <input type="date" class="form-control" id="editDeliveryDate" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="editRemarks" class="form-label">Remarks</label>
                                            <input type="text" class="form-control" id="editRemarks">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="editBalanceForDelivery" class="form-label">Balance For Delivery</label>
                                            <input type="number" class="form-control" id="editBalanceForDelivery" step="0.01" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="editInvoice" class="form-label">Invoice Number</label>
                                            <input type="text" class="form-control" id="editInvoice" required>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary" id="saveOrderEditBtn">Save Changes</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Delete Modal -->
                <div class="modal fade" id="orderDeleteModal" tabindex="-1" aria-labelledby="orderDeleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="orderDeleteModalLabel">Delete Order</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete Order #<strong id="deleteOrderId"></strong>?
                                <p class="text-danger mt-2">This action cannot be undone.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-danger" id="confirmOrderDeleteBtn">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Toast Notification -->
                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999;">
                    <div id="orderSuccessToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body" id="orderToastMessage">
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
const orderRowsPerPageElement = document.getElementById("orderEntriesSelect");
let orderRowsPerPage = parseInt(orderRowsPerPageElement.value);
const orderTotalRows = 100;
const orderMaxVisiblePages = 5;
const orderTbody = document.getElementById("order-table-body");
const orderPaginationContainer = document.getElementById("order-pagination");
const orderSearchInput = document.getElementById("orderSearchInput");
const orderSearchButton = document.getElementById("orderSearchBtn");
const orderLoadingSpinner = document.getElementById("order-loading-spinner");

const termsOptions = ['COD', '30 days', '60 days', '90 days'];
const viaOptions = ['Email', 'Phone', 'In Person', 'Website'];
const areaOptions = ['North', 'South', 'East', 'West', 'Central'];

const orderEditModal = new bootstrap.Modal(document.getElementById('orderEditModal'));
const orderDeleteModal = new bootstrap.Modal(document.getElementById('orderDeleteModal'));
const orderToast = new bootstrap.Toast(document.getElementById('orderSuccessToast'));

let orderOriginalData = [];
let orderCurrentEditIndex = null;
let orderCurrentPage = 1;
let orderCurrentFilter = "";

function generateFakeOrderData() {
    orderOriginalData = [];
    for (let i = 1; i <= orderTotalRows; i++) {
        const randomDay = String(Math.floor(Math.random() * 28) + 1).padStart(2, '0');
        const randomMonth = String(Math.floor(Math.random() * 12) + 1).padStart(2, '0');
        const deliveryDay = String(Math.floor(Math.random() * 28) + 1).padStart(2, '0');
        const deliveryMonth = String((parseInt(randomMonth) + 1) % 12 || 12).padStart(2, '0');
        
        orderOriginalData.push({
            id: i,
            date: `2024-${randomMonth}-${randomDay}`,
            customer_name: `Customer ${Math.floor(i / 10) + 1}`,
            address: `${i} Main St, City ${Math.floor(i / 10) + 1}`,
            area: areaOptions[Math.floor(Math.random() * areaOptions.length)],
            items: `Item ${i}, Item ${i+1}`,
            price: (Math.random() * 1000 + 50).toFixed(2),
            terms: termsOptions[Math.floor(Math.random() * termsOptions.length)],
            via: viaOptions[Math.floor(Math.random() * viaOptions.length)],
            delivery_date: `2024-${deliveryMonth}-${deliveryDay}`,
            remarks: i % 3 === 0 ? 'Urgent' : i % 5 === 0 ? 'Fragile' : '',
            balance_for_delivery: (Math.random() * 500).toFixed(2),
            invoice: `INV-${1000 + i}`
        });
    }
}

function showOrderPage(page, filter = "") {
    orderTbody.innerHTML = "";
    orderLoadingSpinner.classList.remove("d-none");
    orderCurrentPage = page;
    orderCurrentFilter = filter;

    setTimeout(() => {
        const filteredData = filter
            ? orderOriginalData.filter(row =>
                Object.values(row).some(val =>
                    val.toString().toLowerCase().includes(filter.toLowerCase())
                )
            )
            : orderOriginalData;

        const totalPages = Math.ceil(filteredData.length / orderRowsPerPage);
        const start = (page - 1) * orderRowsPerPage;
        const end = Math.min(start + orderRowsPerPage, filteredData.length);

        if (filteredData.length === 0) {
            const tr = document.createElement("tr");
            tr.innerHTML = `<td colspan="14" class="text-center">No matching records found</td>`;
            orderTbody.appendChild(tr);
        } else {
            for (let i = start; i < end; i++) {
                const row = filteredData[i];
                const tr = document.createElement("tr");
                tr.innerHTML = `
                    <td>${row.id}</td>
                    <td>${row.date}</td>
                    <td>${row.customer_name}</td>
                    <td>${row.address}</td>
                    <td>${row.area}</td>
                    <td>${row.items}</td>
                    <td>₱${row.price}</td>
                    <td>${row.terms}</td>
                    <td>${row.via}</td>
                    <td>${row.delivery_date}</td>
                    <td>${row.remarks}</td>
                    <td>₱${row.balance_for_delivery}</td>
                    <td>${row.invoice}</td>
                    <td>
                        <a href="javascript:void(0);" class="action-icon order-edit-btn" title="Edit" data-id="${row.id}"><i class="bx bx-edit"></i></a>
                        <a href="javascript:void(0);" class="action-icon order-delete-btn" title="Delete" data-id="${row.id}"><i class="bx bx-trash"></i></a>
                    </td>
                `;
                orderTbody.appendChild(tr);
            }
        }

        renderOrderPagination(page, totalPages, filter);
        orderLoadingSpinner.classList.add("d-none");
    }, 500);
}

function renderOrderPagination(currentPage, totalPages, filter = "") {
    orderPaginationContainer.innerHTML = "";
    if (totalPages <= 0) return;

    orderPaginationContainer.appendChild(createOrderPageItem(1, "«", currentPage === 1 ? "disabled" : ""));
    orderPaginationContainer.appendChild(createOrderPageItem(currentPage - 1, "‹", currentPage === 1 ? "disabled" : ""));

    let startPage = Math.max(1, currentPage - Math.floor(orderMaxVisiblePages / 2));
    let endPage = Math.min(totalPages, startPage + orderMaxVisiblePages - 1);

    if (endPage - startPage + 1 < orderMaxVisiblePages) {
        startPage = Math.max(1, endPage - orderMaxVisiblePages + 1);
    }

    if (startPage > 1) {
        orderPaginationContainer.appendChild(createOrderPageItem(1, "1"));
        if (startPage > 2) {
            const li = document.createElement("li");
            li.className = "page-item disabled";
            li.innerHTML = '<span class="page-link">...</span>';
            orderPaginationContainer.appendChild(li);
        }
    }

    for (let i = startPage; i <= endPage; i++) {
        orderPaginationContainer.appendChild(createOrderPageItem(i, i, i === currentPage ? "active" : ""));
    }

    if (endPage < totalPages) {
        if (endPage < totalPages - 1) {
            const li = document.createElement("li");
            li.className = "page-item disabled";
            li.innerHTML = '<span class="page-link">...</span>';
            orderPaginationContainer.appendChild(li);
        }
        orderPaginationContainer.appendChild(createOrderPageItem(totalPages, totalPages));
    }

    orderPaginationContainer.appendChild(createOrderPageItem(currentPage + 1, "›", currentPage === totalPages ? "disabled" : ""));
    orderPaginationContainer.appendChild(createOrderPageItem(totalPages, "»", currentPage === totalPages ? "disabled" : ""));
}

function createOrderPageItem(pageNumber, label, disabledOrActive = "") {
    const li = document.createElement("li");
    li.className = `page-item ${disabledOrActive}`;
    const a = document.createElement("a");
    a.className = "page-link";
    a.href = "#";
    a.textContent = label;
    if (!["disabled", "active"].includes(disabledOrActive)) {
        a.addEventListener("click", (e) => {
            e.preventDefault();
            showOrderPage(pageNumber, orderCurrentFilter);
        });
    }
    li.appendChild(a);
    return li;
}

function performOrderSearch() {
    const term = orderSearchInput.value;
    showOrderPage(1, term);
}

function handleOrderEntriesChange() {
    orderRowsPerPage = parseInt(orderRowsPerPageElement.value);
    showOrderPage(1, orderCurrentFilter);
}

function showOrderToast(message) {
    document.getElementById("orderToastMessage").textContent = message;
    orderToast.show();
}

function setupEditOrder() {
    document.addEventListener("click", function(e) {
        if (e.target.closest(".order-edit-btn")) {
            const btn = e.target.closest(".order-edit-btn");
            const id = parseInt(btn.getAttribute("data-id"));
            const order = orderOriginalData.find(item => item.id === id);
            if (order) {
                document.getElementById("editOrderId").value = order.id;
                document.getElementById("editOrderDate").value = order.date;
                document.getElementById("editCustomerName").value = order.customer_name;
                document.getElementById("editAddress").value = order.address;
                document.getElementById("editArea").value = order.area;
                document.getElementById("editItems").value = order.items;
                document.getElementById("editPrice").value = order.price;
                document.getElementById("editTerms").value = order.terms;
                document.getElementById("editVia").value = order.via;
                document.getElementById("editDeliveryDate").value = order.delivery_date;
                document.getElementById("editRemarks").value = order.remarks;
                document.getElementById("editBalanceForDelivery").value = order.balance_for_delivery;
                document.getElementById("editInvoice").value = order.invoice;
                orderEditModal.show();
            }
        }
    });

    document.getElementById("saveOrderEditBtn").addEventListener("click", function() {
        const id = parseInt(document.getElementById("editOrderId").value);
        const index = orderOriginalData.findIndex(item => item.id === id);
        if (index !== -1) {
            orderOriginalData[index] = {
                id: id,
                date: document.getElementById("editOrderDate").value,
                customer_name: document.getElementById("editCustomerName").value,
                address: document.getElementById("editAddress").value,
                area: document.getElementById("editArea").value,
                items: document.getElementById("editItems").value,
                price: document.getElementById("editPrice").value,
                terms: document.getElementById("editTerms").value,
                via: document.getElementById("editVia").value,
                delivery_date: document.getElementById("editDeliveryDate").value,
                remarks: document.getElementById("editRemarks").value,
                balance_for_delivery: document.getElementById("editBalanceForDelivery").value,
                invoice: document.getElementById("editInvoice").value
            };
            showOrderPage(orderCurrentPage, orderCurrentFilter);
            showOrderToast("Order updated successfully!");
            orderEditModal.hide();
        }
    });
}

function setupDeleteOrder() {
    document.addEventListener("click", function(e) {
        if (e.target.closest(".order-delete-btn")) {
            const btn = e.target.closest(".order-delete-btn");
            const id = parseInt(btn.getAttribute("data-id"));
            const order = orderOriginalData.find(item => item.id === id);
            if (order) {
                document.getElementById("deleteOrderId").textContent = order.id;
                orderCurrentEditIndex = orderOriginalData.findIndex(item => item.id === id);
                orderDeleteModal.show();
            }
        }
    });

    document.getElementById("confirmOrderDeleteBtn").addEventListener("click", function() {
        if (orderCurrentEditIndex !== null && orderCurrentEditIndex !== -1) {
            orderOriginalData.splice(orderCurrentEditIndex, 1);
            showOrderPage(Math.min(orderCurrentPage, Math.ceil(orderOriginalData.length / orderRowsPerPage)), orderCurrentFilter);
            showOrderToast("Order deleted successfully!");
            orderDeleteModal.hide();
            orderCurrentEditIndex = null;
        }
    });
}

function initOrderEventListeners() {
    orderSearchButton.addEventListener("click", performOrderSearch);
    orderSearchInput.addEventListener("keypress", function(e) {
        if (e.key === "Enter") performOrderSearch();
    });
    orderRowsPerPageElement.addEventListener("change", handleOrderEntriesChange);
    setupEditOrder();
    setupDeleteOrder();
}

function initOrderTable() {
    generateFakeOrderData();
    initOrderEventListeners();
    showOrderPage(1);
}

// Initialize the order table when the page loads
document.addEventListener('DOMContentLoaded', initOrderTable);
</script>   
     

</body>
</html>