<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hotel_translations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('hotel_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('locale', 10);
            // vi, en

            // Content
            $table->string('name');

            $table->string('short_description')->nullable();

            $table->longText('description')->nullable();

            $table->text('address')->nullable();

            // SEO
            $table->string('meta_title')->nullable();

            $table->text('meta_description')->nullable();

            $table->text('meta_keywords')->nullable();

            $table->string('og_title')->nullable();

            $table->text('og_description')->nullable();

            // Schema
            $table->string('schema_type')->nullable();

            $table->json('schema_data')->nullable();

            $table->timestamps();

            $table->unique(['hotel_id', 'locale']);

            $table->index(['locale']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hotel_translations');
    }
};