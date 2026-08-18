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

            /*
            |--------------------------------------------------------------------------
            | RELATIONS
            |--------------------------------------------------------------------------
            */

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

            $table->foreignId('banner_id')
                ->nullable()
                ->constrained('media')
                ->nullOnDelete();

            $table->foreignId('og_image_id')
                ->nullable()
                ->constrained('media')
                ->nullOnDelete();

            /*
            |--------------------------------------------------------------------------
            | BASIC INFO
            |--------------------------------------------------------------------------
            */

            $table->string('slug')->unique();

            $table->string('sku')->nullable();

            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('warranty')->nullable();

            /*
            |--------------------------------------------------------------------------
            | PRICE
            |--------------------------------------------------------------------------
            */

            $table->decimal('price', 15, 0)->nullable();

            $table->decimal('sale_price', 15, 0)->nullable();

            $table->integer('stock_quantity')->default(0);

            /*
            |--------------------------------------------------------------------------
            | JSON DATA
            |--------------------------------------------------------------------------
            */

            /*
            |--------------------------------------------------------------------------
            | STATUS
            |--------------------------------------------------------------------------
            */

            $table->string('status')->default('draft');

            $table->boolean('is_featured')->default(false);

            $table->boolean('is_active')->default(true);

            $table->integer('view_count')->default(0);

            $table->integer('sort_order')->default(0);

            /*
            |--------------------------------------------------------------------------
            | SEO
            |--------------------------------------------------------------------------
            */

            $table->string('canonical_url')->nullable();

            $table->string('robots')->default('index, follow');

            /*
            |--------------------------------------------------------------------------
            | SCHEMA
            |--------------------------------------------------------------------------
            */

            $table->string('schema_type')->nullable();

            $table->json('schema_data')->nullable();

            $table->timestamps();

            /*
            |--------------------------------------------------------------------------
            | INDEX
            |--------------------------------------------------------------------------
            */

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