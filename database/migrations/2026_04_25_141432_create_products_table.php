<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
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

            $table->foreignId('thumbnail_id')
                ->nullable()
                ->constrained('media')
                ->nullOnDelete();

            $table->foreignId('og_image_id')
                ->nullable()
                ->constrained('media')
                ->nullOnDelete();

            // Thông tin cơ bản
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('sku')->nullable();

            // Thông tin sản phẩm / thiết bị
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('warranty')->nullable();

            // Nội dung
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();

            // Giá
            $table->decimal('price', 15, 0)->nullable();
            $table->decimal('sale_price', 15, 0)->nullable();
            $table->integer('stock_quantity')->default(0);

            // JSON
            $table->json('specifications')->nullable();
            $table->json('features')->nullable();

            // Trạng thái
            $table->string('status')->default('draft');
            $table->boolean('is_featured')->default(false);
            $table->integer('view_count')->default(0);

            // SEO
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('canonical_url')->nullable();
            $table->string('robots')->default('index, follow');

            // Open Graph
            $table->string('og_title')->nullable();
            $table->text('og_description')->nullable();

            // Schema
            $table->string('schema_type')->nullable();
            $table->json('schema_data')->nullable();

            $table->timestamps();

            // Index
            $table->index(['status', 'is_featured']);
            $table->index(['category_id', 'status']);
            $table->index('slug');
            $table->index('view_count');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};