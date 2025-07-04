<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index(Request $request)
    {
        if ($request->expectsJson() || $request->is('api/*')) {
            $query = Product::with('supplier')
                ->orderBy('created_at', 'desc');
            
            // Search functionality
            if ($search = $request->input('search')) {
                $query->where(function($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('type', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%")
                      ->orWhereHas('supplier', function($q) use ($search) {
                          $q->where('name', 'like', "%{$search}%");
                      });
                });
            }
            
            // Pagination
            $perPage = $request->input('per_page', 10);
            $products = $query->paginate($perPage);
            
            return response()->json([
                'success' => true,
                'message' => 'Products fetched successfully',
                'data' => $products
            ]);
        }
        
        return view('product-list');
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        return view('add-product');
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(StoreProductRequest $request)
    {
        try {
            $product = Product::create([
                'name' => $request->name,
                'type' => $request->type,
                'description' => $request->description,
                'supplier_id' => $request->supplier_id,
                'unit_of_measure' => $request->unit_of_measure,
                'stock_level' => $request->stock_level ?? 0,
                'regular_price' => $request->regular_price,
                'minimum_stock_threshold' => $request->minimum_stock_threshold,
            ]);

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Product created successfully',
                    'data' => $product
                ], 201);
            }

            return redirect()->route('products.index')
                ->with('success', 'Product created successfully');

        } catch (\Exception $e) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to create product',
                    'error' => $e->getMessage()
                ], 500);
            }

            return back()->withInput()->with('error', 'Failed to create product: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified product.
     */
    public function show($id)
    {
        try {
            $product = Product::with('supplier')->findOrFail($id);
            
            if (request()->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Product fetched successfully',
                    'data' => $product
                ]);
            }
            
            return view('product-show', compact('product'));
            
        } catch (\Exception $e) {
            if (request()->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Product not found',
                    'error' => $e->getMessage()
                ], 404);
            }
            
            return back()->with('error', 'Product not found');
        }
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('product-edit', compact('product'));
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $product = Product::findOrFail($id);
            
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'type' => 'required|string|max:255',
                'description' => 'nullable|string',
                'supplier_id' => 'required|exists:suppliers,id',
                'unit_of_measure' => 'required|string|max:255',
                'stock_level' => 'nullable|integer|min:0',
                'regular_price' => 'required|numeric|min:0',
                'minimum_stock_threshold' => 'nullable|integer|min:0',
            ]);
            
            $product->update($validated);
            
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Product updated successfully',
                    'data' => $product
                ]);
            }
            
            return redirect()->route('products.index')
                ->with('success', 'Product updated successfully');
                
        } catch (\Exception $e) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to update product',
                    'error' => $e->getMessage()
                ], 500);
            }
            
            return back()->withInput()->with('error', 'Failed to update product');
        }
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();
            
            if (request()->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Product deleted successfully'
                ]);
            }
            
            return redirect()->route('products.index')
                ->with('success', 'Product deleted successfully');
                
        } catch (\Exception $e) {
            if (request()->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to delete product',
                    'error' => $e->getMessage()
                ], 500);
            }
            
            return back()->with('error', 'Failed to delete product');
        }
    }
}