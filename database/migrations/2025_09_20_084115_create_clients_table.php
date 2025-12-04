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
            $table->foreignId('business_status_id')->constrained()->comment('Client Basic Information');
            $table->string('client_name')->comment('Client Basic Information');
            $table->foreignId('header_id')->constrained()->cascadeOnDelete()->nullable()->comment('Client Basic Information');
            $table->foreignId('sub_header_id')->constrained()->cascadeOnDelete()->nullable()->comment('Client Basic Information');
            $table->string('cnic_ntn_no', 50)->unique()->comment('Client Basic Information');
            $table->foreignId('city_id')->constrained()->cascadeOnDelete()->comment('Client Basic Information');
            $table->enum('active', ['Yes', 'No'])->default('Yes')->comment('Client Active and Inactive Status');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->nullable();
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
