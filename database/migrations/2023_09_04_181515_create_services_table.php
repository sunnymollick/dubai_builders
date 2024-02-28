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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('service_title')->nullable();
            $table->text('service_details')->nullable();
            $table->text('slogan')->nullable();
            $table->string('hero_image')->default('backend/uploads/images/services/default_images/default_hero.png');
            $table->string('thumbnail_image')->default('backend/uploads/images/services/default_images/default_thumbnail.jpg');
            $table->string('image_1')->default('backend/uploads/images/services/default_images/default_first.png');
            $table->string('image_2')->default('backend/uploads/images/services/default_images/default_second.png');
            $table->string('logo')->default('backend/uploads/images/services/default_images/default_logo.png');
            $table->string('home_image')->default('backend/uploads/images/services/default_images/default_home.png');
            $table->string('video_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
