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
            $table->unsignedBigInteger('quotation_id')->index();
            $table->string('project_title')->nullable();
            $table->text('project_description')->nullable();
            $table->string('project_code')->nullable();
            $table->string('project_permit')->nullable();
            $table->string('project_location')->nullable();
            $table->string('handover_time')->nullable();
            $table->string('client_rating')->nullable();
            $table->string('client_testimonial')->nullable();
            $table->tinyInteger('project_type')->nullable();
            $table->tinyInteger('project_status')->nullable();
            $table->string('hero_image')->nullable()->default('backend/uploads/images/projects/default/p_details.png');
            $table->string('thumbnail_image')->nullable()->default(('backend/uploads/images/projects/default/1.png'));
            $table->string('image_1')->nullable()->default('backend/uploads/images/projects/default/p1.png');
            $table->string('image_2')->nullable()->default('backend/uploads/images/projects/default/p2.png');
            $table->tinyInteger('is_active')->default(0);
            $table->tinyInteger('is_show')->default(0);
            $table->tinyInteger('is_popular')->default(0);
            $table->foreign('client_id')
                ->references('id')->on('clients')
                ->onDelete('cascade');
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
        Schema::dropIfExists('projects');
    }
};
