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
            $table->unsignedBigInteger('item_id');
            $table->string('quotation_code');
            $table->string('unit');
            $table->integer('quantity');
            $table->integer('unit_price');
            $table->integer('total_price');
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
