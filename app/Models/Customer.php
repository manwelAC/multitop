<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $primaryKey = 'customer_id';

    protected $fillable = [
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
    ];
} 