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

            // Liên kết
            $table->foreignId('category_id')
                ->nullable()
                ->constrained('categories')
                ->nullOnDelete();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            // Nội dung cơ bản
            $table->string('title');
            $table->string('slug')->unique();

            $table->text('excerpt')->nullable();
            $table->longText('content')->nullable();

            // Hình ảnh
            $table->foreignId('thumbnail_id')
                ->nullable()
                ->constrained('media')
                ->nullOnDelete();

            // Trạng thái
            $table->string('status')->default('draft'); // draft | published
            $table->boolean('is_featured')->default(false);
            $table->integer('view_count')->default(0);
            $table->timestamp('published_at')->nullable();

            // SEO
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->text('canonical_url')->nullable();
            $table->string('robots')->default('index, follow');

            // Open Graph
            $table->string('og_title')->nullable();
            $table->text('og_description')->nullable();

            $table->foreignId('og_image_id')
                ->nullable()
                ->constrained('media')
                ->nullOnDelete();

            // Schema SEO
            $table->string('schema_type')->nullable(); // Article | BlogPosting
            $table->json('schema_data')->nullable();

            $table->timestamps();

            // Index
            $table->index(['category_id', 'status']);
            $table->index(['user_id', 'status']);
            $table->index(['status', 'published_at']);
            $table->index('is_featured');
            $table->index('view_count');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};