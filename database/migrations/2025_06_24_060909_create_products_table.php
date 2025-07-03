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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('type_other')->nullable(); // For when "Others" is selected
            $table->text('description')->nullable();
            $table->unsignedBigInteger('supplier_id');
            $table->string('unit_of_measure')->nullable();
            $table->integer('stock_level')->default(0);
            $table->decimal('regular_price', 10, 2)->nullable();
            $table->integer('minimum_stock_threshold')->default(0);
            $table->timestamps();
            
            // You can add foreign key constraint if suppliers table exists
            // $table->foreign('supplier_id')->references('id')->on('suppliers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
