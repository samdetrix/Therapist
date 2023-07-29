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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->foreignId('created_by')->constrained('users');
            $table->string('email');
            $table->string('address');
            $table->string('identification_number');
            $table->string('gender');
            $table->string('phone_number');
            $table->string('next_of_kin_name')->nullable();
            $table->string('next_of_kin_number')->nullable();
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
