<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use DataTables;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {
        try {
            // Enable query logging
            DB::enableQueryLog();

            Log::info('CustomerController@index called');

            // Get all customers
            $customers = Customer::all();

            // Log the SQL query
            Log::info('SQL Query:', DB::getQueryLog());

            // Log the results
            Log::info('Customers found:', [
                'count' => $customers->count(),
                'data' => $customers->toArray()
            ]);

            return response()->json([
                'status' => 'success',
                'data' => $customers
            ]);

        } catch (\Exception $e) {
            Log::error('Error in CustomerController@index', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'Failed to fetch customers: ' . $e->getMessage()
            ], 500);
        }
    }

    public function showAddForm()
    {
        return view('add-customer');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'customer_name' => 'required|string|max:255',
                'store_name' => 'required|string|max:255',
                'email' => 'required|email|unique:customers,email',
                'address' => 'nullable|string',
                'store_address' => 'required|string',
                'warehouse_address' => 'nullable|string',
                'businessType' => 'required|string',
                'contact_person' => 'required|string',
                'birthday' => 'nullable|date',
                'payment_terms' => 'nullable|string'
            ]);

            $customer = Customer::create($validated);

            return response()->json([
                'status' => 'success',
                'message' => 'Customer added successfully',
                'data' => $customer
            ]);

        } catch (\Exception $e) {
            Log::error('Error in CustomerController@store', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'Failed to add customer: ' . $e->getMessage()
            ], 500);
        }
    }

    public function show(Customer $customer)
    {
        return response()->json([
            'status' => 'success',
            'data' => $customer
        ]);
    }

    public function update(Request $request, Customer $customer)
    {
        try {
            $validated = $request->validate([
                'customer_name' => 'required|string|max:255',
                'store_name' => 'required|string|max:255',
                'email' => 'required|email|unique:customers,email,' . $customer->customer_id . ',customer_id',
                'address' => 'nullable|string',
                'store_address' => 'required|string',
                'warehouse_address' => 'nullable|string',
                'businessType' => 'required|string',
                'contact_person' => 'required|string',
                'birthday' => 'nullable|date',
                'payment_terms' => 'nullable|string'
            ]);

            $customer->update($validated);

            return response()->json([
                'status' => 'success',
                'message' => 'Customer updated successfully',
                'data' => $customer
            ]);

        } catch (\Exception $e) {
            Log::error('Error in CustomerController@update', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update customer: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy(Customer $customer)
    {
        try {
            $customer->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Customer deleted successfully'
            ]);

        } catch (\Exception $e) {
            Log::error('Error in CustomerController@destroy', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'Failed to delete customer: ' . $e->getMessage()
            ], 500);
        }
    }

    public function data()
    {
        $customers = Customer::select([
            'customer_id',
            'customer_name',
            'store_name',
            'email',
            'address',
            'store_address',
            'warehouse_address',
            'businessType',
            'contact_person',
            'payment_terms',
            'birthday'
        ]);

        return DataTables::of($customers)
            ->addColumn('action', function ($customer) {
                return '
                    <a href="javascript:void(0);" class="action-icon edit-btn" data-id="'.$customer->customer_id.'">
                        <i class="bx bx-edit"></i>
                    </a>
                    <a href="javascript:void(0);" class="action-icon delete-btn" data-id="'.$customer->customer_id.'">
                        <i class="bx bx-trash"></i>
                    </a>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}