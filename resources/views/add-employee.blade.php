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
                            <h4 class="mb-0 fw-semibold">Add Employee</h4>
                            <ol class="breadcrumb mb-0">
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- ========== Page Title End ========== -->

                <!-- Start here.... -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="#" method="POST">
                                    <div class="row">

                                        <!-- Full Name -->
                                        <div class="col-md-6 mb-3">
                                            <label for="employeeName" class="form-label">Full Name</label>
                                            <input type="text" class="form-control" id="employeeName" placeholder="Enter full name" required>
                                        </div>

                                        <!-- Designation -->
                                        <div class="col-md-6 mb-3">
                                            <label for="employeeDesignation" class="form-label">Designation</label>
                                            <input type="text" class="form-control" id="employeeDesignation" placeholder="Employee's designation">
                                        </div>

                                        <!-- Position -->
                                        <div class="col-md-6 mb-3">
                                            <label for="employeePosition" class="form-label">Position</label>
                                            <input type="text" class="form-control" id="employeePosition" placeholder="e.g., Sales Agent, Manager">
                                        </div>

                                        <!-- Contact Number -->
                                        <div class="col-md-6 mb-3">
                                            <label for="employeeContact" class="form-label">Contact Number</label>
                                            <input type="tel" class="form-control" id="employeeContact" placeholder="+63 912 345 6789">
                                        </div>

                                        <!-- PhilHealth -->
                                        <div class="col-md-4 mb-3">
                                            <label for="employeePhilHealth" class="form-label">PhilHealth Number</label>
                                            <input type="text" class="form-control" id="employeePhilHealth" placeholder="00-123456789-0">
                                        </div>

                                        <!-- SSS -->
                                        <div class="col-md-4 mb-3">
                                            <label for="employeeSSS" class="form-label">SSS Number</label>
                                            <input type="text" class="form-control" id="employeeSSS" placeholder="12-3456789-0">
                                        </div>

                                        <!-- Pag-IBIG -->
                                        <div class="col-md-4 mb-3">
                                            <label for="employeePagIBIG" class="form-label">Pag-IBIG Number</label>
                                            <input type="text" class="form-control" id="employeePagIBIG" placeholder="1234-5678-9012">
                                        </div>

                                        <!-- Status -->
                                        <div class="col-md-6 mb-3">
                                            <label for="employeeStatus" class="form-label">Status</label>
                                            <select class="form-select" id="employeeStatus">
                                                <option selected>Select status</option>
                                                <option value="Active">Active</option>
                                                <option value="On Leave">On Leave</option>
                                                <option value="Inactive">Inactive</option>
                                                <option value="Probation">Probation</option>
                                            </select>
                                        </div>

                                        <!-- Birthdate -->
                                        <div class="col-md-6 mb-3">
                                            <label for="employeeBirthdate" class="form-label">Birthdate</label>
                                            <input type="date" class="form-control" id="employeeBirthdate">
                                        </div>

                                        <!-- Address -->
                                        <div class="col-md-12 mb-3">
                                            <label for="employeeAddress" class="form-label">Address</label>
                                            <textarea class="form-control" id="employeeAddress" rows="2" placeholder="Complete address"></textarea>
                                        </div>

                                        <!-- Gender -->
                                        <div class="col-md-6 mb-3">
                                            <label for="employeeGender" class="form-label">Gender</label>
                                            <select class="form-select" id="employeeGender">
                                                <option selected>Select gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>

                                        <!-- Date Hired -->
                                        <div class="col-md-6 mb-3">
                                            <label for="employeeDateHired" class="form-label">Date Hired</label>
                                            <input type="date" class="form-control" id="employeeDateHired">
                                        </div>

                                        <!-- Submit Buttons -->
                                        <div class="col-md-12 d-flex justify-content-end gap-2 mt-4">
                                            <button type="reset" class="btn btn-light">Reset</button>
                                            <button type="submit" class="btn btn-primary">Add Employee</button>
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