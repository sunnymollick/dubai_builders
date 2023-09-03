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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id')->index();
            $table->string('project_title')->nullable();
            $table->text('project_description')->nullable();
            $table->text('project_features')->nullable();
            $table->string('project_location')->nullable();
            $table->string('project_problem')->nullable();
            $table->string('handover_time')->nullable();
            $table->string('client_rating')->nullable();
            $table->string('client_testimonial')->nullable();
            $table->tinyInteger('project_type')->nullable();
            $table->tinyInteger('project_status')->nullable();
            $table->string('hero_image')->nullable();
            $table->string('thumbnail_image')->nullable();
            $table->string('image_1')->nullable();
            $table->string('image_2')->nullable();
            $table->tinyInteger('is_active')->default(0);
            $table->tinyInteger('is_popular')->default(0);
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
        Schema::dropIfExists('projects');
    }
};
