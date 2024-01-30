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
        Schema::create('quotation_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quotation_request_id');
            $table->string('quotation_code');
            $table->float('tax')->default('0');
            $table->float('discount_percentage')->default('0');
            $table->float('discount_amount')->default('0');
            $table->float('grand_total');
            $table->string('terms_conditions');
            $table->foreign('quotation_request_id')
                ->references('id')->on('quotations')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotation_applications');
    }
};
