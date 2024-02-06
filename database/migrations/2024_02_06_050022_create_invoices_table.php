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
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('category_id');
            $table->string('unit');
            $table->float('quantity');
            $table->float('unit_price');
            $table->float('total_price');
            $table->foreign('quotation_id')
                ->references('id')->on('quotation_applications')
                ->onDelete('cascade');
            $table->foreign('item_id')
                ->references('id')->on('items')
                ->onDelete('cascade');
            $table->foreign('category_id')
                ->references('id')->on('work_categories')
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
