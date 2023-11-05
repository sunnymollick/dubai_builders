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
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->string('job_title')->nullable();
            $table->text('job_description')->nullable();
            $table->integer('no_of_vacancy')->nullable();
            $table->string('poster')->nullable();
            $table->string('slug')->nullable();
            $table->string('job_type')->nullable();
            $table->string('salary')->nullable();
            $table->string('job_location')->nullable();
            $table->string('experience')->nullable();
            $table->date('deadline')->nullable();
            $table->text('educational_requirement')->nullable();
            $table->text('experience_requirement')->nullable();
            $table->text('additional_requirement')->nullable();
            $table->text('compensations')->nullable();
            $table->string('is_active')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('careers');
    }
};
