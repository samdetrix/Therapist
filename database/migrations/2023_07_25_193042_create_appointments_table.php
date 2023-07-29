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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('therapist_id');
            $table->unsignedBigInteger('created_by');
            $table->dateTime('start_time');
            $table->boolean('ongoing')->default(true);
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
    
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('therapist_id')->references('id')->on('therapists')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
