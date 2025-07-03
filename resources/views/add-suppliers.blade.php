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
                                   <h4 class="mb-0 fw-semibold">Add Suppliers</h4>
                              </div>
                         </div>
                         </div>
                         <div class="row">
                         <div class="col-12">
                              <div class="card">
                                   <div class="card-body">
                                        <form id="supplierForm" method="POST">
                                             <div class="row">
                                             <!-- Supplier Name -->
                                             <div class="col-md-6 mb-3">
                                                  <label for="supplierName" class="form-label">Supplier Name</label>
                                                  <input type="text" class="form-control" id="supplierName" required>
                                             </div>

                                             <!-- Supplier Contact Name -->
                                             <div class="col-md-6 mb-3">
                                                  <label for="supplierContactName" class="form-label">Supplier Contact Name</label>
                                                  <input type="text" class="form-control" id="supplierContactName" placeholder="Enter contact person name" required>
                                             </div>

                                             <!-- Supplier Address -->
                                             <div class="col-md-6 mb-3">
                                                  <label for="supplierAddress" class="form-label">Supplier Address</label>
                                                  <input type="text" class="form-control" id="supplierAddress" placeholder="Enter supplier address" required>
                                             </div>

                                             <!-- Supplier Contact Number -->
                                             <div class="col-md-6 mb-3">
                                                  <label for="supplierContact" class="form-label">Supplier Contact Number</label>
                                                  <input type="tel" class="form-control" id="supplierContact" placeholder="Enter contact number" required>
                                             </div>

                                             <!-- Qty -->
                                             <div class="col-md-6 mb-3">
                                                  <label for="qty" class="form-label">Qty</label>
                                                  <input type="number" min="0" class="form-control" id="qty" placeholder="Enter quantity" required>
                                             </div>

                                             <!-- Unit of Measure -->
                                             <div class="col-md-6 mb-3">
                                                  <label for="unitOfMeasure" class="form-label">Unit of Measure</label>
                                                  <select class="form-select" id="unitOfMeasure" required>
                                                       <option selected disabled>Select unit</option>
                                                       <option value="Units">Units</option>
                                                       <option value="Kilos">Kilos</option>
                                                       <option value="Liters">Liters</option>
                                                       <option value="Boxes">Boxes</option>
                                                  </select>
                                             </div>

                                             <!-- Submit Buttons -->
                                             <div class="col-md-12 d-flex justify-content-end gap-2 mt-4">
                                                  <button type="reset" class="btn btn-light">Reset</button>
                                                  <button type="submit" class="btn btn-primary">Save Record</button>
                                             </div>
                                             </div>
                                        </form>
                                   </div>
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
        originalData.push({
            id: i,
            supplier_id: `SUP${String(i).padStart(4, '0')}`,
            supplier_name: `Supplier ${i}`,
            contact_name: `Contact Person ${i}`,
            contact_number: `+1${Math.floor(Math.random() * 900000000) + 100000000}`,
            address: `${Math.floor(Math.random() * 1000) + 1} Main St, City ${i}`,
            item: items[Math.floor(Math.random() * items.length)],
            quantity: Math.floor(Math.random() * 1000) + 1,
            unit_of_measure: unitsOfMeasure[Math.floor(Math.random() * unitsOfMeasure.length)]
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
                    <td>${row.contact_name}</td>
                    <td>${row.contact_number}</td>
                    <td>${row.address}</td>
                    <td>${row.item}</td>
                    <td>${row.quantity}</td>
                    <td>${row.unit_of_measure}</td>
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
                document.getElementById("editContactName").value = inventory.contact_name;
                document.getElementById("editContactNumber").value = inventory.contact_number;
                document.getElementById("editAddress").value = inventory.address;
                document.getElementById("editItem").value = inventory.item;
                document.getElementById("editQuantity").value = inventory.quantity;
                document.getElementById("editUnitOfMeasure").value = inventory.unit_of_measure;
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
                contact_name: document.getElementById("editContactName").value,
                contact_number: document.getElementById("editContactNumber").value,
                address: document.getElementById("editAddress").value,
                item: document.getElementById("editItem").value,
                quantity: parseInt(document.getElementById("editQuantity").value),
                unit_of_measure: document.getElementById("editUnitOfMeasure").value
            };
            showPage(currentPage, currentFilter);
            showToast("Supplier record updated successfully!");
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
            showToast("Supplier record deleted successfully!");
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