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
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();

            // Location
            $table->foreignId('country_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignId('province_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

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

            // Geo
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();

            // Travel Info
            $table->string('best_time_to_visit')->nullable();

            /*
            Example:
            [
                "beach",
                "family",
                "luxury"
            ]
            */
            $table->json('travel_styles')->nullable();

            $table->string('region')->nullable();

            // Content Support
            $table->text('excerpt')->nullable();

            // SEO
            $table->string('canonical_url')->nullable();

            // System
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);

            $table->integer('sort_order')->default(0);

            $table->unsignedInteger('view_count')->default(0);

            $table->timestamps();

            // Index
            $table->index('country_id');
            $table->index('province_id');
            $table->index('is_active');
            $table->index('is_featured');
            $table->index('sort_order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinations');
    }
};