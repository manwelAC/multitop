<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\EmployeeController;

// Test route for API
Route::get('/test-api', function() {
    return response()->json(['message' => 'API is working']);
});

// Test database connection
Route::get('/test-db', function() {
    try {
        DB::connection()->getPdo();
        $tables = DB::select('SHOW TABLES');
        return response()->json([
            'connection' => 'Database is connected',
            'tables' => $tables
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'error' => 'Could not connect to the database. ' . $e->getMessage()
        ], 500);
    }
});

// Login Routes
Route::get('/', [LoginController::class, 'showLoginForm'])->name('index');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Protected Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // API Routes
    Route::get('/api/suppliers', [SupplierController::class, 'index']);
    Route::post('/api/suppliers', [SupplierController::class, 'store']);
    Route::get('/api/suppliers/{supplier}', [SupplierController::class, 'show']);
    Route::put('/api/suppliers/{supplier}', [SupplierController::class, 'update']);
    Route::delete('/api/suppliers/{supplier}', [SupplierController::class, 'destroy']);
    
    // Product Routes (using resource controller)
    Route::resource('products', ProductController::class);

    // Other Routes
    Route::get('/product-list', function() {
        return view('product-list');
    });
    Route::get('/customer-list', function() {
        return view('customer-list');
    });
    Route::get('/add-customer', function() {
        return view('add-customer');
    });
    Route::get('/customer-suppliers', function() {
        return view('supplier-list');
    });
    Route::get('/add-suppliers', function() {
        return view('add-suppliers');
    });
    Route::get('/return-product', function() {
        return view('return-product');
    });
    Route::get('/container-list', function() {
        return view('container-list');
    });
    Route::get('/add-container', function() {
        return view('add-container');
    });
    Route::get('/supplier-list', function() {
        return view('supplier-list');
    });
    Route::get('/add-supplier', function() {
        return view('add-supplier');
    });
    Route::get('/employee-ir', function() {
        return view('employee-ir');
    });
    Route::get('/add-employee', function() {
        return view('add-employee');
    });
    Route::get('/employee-tr', function() {
        return view('employee-tr');
    });
    Route::get('/add-collection', function() {
        return view('add-collection');
    });
    Route::get('/collection-reports', function() {
        return view('collection-reports');
    });
    Route::get('/add-expenses', function() {
        return view('add-expenses');
    });
    Route::get('/expenses-report', function() {
        return view('expenses-report');
    });
    Route::get('/ar-reports', function() {
        return view('ar-reports');
    });
    Route::get('/add-ar-reports', function() {
        return view('add-ar-reports');
    });
    Route::get('/list-sales', function() {
        return view('list-sales');
    });
    Route::get('/add-sales', function() {
        return view('add-sales');
    });
    Route::get('/final-backloading', function() {
        return view('final-backloading');
    });
    Route::get('/final-loading-form', function() {
        return view('final-loading-form');
    });
    Route::get('/product-inventory', function() {
        return view('product-inventory');
    });
    Route::get('/withdrawal', function() {
        return view('withdrawal');
    });
    Route::get('/withdrawal-list', function() {
        return view('withdrawal-list');
    });

    // API Routes (these should actually be in api.php, but adding here for testing)
    Route::get('/api/customers', [CustomerController::class, 'index']);
    Route::post('/api/customers', [CustomerController::class, 'store']);
    Route::get('/api/customers/{customer}', [CustomerController::class, 'show']);
    Route::put('/api/customers/{customer}', [CustomerController::class, 'update']);
    Route::delete('/api/customers/{customer}', [CustomerController::class, 'destroy']);

    // Employee routes
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
    Route::get('/api/employees', [EmployeeController::class, 'getEmployees'])->name('employees.get');
    Route::post('/api/employees', [EmployeeController::class, 'store'])->name('employees.store');
    Route::put('/api/employees/{id}', [EmployeeController::class, 'update'])->name('employees.update');
    Route::delete('/api/employees/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
});

// Customer Routes
Route::get('/customer-list', function() {
    return view('customer-list');
});
Route::get('/add-customer', [CustomerController::class, 'showAddForm'])->name('add.customer');
Route::post('/add-customer', [CustomerController::class, 'store'])->name('store.customer');

// Supplier Routes
Route::get('/customer-suppliers', function() {
    return view('supplier-list');
});
Route::get('/add-suppliers', [SupplierController::class, 'create'])->name('add-supplier.create');
Route::post('/add-suppliers', [SupplierController::class, 'store'])->name('add-supplier.store');
