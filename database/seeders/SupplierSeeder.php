<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $suppliers = [
            ['name' => 'ABC Suppliers Inc.', 'contact_person' => 'John Doe', 'phone' => '09123456789', 'email' => 'abc@suppliers.com', 'address' => '123 Main St, Manila'],
            ['name' => 'XYZ Trading Corp.', 'contact_person' => 'Jane Smith', 'phone' => '09234567890', 'email' => 'xyz@trading.com', 'address' => '456 Oak Ave, Quezon City'],
            ['name' => 'Global Imports Ltd.', 'contact_person' => 'Bob Johnson', 'phone' => '09345678901', 'email' => 'global@imports.com', 'address' => '789 Pine Rd, Makati'],
            ['name' => 'Local Distributors Co.', 'contact_person' => 'Alice Brown', 'phone' => '09456789012', 'email' => 'local@distributors.com', 'address' => '321 Elm St, Pasig'],
            ['name' => 'Premium Goods Supply', 'contact_person' => 'Charlie Davis', 'phone' => '09567890123', 'email' => 'premium@goods.com', 'address' => '654 Maple Dr, Taguig'],
        ];

        foreach ($suppliers as $supplier) {
            Supplier::create($supplier);
        }
    }
}