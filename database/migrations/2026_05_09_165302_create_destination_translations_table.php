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
        Schema::create('destination_translations', function (Blueprint $table) {

            $table->id();

            $table->foreignId('destination_id')
                ->constrained()
                ->cascadeOnDelete();

            // Language
            $table->string('locale', 10); // vi, en

            // Basic Content
            $table->string('name');

            $table->string('slug')->nullable();

            $table->text('short_description')->nullable();

            $table->longText('description')->nullable();

            // Location Info
            $table->string('address')->nullable();

            // SEO
            $table->string('meta_title')->nullable();

            $table->text('meta_description')->nullable();

            $table->text('meta_keywords')->nullable();

            $table->string('canonical_url')->nullable();

            $table->string('robots')
                ->default('index, follow');

            // Open Graph
            $table->string('og_title')->nullable();

            $table->text('og_description')->nullable();

            // Structured Data
            $table->string('schema_type')->nullable();

            $table->json('schema_data')->nullable();

            $table->timestamps();

            // Unique
            $table->unique([
                'destination_id',
                'locale'
            ]);

            $table->unique([
                'locale',
                'slug'
            ]);

            // Index
            $table->index([
                'locale',
                'name'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destination_translations');
    }
};