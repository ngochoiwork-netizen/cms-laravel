<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tags', function (Blueprint $table) {

            $table->id();

            // URL
            $table->string('slug')->unique();

            // Media
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

            // Type
            $table->string('type')
                ->default('post');
            /*
                post
                destination
                hotel
                restaurant
                attraction
                general
            */

            // SEO
            $table->string('canonical_url')
                ->nullable();

            $table->string('robots')
                ->nullable();

            // Extra
            $table->integer('sort_order')
                ->default(0);

            $table->boolean('is_featured')
                ->default(false);

            $table->boolean('is_active')
                ->default(true);

            $table->timestamps();

            // Index
            $table->index('type');

            $table->index('is_active');
            $table->index('is_featured');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
};