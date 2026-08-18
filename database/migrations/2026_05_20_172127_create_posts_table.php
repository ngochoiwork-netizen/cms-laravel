<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('category_id')
                ->nullable()
                ->constrained('categories')
                ->nullOnDelete();

            $table->foreignId('author_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->foreignId('thumbnail_id')
                ->nullable()
                ->constrained('media')
                ->nullOnDelete();

            $table->foreignId('banner_id')
                ->nullable()
                ->constrained('media')
                ->nullOnDelete();

            $table->foreignId('og_image_id')
                ->nullable()
                ->constrained('media')
                ->nullOnDelete();

            $table->string('slug')->unique();

            $table->string('type')->default('post');
            // post, guide, news, review, experience, itinerary, tips

            $table->timestamp('published_at')->nullable();

            $table->unsignedBigInteger('view_count')->default(0);

            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);

            $table->integer('sort_order')->default(0);

            $table->string('canonical_url')->nullable();

            $table->string('schema_type')->nullable();
            $table->json('schema_data')->nullable();

            $table->timestamps();

            $table->index('category_id');
            $table->index('author_id');
            $table->index('type');
            $table->index('is_featured');
            $table->index('is_active');
            $table->index('published_at');
            $table->index('sort_order');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};