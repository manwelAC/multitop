<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('store_name');
            $table->string('email');
            $table->text('address')->nullable();
            $table->text('store_address');
            $table->text('warehouse_address')->nullable();
            $table->string('businessType');
            $table->string('contact_person');
            $table->date('birthday')->nullable()->default(null);
            $table->string('payment_terms')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
}; 