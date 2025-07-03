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
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('store_name');
            $table->string('email');
            $table->text('address');
            $table->text('store_address');
            $table->text('warehouse_address');
            $table->string('businessType');
            $table->string('contact_person');
            $table->date('birthdday')->nullable();
            $table->string('payment_terms');
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
