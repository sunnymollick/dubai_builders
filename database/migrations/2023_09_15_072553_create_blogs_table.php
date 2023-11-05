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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('blog_title')->nullable();
            $table->text('blog_description')->nullable();
            $table->string('hero_image')->nullable();
            $table->string('thumbnail_image')->nullable();
            $table->string('image_1')->nullable();
            $table->string('image_2')->nullable();
            $table->string('youtube_video_link')->nullable();
            $table->string('author')->nullable();
            $table->text('author_slug')->nullable();
            $table->text('author_description')->nullable();
            $table->string('author_image')->nullable();
            $table->string('author_fb')->nullable();
            $table->string('author_twitter')->nullable();
            $table->string('author_instagram')->nullable();
            $table->string('author_pinterest')->nullable();
            $table->string('author_linkedin')->nullable();
            $table->tinyInteger('is_publish')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
