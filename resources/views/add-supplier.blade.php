<!DOCTYPE html>
<html lang="en">

<head>
     <!-- Title Meta -->
     <meta charset="utf-8" />
     <title>Dashboard</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="A fully responsive premium admin dashboard template" />
     <meta name="author" content="Techzaa" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <meta name="csrf-token" content="{{ csrf_token() }}">

     <!-- App favicon -->
     <link rel="shortcut icon" href="{{ asset('venton/assets/images/favicon.ico') }}">

     <!-- Vendor css (Require in all Page) -->
     <link href="{{ asset('venton/assets/css/vendor.min.css') }}" rel="stylesheet" type="text/css" />

     <!-- Icons css (Require in all Page) -->
     <link href="{{ asset('venton/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

     <!-- App css (Require in all Page) -->
     <link href="{{ asset('venton/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

     <!-- SweetAlert2 CSS -->
     <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

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
                            <h4 class="mb-0 fw-semibold">Add Supplier Inventory</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form id="supplierForm" method="POST" action="{{ route('add-supplier.store') }}">
                                        @csrf
                                        <div class="row">
                                            <!-- Supplier Name -->
                                            <div class="col-md-6 mb-3">
                                                <label for="supplierName" class="form-label">Supplier Name</label>
                                                <input type="text" class="form-control" id="supplierName" name="supplierName" required>
                                            </div>

                                            <!-- Net Qty -->
                                            <div class="col-md-6 mb-3">
                                                <label for="netQty" class="form-label">Net Quantity</label>
                                                <input type="number" min="0" class="form-control" id="netQty" name="netQty" placeholder="Net quantity" required>
                                            </div>


                                            <!-- Date In -->
                                            <div class="col-md-6 mb-3">
                                                <label for="dateIn" class="form-label">Date In</label>
                                                <input type="date" class="form-control" id="dateIn" name="dateIn" required>
                                            </div>

                                            <!-- Date Out -->
                                            <div class="col-md-6 mb-3">
                                                <label for="dateOut" class="form-label">Date Out</label>
                                                <input type="date" class="form-control" id="dateOut" name="dateOut">
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
    <script src="{{ asset('venton/assets/vendor/jsvectormap/maps/world.js') }}"></script>
    <script src="{{ asset('venton/assets/js/pages/dashboard.js') }}"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- custom script here -->
    <script>
        // Handle session flash messages
        @if(session('swal'))
            Swal.fire({
                icon: '{{ session('swal.icon') }}',
                title: '{{ session('swal.title') }}',
                text: '{{ session('swal.text') }}',
                showConfirmButton: true,
                timer: 3000,
                confirmButtonColor: '{{ session('swal.icon') === 'success' ? '#3085d6' : '#d33' }}'
            });
        @endif

        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('supplierForm');
            
            if (!form) {
                console.error('Could not find the form with ID "supplierForm"');
                return;
            }

            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const formData = new FormData(this);

                // Show loading state
                Swal.fire({
                    title: 'Processing...',
                    text: 'Please wait while we save your record',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                fetch('/add-suppliers', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    },
                    credentials: 'same-origin'
                })
                .then(response => {
                    // First check if the response has JSON content
                    const contentType = response.headers.get('content-type');
                    if (contentType && contentType.includes('application/json')) {
                        return response.json().then(data => ({status: response.status, body: data}));
                    }
                    return response.text().then(text => ({status: response.status, body: text}));
                })
                .then(({status, body}) => {
                    // Always show success if status is 200-299
                    if (status >= 200 && status < 300) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Supplier record has been saved successfully!',
                            showConfirmButton: true,
                            confirmButtonColor: '#3085d6',
                            timer: 3000
                        }).then(() => {
                            form.reset();
                        });
                    } else {
                        throw new Error(typeof body === 'object' ? body.message : 'Failed to save the record');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: error.message || 'Failed to save the record. Please try again.',
                        confirmButtonColor: '#d33'
                    });
                });
            });
        });
    </script>
</body>
</html>