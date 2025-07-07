<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductInventoryController extends Controller
{
    /**
     * Get all products with inventory data
     */
    public function index()
    {
        $products = Product::select('id', 'name', 'stock_level as beginning_qty')
            ->orderBy('name')
            ->get();

        return response()->json($products);
    }

    /**
     * Update product stock
     */
    public function updateStock(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'new_stock' => 'required|integer|min:0',
        ]);

        try {
            DB::beginTransaction();

            $product = Product::findOrFail($request->product_id);
            
            // Update the stock
            $product->stock_level += $request->new_stock;
            $product->save();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Stock updated successfully',
                'current_qty' => $product->stock_level,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Inventory update failed: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Failed to update stock: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get current stock for a product
     */
    public function getStock($productId)
    {
        $product = Product::findOrFail($productId);
        
        return response()->json([
            'beginning_qty' => $product->stock_level
        ]);
    }
}