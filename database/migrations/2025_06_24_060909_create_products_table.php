<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('type');
        $table->text('description')->nullable();
        $table->foreignId('supplier_id')->constrained();
        $table->string('unit_of_measure');
        $table->integer('stock_level')->default(0);
        $table->decimal('regular_price', 10, 2);
        $table->integer('minimum_stock_threshold')->nullable();
        $table->timestamps();
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
