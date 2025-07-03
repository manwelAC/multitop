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
                                   <h4 class="mb-0 fw-semibold">Withdrawal</h4>
                              </div>
                         </div>
                         </div>

                         <div class="row">
                         <div class="col-12">
                              <div class="card">
                                   <div class="card-body">
                                        <form id="withdrawalForm" method="POST">
                                             <div class="row">
                                             <!-- Customer Selection Section -->
                                             <div class="col-md-12 mb-3">
                                                  <label for="customerSelect" class="form-label">Add Order</label>
                                                  <select class="form-select" id="customerSelect">
                                                       <option selected disabled value="">Select Order</option>
                                                       <option value="ORDER-001" 
                                                            data-phone="09665494231"
                                                            data-address="Caloocan City" 
                                                            data-items='[{"id":1,"name":"Styro Cup Coffee Express 8oz","stock":50,"price":45.99},{"id":2,"name":"Styro Cup 8oz MP","stock":30,"price":18.50},{"id":3,"name":"Styro Bowl Eps12oz STC","stock":25,"price":32.75}]'>
                                                            ORDER-001 (3 items)
                                                       </option>
                                                       <option value="ORDER-002" 
                                                            data-phone="09887452145"
                                                            data-address="Las Pinas" 
                                                            data-items='[{"id":4,"name":"Styro Bowl EPS12oz MP","stock":40,"price":22.99},{"id":5,"name":"Styro Plate Round FC","stock":15,"price":15.25}]'>
                                                            ORDER-002 (2 items)
                                                       </option>
                                                       <option value="ORDER-003" 
                                                            data-phone="09864872198"
                                                            data-address="Romblon" 
                                                            data-items='[{"id":6,"name":"Styro Cup 12oz","stock":60,"price":20.50},{"id":7,"name":"Styro Plate Square","stock":35,"price":18.75},{"id":8,"name":"Styro Bowl 16oz","stock":20,"price":28.99},{"id":9,"name":"Styro Cup Lid","stock":100,"price":5.25}]'>
                                                            ORDER-003 (4 items)
                                                       </option>
                                                       <option value="ORDER-004" 
                                                            data-phone="09885462548"
                                                            data-address="Quezon City" 
                                                            data-items='[{"id":10,"name":"Styro Box Small","stock":25,"price":35.99},{"id":11,"name":"Styro Box Medium","stock":20,"price":45.99},{"id":12,"name":"Styro Box Large","stock":15,"price":55.99}]'>
                                                            ORDER-004 (3 items)
                                                       </option>
                                                       <option value="ORDER-005" 
                                                            data-phone="09714451147"
                                                            data-address="Talavera" 
                                                            data-items='[{"id":13,"name":"Styro Tray Rectangle","stock":40,"price":12.50},{"id":14,"name":"Styro Tray Square","stock":30,"price":10.75}]'>
                                                            ORDER-005 (2 items)
                                                       </option>
                                                  </select>
                                             </div>
                                             
                                             <!-- Date Field -->
                                             <div class="col-md-12 mb-3">
                                                  <label for="date" class="form-label">Date</label>
                                                  <input type="date" class="form-control" id="date" required>
                                             </div>
                                             
                                             <!-- Customers Details Container -->
                                             <div class="col-md-12 mb-3" id="customersContainer">
                                                  <div class="alert alert-info">
                                                       Order details will appear here when selected.
                                                  </div>
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

                         <!-- Toast Notification -->
                         <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                         <div id="successToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                              <div class="toast-header bg-success text-white">
                                   <strong class="me-auto">Success</strong>
                                   <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
                              </div>
                              <div class="toast-body">
                                   Record saved successfully! Redirecting to withdrawal list...
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
    // Database simulation
    const database = {
        withdrawals: [],
        receipts: []
    };

    // Set today's date as default
    document.addEventListener('DOMContentLoaded', function() {
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('date').value = today;
        
        // Auto-add customer when selected
        document.getElementById('customerSelect').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            
            if (!selectedOption || selectedOption.disabled) {
                return;
            }
            
            addCustomer(selectedOption);
            this.selectedIndex = 0; // Reset to placeholder
            this.blur(); // Close dropdown
        });
    });

    // Track selected customers
    const selectedCustomers = new Set();
    let receiptCounter = 1;

    function showToast(message, type = 'success') {
        const toast = new bootstrap.Toast(document.getElementById('successToast'));
        const toastBody = document.querySelector('.toast-body');
        const toastHeader = document.querySelector('.toast-header');
        
        // Update toast content
        toastBody.textContent = message;
        toastHeader.className = `toast-header bg-${type} text-white`;
        toastHeader.querySelector('strong').textContent = type.charAt(0).toUpperCase() + type.slice(1);
        
        toast.show();
    }

    function addCustomer(selectedOption) {
        const customerName = selectedOption.value;
        
        // Don't add if already selected
        if (selectedCustomers.has(customerName)) {
            showToast('Customer already added', 'warning');
            return;
        }
        
        // Mark as selected
        selectedCustomers.add(customerName);
        selectedOption.disabled = true;
        
        // Create customer details card
        createCustomerDetailsCard(selectedOption);
        
        showToast(`${customerName} added successfully`);
    }

    function generateReceiptNumber() {
        const now = new Date();
        const year = now.getFullYear().toString().slice(-2);
        const month = String(now.getMonth() + 1).padStart(2, '0');
        const day = String(now.getDate()).padStart(2, '0');
        const counter = String(receiptCounter++).padStart(3, '0');
        return `RCPT-${year}${month}${day}-${counter}`;
    }

    function removeCustomer(customerName) {
        // Remove from selected set
        selectedCustomers.delete(customerName);
        
        // Enable in dropdown
        const customerSelect = document.getElementById('customerSelect');
        for (let i = 0; i < customerSelect.options.length; i++) {
            if (customerSelect.options[i].value === customerName) {
                customerSelect.options[i].disabled = false;
                break;
            }
        }
        
        // Remove details card if exists
        const cardToRemove = document.querySelector(`.customer-card[data-customer="${customerName}"]`);
        if (cardToRemove) {
            cardToRemove.remove();
        }
        
        // Show empty message if no customers left
        if (selectedCustomers.size === 0) {
            document.getElementById('customersContainer').innerHTML = `
                <div class="alert alert-info">
                    Order details will appear here when selected.
                </div>
            `;
        }
        
        showToast(`${customerName} removed`, 'info');
    }

    function createCustomerDetailsCard(selectedOption) {
        const customerName = selectedOption.value;
        const phone = selectedOption.getAttribute('data-phone');
        const address = selectedOption.getAttribute('data-address');
        const items = JSON.parse(selectedOption.getAttribute('data-items'));
        
        // Create customer card
        const customerCard = document.createElement('div');
        customerCard.className = 'card mb-3 customer-card';
        customerCard.setAttribute('data-customer', customerName);
        customerCard.innerHTML = `
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">${customerName}</h5>
                <button type="button" class="btn btn-sm btn-danger remove-customer-details" 
                    data-customer="${customerName}">Remove</button>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Phone Number</label>
                        <input type="text" class="form-control" value="${phone}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" value="${address}" readonly>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <label class="form-label">Product Information</label>
                        <div class="stock-info-container d-flex flex-wrap gap-3 mb-3"></div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <label class="form-label">Withdrawal Details</label>
                        <div class="products-container"></div>
                    </div>
                </div>
                
                <!-- Dispatch Team Section -->
                <div class="row mt-3">
                    <div class="col-12">
                        <label class="form-label">Dispatch Team</label>
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <label class="form-label">Driver</label>
                                <input type="text" class="form-control driver-name" placeholder="Driver name">
                            </div>
                            <div class="col-md-4 mb-2">
                                <label class="form-label">Helper 1</label>
                                <input type="text" class="form-control helper1-name" placeholder="Helper 1 name">
                            </div>
                            <div class="col-md-4 mb-2">
                                <label class="form-label">Helper 2</label>
                                <input type="text" class="form-control helper2-name" placeholder="Helper 2 name">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
        
        // Add product information
        const stockContainer = customerCard.querySelector('.stock-info-container');
        items.forEach(item => {
            const stockBadge = document.createElement('div');
            stockBadge.className = 'bg-light p-2 rounded';
            stockBadge.innerHTML = `
                <span class="fw-bold">${item.name}:</span> 
                <span class="text-primary">${item.stock} pack available</span>
                <span class="text-success ms-2">(₱${item.price.toFixed(2)} each)</span>
            `;
            stockContainer.appendChild(stockBadge);
        });
        
        // Add products with aligned controls
        const productsContainer = customerCard.querySelector('.products-container');
        items.forEach(item => {
            const productRow = document.createElement('div');
            productRow.className = 'row mb-3 align-items-center border-bottom pb-3';
            productRow.innerHTML = `
                <div class="col-md-5">
                    <label class="form-label">Product</label>
                    <input type="text" class="form-control" value="${item.name}" readonly>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Price</label>
                    <input type="text" class="form-control" value="₱${item.price.toFixed(2)}" readonly>
                </div>
                
                <!-- Original Order Quantity (Disabled) -->
                <div class="col-md-2">
                    <label class="form-label">Order Qty</label>
                    <input type="number" class="form-control" value="${item.stock}" readonly>
                </div>
                <div class="col-md-1">
                    <label class="form-label">Unit</label>
                    <input type="text" class="form-control" value="pack" readonly>
                </div>
                
                <!-- Withdrawal Quantity (Editable) -->
                <div class="col-md-2">
                    <label class="form-label">Withdraw Qty</label>
                    <input type="number" class="form-control withdrawal-quantity" min="0" max="${item.stock}" value="0" required>
                </div>
            `;
            productsContainer.appendChild(productRow);
        });
        
        // Add to container
        const customersContainer = document.getElementById('customersContainer');
        if (customersContainer.querySelector('.alert')) {
            customersContainer.innerHTML = '';
        }
        customersContainer.appendChild(customerCard);
        
        // Add remove functionality
        customerCard.querySelector('.remove-customer-details').addEventListener('click', function() {
            const customerToRemove = this.getAttribute('data-customer');
            removeCustomer(customerToRemove);
        });
    }
    
    function saveWithdrawalRecord(customersData) {
        // Generate a withdrawal number
        const now = new Date();
        const withdrawalNumber = `WD-${now.getFullYear()}${String(now.getMonth() + 1).padStart(2, '0')}${String(now.getDate()).padStart(2, '0')}-${database.withdrawals.length + 1}`;
        
        // Create withdrawal record
        const withdrawalRecord = {
            id: Date.now(),
            withdrawalNumber: withdrawalNumber,
            date: document.getElementById('date').value,
            customers: customersData,
            createdAt: new Date().toISOString(),
            status: 'completed'
        };
        
        // Save to database
        database.withdrawals.push(withdrawalRecord);
        
        // Save receipts to database
        customersData.forEach(customer => {
            database.receipts.push({
                receiptNumber: customer.receiptNumber,
                withdrawalNumber: withdrawalNumber,
                customerName: customer.customerName,
                phone: customer.phone,
                address: customer.address,
                items: customer.items,
                date: document.getElementById('date').value,
                createdAt: new Date().toISOString(),
                dispatchTeam: customer.dispatchTeam
            });
        });
    }

    function generateCustomerReceipt(customerData) {
        return `
            <div style="font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px; border: 1px solid #ddd;">
                <!-- Receipt Header -->
                <div style="text-align: center; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 2px solid #000;">
                    <h2 style="margin: 5px 0;">WITHDRAWAL RECEIPT</h2>
                    <p style="margin: 5px 0; font-weight: bold;">${customerData.receiptNumber}</p>
                    <p style="margin: 5px 0;">Date: ${new Date(customerData.date).toLocaleDateString()}</p>
                </div>
                
                <!-- Customer Information -->
                <div style="margin-bottom: 20px; padding: 10px; background: #f8f9fa; border-radius: 5px;">
                    <p style="margin: 5px 0;"><strong>Customer:</strong> ${customerData.customerName}</p>
                    <p style="margin: 5px 0;"><strong>Address:</strong> ${customerData.address}</p>
                    <p style="margin: 5px 0;"><strong>Contact:</strong> ${customerData.phone}</p>
                </div>
                
                <!-- Products Table -->
                <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                    <thead>
                        <tr style="background-color: #f0f0f0;">
                            <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Product</th>
                            <th style="border: 1px solid #ddd; padding: 8px; text-align: center;">Qty Ordered</th>
                            <th style="border: 1px solid #ddd; padding: 8px; text-align: center;">Qty Withdrawn</th>
                            <th style="border: 1px solid #ddd; padding: 8px; text-align: right;">Unit Price</th>
                            <th style="border: 1px solid #ddd; padding: 8px; text-align: right;">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${customerData.items.map(item => `
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px;">${item.name}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">${item.orderQuantity}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">${item.withdrawalQuantity}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: right;">₱${item.price.toFixed(2)}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: right;">₱${(item.price * item.withdrawalQuantity).toFixed(2)}</td>
                            </tr>
                        `).join('')}
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" style="border: 1px solid #ddd; padding: 8px; text-align: right; font-weight: bold;">GRAND TOTAL:</td>
                            <td style="border: 1px solid #ddd; padding: 8px; text-align: right; font-weight: bold;">
                                ₱${customerData.items.reduce((sum, item) => sum + (item.price * item.withdrawalQuantity), 0).toFixed(2)}
                            </td>
                        </tr>
                    </tfoot>
                </table>
                
                <!-- Delivery Information Section -->
                <div style="margin-top: 30px; padding: 15px; border: 1px solid #ddd; border-radius: 5px;">
                    <h3 style="margin-top: 0; border-bottom: 1px solid #eee; padding-bottom: 5px;">DELIVERY INFORMATION</h3>
                    
                    <!-- Dispatch Team -->
                    <div style="display: flex; justify-content: space-between; margin-bottom: 20px;">
                        <div style="width: 30%; text-align: center;">
                            <p style="margin-bottom: 5px;"><strong>DRIVER</strong></p>
                            <div style="height: 1px; background: #000; margin: 10px 0;"></div>
                            <p style="margin-top: 40px;">${customerData.dispatchTeam.driver || '(Name)'}</p>
                            <div style="height: 1px; background: #000; margin: 15px 20px 5px;"></div>
                            <p>Signature</p>
                        </div>
                        
                        <div style="width: 30%; text-align: center;">
                            <p style="margin-bottom: 5px;"><strong>HELPER 1</strong></p>
                            <div style="height: 1px; background: #000; margin: 10px 0;"></div>
                            <p style="margin-top: 40px;">${customerData.dispatchTeam.helper1 || '(Name)'}</p>
                            <div style="height: 1px; background: #000; margin: 15px 20px 5px;"></div>
                            <p>Signature</p>
                        </div>
                        
                        <div style="width: 30%; text-align: center;">
                            <p style="margin-bottom: 5px;"><strong>HELPER 2</strong></p>
                            <div style="height: 1px; background: #000; margin: 10px 0;"></div>
                            <p style="margin-top: 40px;">${customerData.dispatchTeam.helper2 || '(Name)'}</p>
                            <div style="height: 1px; background: #000; margin: 15px 20px 5px;"></div>
                            <p>Signature</p>
                        </div>
                    </div>
                    
                    <!-- Delivery Details -->
                    <div style="display: flex; justify-content: space-between; margin-bottom: 15px;">
                        <div style="width: 48%;">
                            <p><strong>Dispatch Time:</strong> ____________________</p>
                            <p><strong>Vehicle Plate No.:</strong> ____________________</p>
                        </div>
                        <div style="width: 48%;">
                            <p><strong>Delivery Date:</strong> ____________________</p>
                            <p><strong>Actual Time Arrived:</strong> ____________________</p>
                        </div>
                    </div>
                    
                    <!-- Customer Acknowledgement -->
                    <div style="margin-top: 20px; padding-top: 10px; border-top: 1px solid #ddd;">
                        <p style="margin-bottom: 5px;"><strong>CUSTOMER ACKNOWLEDGEMENT</strong></p>
                        <p>I hereby acknowledge receipt of the above items in good condition:</p>
                        
                        <div style="display: flex; justify-content: space-between; margin-top: 20px;">
                            <div style="width: 45%;">
                                <div style="height: 1px; background: #000; margin: 30px 0 5px;"></div>
                                <p style="text-align: center;">Customer's Signature</p>
                            </div>
                            <div style="width: 45%;">
                                <div style="height: 1px; background: #000; margin: 30px 0 5px;"></div>
                                <p style="text-align: center;">Date Received</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Remarks -->
                    <div style="margin-top: 20px;">
                        <p style="margin-bottom: 5px;"><strong>REMARKS:</strong></p>
                        <div style="border: 1px solid #ddd; min-height: 50px; padding: 5px;">
                            <p>________________________________________________________________</p>
                            <p>________________________________________________________________</p>
                        </div>
                    </div>
                </div>
                
                <!-- Footer -->
                <div style="margin-top: 20px; text-align: center; font-size: 12px; color: #666;">
                    <p>Thank you for your business!</p>
                    <p>Please check all items upon receipt</p>
                </div>
            </div>
        `;
    }

    function generateCombinedPDFReceipt(customersData) {
        // Create combined receipt HTML with page breaks
        let combinedHtml = `
            <style>
                .receipt-page {
                    page-break-after: always;
                    padding: 20px;
                    font-family: Arial, sans-serif;
                    max-width: 800px;
                    margin: 0 auto;
                }
                .receipt-header {
                    text-align: center;
                    margin-bottom: 20px;
                }
                .receipt-table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-bottom: 20px;
                }
                .receipt-table th, .receipt-table td {
                    border: 1px solid #ddd;
                    padding: 8px;
                    text-align: left;
                }
                .receipt-table thead tr {
                    background-color: #f8f9fa;
                }
                .customer-info {
                    margin-bottom: 20px;
                }
                .signature-line {
                    border-top: 1px solid #000;
                    margin-top: 50px;
                    padding-top: 5px;
                }
            </style>
            
            <div style="font-family: Arial, sans-serif;">
                <!-- Cover Page -->
                <div class="receipt-page">
                    <div class="receipt-header">
                        <h2>WITHDRAWAL RECEIPTS</h2>
                        <p>${new Date().toLocaleDateString()}</p>
                        <p style="margin-top: 20px; font-size: 1.2rem;">Total Customers: ${customersData.length}</p>
                    </div>
                    
                    <table class="receipt-table">
                        <thead>
                            <tr>
                                <th>Receipt #</th>
                                <th>Customer</th>
                                <th>Items Count</th>
                                <th>Order Qty</th>
                                <th>Withdraw Qty</th>
                                <th>Total Amount</th>
                                <th>Dispatch Team</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${customersData.map(customer => {
                                const totalAmount = customer.items.reduce((sum, item) => sum + (item.price * item.withdrawalQuantity), 0);
                                const totalOrderQty = customer.items.reduce((sum, item) => sum + item.orderQuantity, 0);
                                const totalWithdrawQty = customer.items.reduce((sum, item) => sum + item.withdrawalQuantity, 0);
                                const dispatchTeam = customer.dispatchTeam ? 
                                    `Driver: ${customer.dispatchTeam.driver || 'N/A'}<br>
                                     Helper 1: ${customer.dispatchTeam.helper1 || 'N/A'}<br>
                                     Helper 2: ${customer.dispatchTeam.helper2 || 'N/A'}` : 'Not assigned';
                                return `
                                    <tr>
                                        <td>${customer.receiptNumber}</td>
                                        <td>${customer.customerName}</td>
                                        <td>${customer.items.length}</td>
                                        <td>${totalOrderQty}</td>
                                        <td>${totalWithdrawQty}</td>
                                        <td>₱${totalAmount.toFixed(2)}</td>
                                        <td>${dispatchTeam}</td>
                                    </tr>
                                `;
                            }).join('')}
                        </tbody>
                    </table>
                </div>
                
                <!-- Individual Receipts -->
                ${customersData.map(customer => `
                    <div class="receipt-page">
                        ${generateCustomerReceipt(customer)}
                    </div>
                `).join('')}
            </div>
        `;
        
        // Create temporary element for PDF generation
        const element = document.createElement('div');
        element.innerHTML = combinedHtml;
        
        // PDF options
        const opt = {
            margin: 10,
            filename: `withdrawal_receipts_${new Date().toISOString().split('T')[0]}.pdf`,
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
        };
        
        // Generate and download PDF
        html2pdf().set(opt).from(element).save();
    }

    // Form submission handler
    document.getElementById('withdrawalForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const customerCards = document.querySelectorAll('.customer-card');
        const toast = new bootstrap.Toast(document.getElementById('successToast'));
        
        if (customerCards.length === 0) {
            showToast('Please add at least one customer', 'danger');
            return;
        }
        
        const customersData = [];
        
        customerCards.forEach(card => {
            const customerName = card.querySelector('h5').textContent;
            const receiptNumber = generateReceiptNumber();
            const phone = card.querySelector('.card-body input[type="text"]').value;
            const address = card.querySelectorAll('.card-body input[type="text"]')[1].value;
            
            // Get dispatch team information
            const driver = card.querySelector('.driver-name').value;
            const helper1 = card.querySelector('.helper1-name').value;
            const helper2 = card.querySelector('.helper2-name').value;
            
            // Get all products and quantities
            const items = [];
            const productRows = card.querySelectorAll('.products-container .row');
            productRows.forEach(row => {
                const productName = row.querySelector('input[type="text"]').value;
                const price = parseFloat(row.querySelectorAll('input[type="text"]')[1].value.replace('₱', ''));
                const orderQuantity = parseInt(row.querySelectorAll('input[type="number"]')[0].value);
                const withdrawalQuantity = parseInt(row.querySelector('.withdrawal-quantity').value) || 0;
                
                items.push({
                    name: productName,
                    price: price,
                    orderQuantity: orderQuantity,
                    withdrawalQuantity: withdrawalQuantity
                });
            });
            
            customersData.push({
                customerName: customerName,
                receiptNumber: receiptNumber,
                phone: phone,
                address: address,
                items: items,
                date: document.getElementById('date').value,
                dispatchTeam: {
                    driver: driver,
                    helper1: helper1,
                    helper2: helper2
                }
            });
        });
        
        // Save the withdrawal record
        saveWithdrawalRecord(customersData);
        
        // Generate combined PDF
        generateCombinedPDFReceipt(customersData);
        
        // Show success toast
        showToast('Withdrawal recorded and receipts generated!', 'success');
        
        // Redirect after 2 seconds
        setTimeout(() => {
            window.location.href = 'withdrawal-list.html';
        }, 2000);
    });
</script>

</body>
</html>