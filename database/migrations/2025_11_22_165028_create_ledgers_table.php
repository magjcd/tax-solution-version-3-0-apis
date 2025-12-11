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
        Schema::create('ledgers', function (Blueprint $table) {
            $table->id();
            $table->date('trans_date');
            $table->foreignId('client_id')->constrained()->cascadeOnDelete();
            $table->foreignId('header_id')->constrained()->cascadeOnDelete();
            $table->foreignId('sub_header_id')->constrained()->cascadeOnDelete();
            $table->foreignId('city_id')->constrained()->cascadeOnDelete();

            $table->string('bar_code')->nullable()->comment('This column belongs to Return tracker');
            $table->string('details')->nullable()->comment('This column belongs to bothe Return tracker and General Journal');
            $table->date('submission_date')->nullable()->comment('This column belongs to Return tracker');
            $table->foreignId('fee_type_id')->nullable()->constrained()->cascadeOnDelete();
            $table->year('fee_year')->nullable()->comment('This column belongs to bothe Return tracker and General Journal');
            $table->integer('dr_amt')->nullable()->comment('This column belongs to bothe Return tracker and General Journal');
            $table->integer('cr_amt')->nullable()->comment('This column belongs to General Journal');
            $table->enum('doc_type', ['gj', 'ret_trk'])->comment('This column belongs to bothe Return tracker and General Journal');

            $table->unsignedBigInteger('representative_id')->nullable()->comment('This column belongs to General Journal only');
            $table->foreign('representative_id')->references('id')->on('clients')->onDelete('cascade');
            // $table->foreignId('representative_id')->constrained()->cascadeOnDelete()->comment('This column belongs to General Journal only');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->comment('This column belongs to bothe Return tracker and General Journal');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ledgers');
    }
};
