<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SupplierController extends Controller
{
    public function create()
    {
        return view('add-supplier');
    }

    public function store(Request $request)
    {
        try {
            Log::info('Supplier store method called', ['request' => $request->all()]);

            $validated = $request->validate([
                'supplierName' => 'required|string|max:100',
                'item' => 'required|string|max:100',
                'qty' => 'required|numeric|min:0',
                'netQty' => 'required|numeric|min:0',
                'unitofmeasure' => 'required|in:Units,Kilos,Liters,Boxes',
                'dateIn' => 'required|date',
                'dateOut' => 'nullable|date',
            ]);

            Log::info('Validation passed', ['validated' => $validated]);

            $supplier = Supplier::create([
                'supplierName' => $validated['supplierName'],
                'item' => $validated['item'],
                'qty' => $validated['qty'],
                'netQty' => $validated['netQty'],
                'unitofmeasure' => $validated['unitofmeasure'],
                'dateIn' => $validated['dateIn'],
                'dateOut' => $validated['dateOut'] ?? null,
            ]);

            Log::info('Supplier created successfully', ['supplier' => $supplier]);

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Supplier added successfully!',
                    'data' => $supplier
                ]);
            }

            return redirect()->back()->with('swal', [
                'icon' => 'success',
                'title' => 'Success!',
                'text' => 'Supplier record has been saved successfully!'
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation failed', ['errors' => $e->errors()]);
            
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation error',
                    'errors' => $e->errors()
                ], 422);
            }

            return redirect()->back()->with('swal', [
                'icon' => 'error',
                'title' => 'Validation Error',
                'text' => 'Please check your input and try again.'
            ])->withErrors($e->errors())->withInput();

        } catch (\Exception $e) {
            Log::error('Error saving supplier', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error saving supplier: ' . $e->getMessage()
                ], 500);
            }

            return redirect()->back()->with('swal', [
                'icon' => 'error',
                'title' => 'Error!',
                'text' => 'Failed to save the supplier record. Please try again.'
            ])->withInput();
        }
    }

    public function index()
    {
        try {
            $suppliers = Supplier::select(
                'supplier_id',
                'supplierName',
                'item',
                'qty',
                'netQty',
                'unitofmeasure',
                'dateIn',
                'dateOut'
            )->get();
            
            return response()->json($suppliers);
        } catch (\Exception $e) {
            Log::error('Error fetching suppliers', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json([
                'error' => 'Error fetching suppliers: ' . $e->getMessage()
            ], 500);
        }
    }
}