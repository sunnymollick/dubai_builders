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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('work_category_id');
            $table->string('item_work');
            $table->unsignedBigInteger('unit_id');
            $table->integer('unit_price');
            $table->foreign('work_category_id')
                ->references('id')->on('work_categories')
                ->onDelete('cascade');
            $table->foreign('unit_id')
                ->references('id')->on('units')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
