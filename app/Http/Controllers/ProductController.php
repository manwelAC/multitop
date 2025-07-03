<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index(Request $request)
    {   
        $perPage = $request->input('per_page', 10);
        
        $query = Product::with(['supplier'])
            ->latest();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('type', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhereHas('supplier', function($q) use ($search) {
                      $q->where('supplierName', 'like', "%{$search}%");
                  });
            });
        }

        // API response
        if ($request->wantsJson()) {
            $products = $query->paginate($perPage);
            return response()->json([
                'data' => $products,
                'message' => 'Products retrieved successfully'
            ]);
        }

        // Web response
        $products = $query->paginate($perPage);
        
        if ($request->ajax()) {
            return response()->json([
                'html' => view('partials.product-table', compact('products'))->render(),
                'pagination' => (string)$products->links('pagination::bootstrap-5')
            ]);
        }

        return view('product-list', [
            'products' => $products,
            'firstItem' => $products->firstItem(),
            'lastItem' => $products->lastItem(),
            'total' => $products->total()
        ]);
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        return view('add-product');
    }

    /**
     * Store a newly created product in the database.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'type_other' => 'nullable|required_if:type,Others|string|max:255',
            'description' => 'nullable|string',
            'supplier_id' => 'required|integer|exists:supplier,id',
            'unit_of_measure' => 'nullable|string|max:50',
            'stock_level' => 'nullable|integer|min:0',
            'regular_price' => 'nullable|numeric|min:0',
            'special_price' => 'nullable|numeric|min:0',
            'minimum_stock_threshold' => 'nullable|integer|min:0',
        ]);

        try {
            // Start database transaction
            DB::beginTransaction();

            // Create the product
            $product = Product::create([
                'name' => $validated['name'],
                'type' => $validated['type'],
                'type_other' => $validated['type'] === 'Others' ? $validated['type_other'] : null,
                'description' => $validated['description'] ?? null,
                'supplier_id' => $validated['supplier_id'],
                'unit_of_measure' => $validated['unit_of_measure'] ?? null,
                'stock_level' => $validated['stock_level'] ?? 0,
                'regular_price' => $validated['regular_price'] ?? null,
                'special_price' => $validated['special_price'] ?? null,
                'minimum_stock_threshold' => $validated['minimum_stock_threshold'] ?? 0,
            ]);

            // Commit the transaction
            DB::commit();

            // API response
            if ($request->wantsJson()) {
                return response()->json([
                    'data' => $product,
                    'message' => 'Product created successfully'
                ], 201);
            }

            // Web response
            return redirect()->route('products.index')
                ->with('success', 'Product "' . $product->name . '" has been successfully added to the database!');

        } catch (\Exception $e) {
            // Rollback the transaction on error
            DB::rollback();
            
            // Log the error for debugging
            Log::error('Product creation failed: ' . $e->getMessage());

            // API response
            if ($request->wantsJson()) {
                return response()->json([
                    'message' => 'Failed to create product',
                    'error' => $e->getMessage()
                ], 500);
            }

            // Web response
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to add product. Please try again.');
        }
    }

    /**
     * Display the specified product.
     */
    public function show(Request $request, Product $product)
    {
        // API response
        if ($request->wantsJson()) {
            return response()->json([
                'data' => $product->load('supplier'),
                'message' => 'Product retrieved successfully'
            ]);
        }

        // Web response
        return view('product-show', compact('product'));
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product)
    {
        return view('product-edit', compact('product'));
    }

    /**
     * Update the specified product in the database.
     */
    public function update(Request $request, Product $product)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'type_other' => 'nullable|required_if:type,Others|string|max:255',
            'description' => 'nullable|string',
            'supplier_id' => 'required|integer|exists:supplier,id',
            'unit_of_measure' => 'nullable|string|max:50',
            'stock_level' => 'nullable|integer|min:0',
            'regular_price' => 'nullable|numeric|min:0',
            'special_price' => 'nullable|numeric|min:0',
            'minimum_stock_threshold' => 'nullable|integer|min:0',
        ]);

        try {
            // Update the product
            $product->update([
                'name' => $validated['name'],
                'type' => $validated['type'],
                'type_other' => $validated['type'] === 'Others' ? $validated['type_other'] : null,
                'description' => $validated['description'] ?? null,
                'supplier_id' => $validated['supplier_id'],
                'unit_of_measure' => $validated['unit_of_measure'] ?? null,
                'stock_level' => $validated['stock_level'] ?? 0,
                'regular_price' => $validated['regular_price'] ?? null,
                'special_price' => $validated['special_price'] ?? null,
                'minimum_stock_threshold' => $validated['minimum_stock_threshold'] ?? 0,
            ]);

            // API response
            if ($request->wantsJson()) {
                return response()->json([
                    'data' => $product,
                    'message' => 'Product updated successfully'
                ]);
            }

            // Web response
            return redirect()->route('products.index')
                ->with('success', 'Product updated successfully!');

        } catch (\Exception $e) {
            Log::error('Product update failed: ' . $e->getMessage());
            
            // API response
            if ($request->wantsJson()) {
                return response()->json([
                    'message' => 'Failed to update product',
                    'error' => $e->getMessage()
                ], 500);
            }

            // Web response
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to update product. Please try again.');
        }
    }

    /**
     * Remove the specified product from the database.
     */
    public function destroy(Request $request, Product $product)
    {
        try {
            $productName = $product->name;
            $product->delete();
            
            // API response
            if ($request->wantsJson()) {
                return response()->json([
                    'message' => 'Product deleted successfully'
                ]);
            }
            
            // AJAX response (for web)
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Product "' . $productName . '" has been deleted successfully!'
                ]);
            }
            
            // Web response
            return redirect()->route('products.index')
                ->with('success', 'Product "' . $productName . '" has been deleted successfully!');
                
        } catch (\Exception $e) {
            Log::error('Product deletion failed: ' . $e->getMessage());
            
            // API response
            if ($request->wantsJson()) {
                return response()->json([
                    'message' => 'Failed to delete product',
                    'error' => $e->getMessage()
                ], 500);
            }
            
            // AJAX response (for web)
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to delete product. Please try again.'
                ], 500);
            }
            
            // Web response
            return redirect()->back()
                ->with('error', 'Failed to delete product. Please try again.');
        }
    }
}
