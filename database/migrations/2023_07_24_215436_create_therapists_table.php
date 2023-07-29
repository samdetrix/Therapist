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
        Schema::create('therapists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('id_number');
            $table->string('gender');
            $table->string('contact_person')->nullable();
            $table->string('town');
            $table->string('skills');
            $table->string('email');
            $table->boolean('availability')->default(true);
            $table->unsignedBigInteger('created_by');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();

    
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('therapists');
    }
};
