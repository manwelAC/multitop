<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('contact_person')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->timestamps();
        });

        // Insert sample suppliers to match the form options
        DB::table('suppliers')->insert([
            ['id' => 1, 'name' => 'This is Sample only 1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'This is Sample only 2', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'This is Sample only 3', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'name' => 'This is Sample only 4', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'name' => 'This is Sample only 5', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
