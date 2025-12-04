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
        Schema::create('client_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->cascadeOnDelete();
            $table->text('client_address')->nullable();
            $table->string('user_fbr_id', 100)->unique()->nullable();
            $table->string('business_name')->nullable()->comment('Client Basic Information');
            $table->string('ptcl_no', 15)->nullable();
            $table->string('cell_no1', 15)->nullable();
            $table->string('cell_no2', 15)->nullable();
            $table->foreignId('branch_office_id')->nullable()->constrained();
            $table->text('business_address')->nullable();
            $table->foreignId('fee_applied_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('classification_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('tax_office_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('rto_id')->nullable()->constrained()->cascadeOnDelete()->nullable();
            $table->foreignId('business_category_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('fbr_id')->nullable();
            $table->string('fbr_password')->nullable();
            $table->string('pin_code')->nullable();
            $table->foreignId('link_account_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('email_id', 100)->nullable();
            // $table->string('ntn_no', 20)->nullable();
            // $table->text('remarks')->nullable();
            // $table->integer('ntn_fee')->nullable();
            // $table->dateTimeTz('ntn_reg_date')->nullable();
            // $table->enum('active', ['Yes', 'No'])->default('Yes')->comment('Client Active and Inactive Status');
            // $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_profiles');
    }
};
