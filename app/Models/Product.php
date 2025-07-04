<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Add this import

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'description',
        'supplier_id',
        'unit_of_measure',
        'stock_level',
        'regular_price',
        'minimum_stock_threshold'
    ];

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }
}