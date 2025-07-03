<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'supplier';
    protected $primaryKey = 'id';
    public $timestamps = true;  // Enable timestamps since they're in the migration

    protected $fillable = [
        'supplierName',
        'item',
        'qty',
        'netQty',
        'unitofmeasure',
        'dateIn',
        'dateOut'
    ];

    protected $casts = [
        'dateIn' => 'date',
        'dateOut' => 'date'
    ];
}