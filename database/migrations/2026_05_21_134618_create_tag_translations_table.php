<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tag_translations', function (Blueprint $table) {

            $table->id();

            $table->foreignId('tag_id')
                ->constrained('tags')
                ->cascadeOnDelete();

            $table->string('locale', 10)->index();

            // Content
            $table->string('name');

            $table->text('description')
                ->nullable();

            // SEO
            $table->string('meta_title')
                ->nullable();

            $table->text('meta_description')
                ->nullable();

            $table->text('meta_keywords')
                ->nullable();

            // Open Graph
            $table->string('og_title')
                ->nullable();

            $table->text('og_description')
                ->nullable();

            // AI / FAQ / Schema
            $table->text('ai_overview')
                ->nullable();

            $table->json('faq_schema')
                ->nullable();

            $table->json('schema_data')
                ->nullable();

            $table->timestamps();

            $table->unique(['tag_id', 'locale']);

            $table->index(['locale', 'name']);

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tag_translations');
    }
};