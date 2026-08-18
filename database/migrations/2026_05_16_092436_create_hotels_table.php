<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();

            $table->foreignId('country_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignId('province_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignId('destination_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

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

            // Hotel info
            $table->string('hotel_type')->nullable();
            // hotel, resort, homestay, villa, hostel

            $table->unsignedTinyInteger('star_rating')->nullable();

            $table->decimal('price_from', 12, 2)->nullable();

            $table->string('price_range')->nullable();

            $table->decimal('rating', 3, 1)->nullable();

            $table->unsignedInteger('review_count')->default(0);

            // Contact
            $table->string('phone')->nullable();

            $table->string('email')->nullable();

            $table->string('website')->nullable();

            // Affiliate
            $table->string('booking_url')->nullable();

            $table->string('affiliate_url')->nullable();

            // Location
            $table->string('address')->nullable();

            $table->decimal('latitude', 10, 7)->nullable();

            $table->decimal('longitude', 10, 7)->nullable();

            $table->text('google_map_embed')->nullable();

            // Amenities
            $table->json('amenities')->nullable();

            // SEO
            $table->string('canonical_url')->nullable();

            // Status
            $table->boolean('is_featured')->default(false);

            $table->boolean('is_active')->default(true);

            $table->integer('sort_order')->default(0);

            $table->timestamps();

            $table->index(['destination_id', 'is_active']);
            $table->index(['province_id', 'is_active']);
            $table->index(['is_featured', 'is_active']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};