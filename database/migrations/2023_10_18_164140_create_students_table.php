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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('status')->nullable();
            $table->string('parent_citizen_id');
            $table->string('image_url')->nullable();
            $table->integer('order')->nullable();
            $table->foreignId('parent_id')->nullable()->constrained('users');
            $table->foreignId('address_id')->nullable()->constrained('addresses');
            $table->foreignId('route_id')->nullable()->cascadeOnDelete();
            $table->boolean('joined')->default(false);
            $table->boolean('is_taking_bus')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
