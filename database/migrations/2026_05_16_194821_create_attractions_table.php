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
        Schema::create('attractions', function (Blueprint $table) {

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

            $table->foreignId('destination_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            // Slug
            $table->string('slug')->unique();

            // Media
            $table->unsignedBigInteger('thumbnail_id')->nullable();

            $table->unsignedBigInteger('banner_id')->nullable();

            $table->unsignedBigInteger('og_image_id')->nullable();

            // Basic Info
            $table->string('type')->nullable();

            $table->string('opening_hours')->nullable();

            $table->string('ticket_price')->nullable();

            // GPS
            $table->decimal('latitude', 10, 7)->nullable();

            $table->decimal('longitude', 10, 7)->nullable();

            // Extra
            $table->boolean('is_featured')->default(false);

            $table->boolean('is_active')->default(true);

            $table->integer('sort_order')->default(0);

            // SEO
            $table->string('canonical_url')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attractions');
    }
};