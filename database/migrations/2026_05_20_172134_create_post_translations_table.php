<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('post_translations', function (Blueprint $table) {

            $table->id();

            $table->foreignId('post_id')
                ->constrained('posts')
                ->cascadeOnDelete();

            $table->string('locale', 10)->index();

            // Content
            $table->string('title');
            $table->text('short_description')->nullable();
            $table->longText('content')->nullable();

            // SEO
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();

            // Open Graph
            $table->string('og_title')->nullable();
            $table->text('og_description')->nullable();

            // AI / FAQ / Schema
            $table->text('ai_overview')->nullable();
            $table->json('faq_schema')->nullable();
            $table->json('schema_data')->nullable();

            $table->timestamps();

            $table->unique(['post_id', 'locale']);
            $table->index(['locale', 'title']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('post_translations');
    }
};