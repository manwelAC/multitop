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
                            <h4 class="mb-0 fw-semibold">Manual Payroll</h4>
                            <ol class="breadcrumb mb-0">
                            </ol>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="#" method="POST">
                                    <div class="row">
                                        <!-- Employee Search -->
                                        <div class="col-md-6 mb-3">
                                            <label for="employeeSearch" class="form-label">Search Employee</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="employeeSearch" placeholder="Enter employee name">
                                                <button class="btn btn-primary" type="button" id="searchEmployee">Search</button>
                                            </div>
                                        </div>
                                        
                                        <!-- Employee Details (Will be filled after search) -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Employee Details</label>
                                            <div class="form-control-plaintext">
                                                <strong id="employeeNameDisplay">-</strong> | 
                                                <span id="employeePositionDisplay">-</span>
                                            </div>
                                        </div>
                                        
                                        <!-- Pay Period -->
                                        <div class="col-md-6 mb-3">
                                            <label for="payPeriodStart" class="form-label">Pay Period Start</label>
                                            <input type="date" class="form-control" id="payPeriodStart">
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="payPeriodEnd" class="form-label">Pay Period End</label>
                                            <input type="date" class="form-control" id="payPeriodEnd">
                                        </div>
                                        
                                        <!-- Hourly Rate -->
                                        <div class="col-md-4 mb-3">
                                            <label for="hourlyRate" class="form-label">Hourly Rate (₱)</label>
                                            <input type="number" class="form-control" id="hourlyRate" placeholder="0.00" step="0.01" min="0">
                                        </div>
                                        
                                        <!-- Days Worked -->
                                        <div class="col-md-4 mb-3">
                                            <label for="daysWorked" class="form-label">Total Days Worked</label>
                                            <input type="number" class="form-control" id="daysWorked" placeholder="0" min="0" max="31">
                                        </div>
                                        
                                        <!-- Hours Worked -->
                                        <div class="col-md-4 mb-3">
                                            <label for="hoursWorked" class="form-label">Total Hours Worked</label>
                                            <input type="number" class="form-control" id="hoursWorked" placeholder="0" min="0" max="744">
                                        </div>
                                        
                                        <!-- Overtime -->
                                        <div class="col-md-4 mb-3">
                                            <label for="otRate" class="form-label">OT Rate (Multiplier)</label>
                                            <input type="number" class="form-control" id="otRate" placeholder="1.25" step="0.01" min="1" value="1.25">
                                        </div>
                                        
                                        <div class="col-md-4 mb-3">
                                            <label for="otHours" class="form-label">OT Hours</label>
                                            <input type="number" class="form-control" id="otHours" placeholder="0" min="0">
                                        </div>
                                        
                                        <div class="col-md-4 mb-3">
                                            <label for="totalOt" class="form-label">Total OT Pay</label>
                                            <input type="text" class="form-control" id="totalOt" placeholder="₱0.00" readonly>
                                        </div>
                                        
                                        <!-- Calculation Results -->
                                        <div class="col-md-6 mb-3">
                                            <label for="subtotal" class="form-label">Subtotal (Regular Pay)</label>
                                            <input type="text" class="form-control" id="subtotal" placeholder="₱0.00" readonly>
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="totalPay" class="form-label">Total Pay</label>
                                            <input type="text" class="form-control bg-light" id="totalPay" placeholder="₱0.00" readonly>
                                        </div>
                                        
                                        <!-- Deductions Section -->
                                        <div class="col-12 mt-3 mb-3">
                                            <h5 class="mb-3">Deductions</h5>
                                            
                                            <div class="row">
                                                <div class="col-md-3 mb-3">
                                                    <label for="sssDeduction" class="form-label">SSS</label>
                                                    <input type="number" class="form-control" id="sssDeduction" placeholder="₱0.00" step="0.01" min="0">
                                                </div>
                                                
                                                <div class="col-md-3 mb-3">
                                                    <label for="philhealthDeduction" class="form-label">PhilHealth</label>
                                                    <input type="number" class="form-control" id="philhealthDeduction" placeholder="₱0.00" step="0.01" min="0">
                                                </div>
                                                
                                                <div class="col-md-3 mb-3">
                                                    <label for="pagibigDeduction" class="form-label">Pag-IBIG</label>
                                                    <input type="number" class="form-control" id="pagibigDeduction" placeholder="₱0.00" step="0.01" min="0">
                                                </div>
                                                
                                                <div class="col-md-3 mb-3">
                                                    <label for="otherDeductions" class="form-label">Other Deductions</label>
                                                    <input type="number" class="form-control" id="otherDeductions" placeholder="₱0.00" step="0.01" min="0">
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="totalDeductions" class="form-label">Total Deductions</label>
                                                    <input type="text" class="form-control" id="totalDeductions" placeholder="₱0.00" readonly>
                                                </div>
                                                
                                                <div class="col-md-6 mb-3">
                                                    <label for="netPay" class="form-label">Net Pay</label>
                                                    <input type="text" class="form-control bg-success text-white" id="netPay" placeholder="₱0.00" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Submit Buttons -->
                                        <div class="col-md-12 d-flex justify-content-end gap-2 mt-4">
                                            <button type="reset" class="btn btn-light">Reset</button>
                                            <button type="button" class="btn btn-secondary" id="calculateBtn">Calculate</button>
                                            <button type="submit" class="btn btn-primary">Save Payroll</button>
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
    <script>
document.addEventListener('DOMContentLoaded', function() {
    // This would normally be replaced with actual employee data search
    document.getElementById('searchEmployee').addEventListener('click', function() {
        // In a real application, this would search your database
        // For demo purposes, we'll just display sample data
        document.getElementById('employeeNameDisplay').textContent = "Juan Dela Cruz";
        document.getElementById('employeePositionDisplay').textContent = "Sales Agent";
    });
    
    // Calculate button handler
    document.getElementById('calculateBtn').addEventListener('click', function() {
        calculatePayroll();
    });
    
    // Auto-calculate when relevant fields change
    const calcFields = ['hourlyRate', 'daysWorked', 'hoursWorked', 'otRate', 'otHours', 
                       'sssDeduction', 'philhealthDeduction', 'pagibigDeduction', 'otherDeductions'];
    
    calcFields.forEach(field => {
        document.getElementById(field).addEventListener('change', calculatePayroll);
        document.getElementById(field).addEventListener('keyup', calculatePayroll);
    });
    
    function calculatePayroll() {
        // Get input values
        const hourlyRate = parseFloat(document.getElementById('hourlyRate').value) || 0;
        const daysWorked = parseInt(document.getElementById('daysWorked').value) || 0;
        const hoursWorked = parseInt(document.getElementById('hoursWorked').value) || 0;
        const otRate = parseFloat(document.getElementById('otRate').value) || 1.25;
        const otHours = parseInt(document.getElementById('otHours').value) || 0;
        
        // Calculate regular pay (using either days * 8 hours or direct hours input)
        const regularHours = hoursWorked > 0 ? hoursWorked : daysWorked * 8;
        const regularPay = regularHours * hourlyRate;
        
        // Calculate overtime pay
        const otPay = otHours * hourlyRate * otRate;
        
        // Calculate subtotals
        const subtotal = regularPay;
        const totalPay = regularPay + otPay;
        
        // Calculate deductions
        const sss = parseFloat(document.getElementById('sssDeduction').value) || 0;
        const philhealth = parseFloat(document.getElementById('philhealthDeduction').value) || 0;
        const pagibig = parseFloat(document.getElementById('pagibigDeduction').value) || 0;
        const other = parseFloat(document.getElementById('otherDeductions').value) || 0;
        const totalDeductions = sss + philhealth + pagibig + other;
        
        // Calculate net pay
        const netPay = totalPay - totalDeductions;
        
        // Update display fields
        document.getElementById('subtotal').value = '₱' + regularPay.toFixed(2);
        document.getElementById('totalOt').value = '₱' + otPay.toFixed(2);
        document.getElementById('totalPay').value = '₱' + totalPay.toFixed(2);
        document.getElementById('totalDeductions').value = '₱' + totalDeductions.toFixed(2);
        document.getElementById('netPay').value = '₱' + netPay.toFixed(2);
    }
});
</script>
</body>
</html>