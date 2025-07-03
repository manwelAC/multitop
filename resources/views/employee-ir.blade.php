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
                            <h4 class="mb-0 fw-semibold">Employee Records</h4>
                            <input type="text" id="customSearchInput" class="form-control w-25 ms-auto" placeholder="Search employees...">
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
                                        <a href="add-employee.html" class="btn btn-primary">
                                            <i class='bx bx-plus'></i> Add New Employee
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
                                                <th>Full Name</th>
                                                <th>Designation</th>
                                                <th>Position</th>
                                                <th>Contact Number</th>
                                                <th>PhilHealth</th>
                                                <th>SSS</th>
                                                <th>Pag-IBIG</th>
                                                <th>Status</th>
                                                <th style="width: 100px;">Actions</th>
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

                <!-- View Details Modal -->
                <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="viewModalLabel">Employee Full Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <strong>Full Name:</strong>
                                            <p id="viewFullName"></p>
                                        </div>
                                        <div class="mb-3">
                                            <strong>Birthdate:</strong>
                                            <p id="viewBirthdate"></p>
                                        </div>
                                        <div class="mb-3">
                                            <strong>Gender:</strong>
                                            <p id="viewGender"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <strong>Contact Number:</strong>
                                            <p id="viewContactPersonNumber"></p>
                                        </div>
                                        <div class="mb-3">
                                            <strong>Address:</strong>
                                            <p id="viewAddress"></p>
                                        </div>
                                        <div class="mb-3">
                                            <strong>Date Hired:</strong>
                                            <p id="viewDateHired"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Modal -->
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Employee</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="editForm">
                                    <input type="hidden" id="editEmployeeId">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="editFirstName" class="form-label">First Name</label>
                                            <input type="text" class="form-control" id="editFirstName" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="editLastName" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" id="editLastName" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="editDesignation" class="form-label">Designation</label>
                                            <select class="form-select" id="editDesignation" required>
                                                <option value="Manager">Manager</option>
                                                <option value="Supervisor">Supervisor</option>
                                                <option value="Staff">Staff</option>
                                                <option value="Clerk">Clerk</option>
                                                <option value="Technician">Technician</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="editPosition" class="form-label">Position</label>
                                            <select class="form-select" id="editPosition" required>
                                                <option value="Operations">Operations</option>
                                                <option value="Finance">Finance</option>
                                                <option value="HR">HR</option>
                                                <option value="IT">IT</option>
                                                <option value="Logistics">Logistics</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="editBirthdate" class="form-label">Birthdate</label>
                                            <input type="date" class="form-control" id="editBirthdate" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="editGender" class="form-label">Gender</label>
                                            <select class="form-select" id="editGender" required>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="editContactNumber" class="form-label">Contact Number</label>
                                            <input type="text" class="form-control" id="editContactNumber" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="editDateHired" class="form-label">Date Hired</label>
                                            <input type="date" class="form-control" id="editDateHired" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="editPhilhealth" class="form-label">PhilHealth</label>
                                            <input type="text" class="form-control" id="editPhilhealth" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="editSSS" class="form-label">SSS</label>
                                            <input type="text" class="form-control" id="editSSS" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="editPagibig" class="form-label">Pag-IBIG</label>
                                            <input type="text" class="form-control" id="editPagibig" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="editHouseNumber" class="form-label">House Number</label>
                                            <input type="text" class="form-control" id="editHouseNumber" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="editStreet" class="form-label">Street</label>
                                            <input type="text" class="form-control" id="editStreet" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="editBarangay" class="form-label">Barangay/Municipality</label>
                                            <input type="text" class="form-control" id="editBarangay" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="editTaxes" class="form-label">Tax ID</label>
                                            <input type="text" class="form-control" id="editTaxes" required>
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
                                <h5 class="modal-title" id="deleteModalLabel">Delete Employee</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this employee record?
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

const designations = ["Manager", "Supervisor", "Staff", "Clerk", "Technician"];
const positions = ["Operations", "Finance", "HR", "IT", "Logistics"];
const firstNames = ["John", "Jane", "Michael", "Emily", "David", "Sarah", "Robert", "Jennifer", "William", "Elizabeth"];
const lastNames = ["Smith", "Johnson", "Williams", "Brown", "Jones", "Miller", "Davis", "Garcia", "Rodriguez", "Wilson"];

const viewModal = new bootstrap.Modal(document.getElementById('viewModal'));
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
        const randomMonth = String(Math.floor(Math.random() * 12) + 1).padStart(2, '0');
        const randomYear = 1980 + Math.floor(Math.random() * 30);
        
        // Randomly decide if employee is resigned (about 20% chance)
        const isResigned = Math.random() < 0.2;
        const dateResigned = isResigned ? 
            `202${Math.floor(Math.random() * 5)}-${randomMonth}-${randomDay}` : null;
        
        const firstName = firstNames[Math.floor(Math.random() * firstNames.length)];
        const lastName = lastNames[Math.floor(Math.random() * lastNames.length)];
        
        originalData.push({
            id: i,
            firstName: firstName,
            lastName: lastName,
            fullName: `${firstName} ${lastName}`,
            designation: designations[i % designations.length],
            position: positions[i % positions.length],
            birthdate: `${randomYear}-${randomMonth}-${randomDay}`,
            gender: i % 2 === 0 ? "Male" : "Female",
            contact_number: `09${Math.floor(10000000 + Math.random() * 90000000)}`,
            contact_person: `Person ${i}`,
            contact_person_number: `09${Math.floor(10000000 + Math.random() * 90000000)}`,
            date_hired: `202${Math.floor(Math.random() * 5)}-${randomMonth}-${randomDay}`,
            date_resigned: dateResigned,
            status: isResigned ? "Resigned" : "Active",
            philhealth: `${Math.floor(1000000000 + Math.random() * 9000000000)}`,
            sss: `${Math.floor(1000000000 + Math.random() * 9000000000)}`,
            pagibig: `${Math.floor(1000000000 + Math.random() * 9000000000)}`,
            taxes: `${Math.floor(100000000 + Math.random() * 900000000)}`,
            house_number: `${i}`,
            street: ["Main", "Oak", "Pine", "Maple", "Cedar"][i % 5],
            barangay_municipality: `Barangay ${i % 10 + 1}`
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
            tr.innerHTML = `<td colspan="10" class="text-center">No matching records found</td>`;
            tbody.appendChild(tr);
        } else {
            for (let i = start; i < end; i++) {
                const row = filteredData[i];
                const tr = document.createElement("tr");
                tr.innerHTML = `
                    <td>${row.id}</td>
                    <td>${row.fullName}</td>
                    <td>${row.designation}</td>
                    <td>${row.position}</td>
                    <td>${row.contact_number}</td>
                    <td>${row.philhealth}</td>
                    <td>${row.sss}</td>
                    <td>${row.pagibig}</td>
                    <td><span class="badge ${row.status === 'Active' ? 'bg-success' : 'bg-danger'}">${row.status}</span></td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="javascript:void(0);" class="action-icon view-btn" title="View" data-id="${row.id}">
                                <i class="bx bx-show"></i>
                            </a>
                            <a href="javascript:void(0);" class="action-icon edit-btn" title="Edit" data-id="${row.id}">
                                <i class="bx bx-edit"></i>
                            </a>
                            <a href="javascript:void(0);" class="action-icon delete-btn" title="Delete" data-id="${row.id}">
                                <i class="bx bx-trash"></i>
                            </a>
                        </div>
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

function setupViewEmployee() {
    document.addEventListener("click", function(e) {
        if (e.target.closest(".view-btn")) {
            const btn = e.target.closest(".view-btn");
            const id = parseInt(btn.getAttribute("data-id"));
            const employee = originalData.find(item => item.id === id);
            if (employee) {
                document.getElementById("viewFullName").textContent = employee.fullName;
                document.getElementById("viewBirthdate").textContent = employee.birthdate;
                document.getElementById("viewGender").textContent = employee.gender;
                document.getElementById("viewContactPersonNumber").textContent = employee.contact_number;
                document.getElementById("viewAddress").textContent = 
                    `${employee.house_number} ${employee.street}, ${employee.barangay_municipality}`;
                document.getElementById("viewDateHired").textContent = employee.date_hired;
                viewModal.show();
            }
        }
    });
}

function setupEditEmployee() {
    document.addEventListener("click", function(e) {
        if (e.target.closest(".edit-btn")) {
            const btn = e.target.closest(".edit-btn");
            const id = parseInt(btn.getAttribute("data-id"));
            const employee = originalData.find(item => item.id === id);
            if (employee) {
                document.getElementById("editEmployeeId").value = employee.id;
                const [firstName, lastName] = employee.fullName.split(" ");
                document.getElementById("editFirstName").value = firstName;
                document.getElementById("editLastName").value = lastName;
                document.getElementById("editDesignation").value = employee.designation;
                document.getElementById("editPosition").value = employee.position;
                document.getElementById("editBirthdate").value = employee.birthdate;
                document.getElementById("editGender").value = employee.gender;
                document.getElementById("editContactNumber").value = employee.contact_number;
                document.getElementById("editDateHired").value = employee.date_hired;
                document.getElementById("editPhilhealth").value = employee.philhealth;
                document.getElementById("editSSS").value = employee.sss;
                document.getElementById("editPagibig").value = employee.pagibig;
                document.getElementById("editTaxes").value = employee.taxes;
                document.getElementById("editHouseNumber").value = employee.house_number;
                document.getElementById("editStreet").value = employee.street;
                document.getElementById("editBarangay").value = employee.barangay_municipality;
                
                editModal.show();
            }
        }
    });

    document.getElementById("saveEditBtn").addEventListener("click", function() {
        const id = parseInt(document.getElementById("editEmployeeId").value);
        const index = originalData.findIndex(item => item.id === id);
        if (index !== -1) {
            const firstName = document.getElementById("editFirstName").value;
            const lastName = document.getElementById("editLastName").value;
            
            originalData[index] = {
                ...originalData[index],
                firstName: firstName,
                lastName: lastName,
                fullName: `${firstName} ${lastName}`,
                designation: document.getElementById("editDesignation").value,
                position: document.getElementById("editPosition").value,
                birthdate: document.getElementById("editBirthdate").value,
                gender: document.getElementById("editGender").value,
                contact_number: document.getElementById("editContactNumber").value,
                date_hired: document.getElementById("editDateHired").value,
                philhealth: document.getElementById("editPhilhealth").value,
                sss: document.getElementById("editSSS").value,
                pagibig: document.getElementById("editPagibig").value,
                taxes: document.getElementById("editTaxes").value,
                house_number: document.getElementById("editHouseNumber").value,
                street: document.getElementById("editStreet").value,
                barangay_municipality: document.getElementById("editBarangay").value
            };
            
            showPage(currentPage, currentFilter);
            showToast("Employee updated successfully!");
            editModal.hide();
        }
    });
}

function setupDeleteEmployee() {
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
            showToast("Employee deleted successfully!");
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
    setupViewEmployee();
    setupEditEmployee();
    setupDeleteEmployee();
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