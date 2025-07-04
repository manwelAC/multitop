<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('designation');
            $table->string('position');
            $table->date('birthdate');
            $table->enum('gender', ['Male', 'Female']);
            $table->string('contact_number');
            $table->date('date_hired');
            $table->date('date_resigned')->nullable();
            $table->enum('status', ['Active', 'Resigned'])->default('Active');
            $table->string('philhealth');
            $table->string('sss');
            $table->string('pagibig');
            $table->string('taxes');
            $table->string('house_number');
            $table->string('street');
            $table->string('barangay_municipality');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
}; 