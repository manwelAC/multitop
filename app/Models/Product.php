<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'type',
        'type_other',
        'description',
        'supplier_id',
        'unit_of_measure',
        'stock_level',
        'regular_price',
        'minimum_stock_threshold',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'regular_price' => 'decimal:2',
        'stock_level' => 'integer',
        'minimum_stock_threshold' => 'integer',
    ];

    /**
     * Get the supplier that owns the product.
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }


    /**
     * Get the display type for the product.
     * Returns type_other if type is "Others", otherwise returns type.
     */
    public function getDisplayTypeAttribute()
    {
        return $this->type === 'Others' && $this->type_other ? $this->type_other : $this->type;
    }
}
