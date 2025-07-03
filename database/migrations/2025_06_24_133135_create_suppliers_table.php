<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('supplier', function (Blueprint $table) {
            $table->id();
            $table->string('supplierName', 100);
            $table->string('item', 100);
            $table->integer('qty')->unsigned();
            $table->integer('netQty')->unsigned();
            $table->enum('unitofmeasure', ['Units', 'Kilos', 'Liters', 'Boxes']);
            $table->date('dateIn');
            $table->date('dateOut')->nullable();
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    public function down()
    {
        Schema::dropIfExists('supplier');
    }
};