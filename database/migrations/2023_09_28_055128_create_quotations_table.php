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
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('location')->nullable();
            $table->string('project_type')->nullable();
            $table->string('evaluate_budget')->nullable();
            $table->string('project_time')->nullable();
            $table->string('company_name')->nullable();
            $table->string('file')->nullable();
            $table->text('message')->nullable();
            $table->tinyInteger('is_read')->default(0);
$table->tinyInteger('is_replied')->default(0);
            $table->foreign('client_id')
                ->references('id')->on('clients')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotations');
    }
};
