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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_code');
            $table->unsignedBigInteger('quotation_id');
            $table->float('tax')->default('0')->nullable();
            $table->float('discount_percentage')->default(0)->nullable();
            $table->float('discount_amount')->default(0)->nullable();
            $table->float('grand_total');
            $table->float('paid_amount')->default(0)->nullable();
            $table->foreign('quotation_id')
                ->references('id')->on('quotation_applications')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
