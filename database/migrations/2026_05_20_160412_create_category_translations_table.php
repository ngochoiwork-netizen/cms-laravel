<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('category_translations', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Relation
            |--------------------------------------------------------------------------
            */

            $table->foreignId('category_id')
                ->constrained()
                ->cascadeOnDelete();

            /*
            |--------------------------------------------------------------------------
            | Locale
            |--------------------------------------------------------------------------
            */

            $table->string('locale', 5);
            // vi, en

            /*
            |--------------------------------------------------------------------------
            | Content
            |--------------------------------------------------------------------------
            */

            $table->string('name');

            $table->text('short_description')
                ->nullable();

            $table->longText('description')
                ->nullable();

            /*
            |--------------------------------------------------------------------------
            | SEO
            |--------------------------------------------------------------------------
            */

            $table->string('meta_title')
                ->nullable();

            $table->text('meta_description')
                ->nullable();

            $table->text('meta_keywords')
                ->nullable();

            /*
            |--------------------------------------------------------------------------
            | Open Graph
            |--------------------------------------------------------------------------
            */

            $table->string('og_title')
                ->nullable();

            $table->text('og_description')
                ->nullable();

            /*
            |--------------------------------------------------------------------------
            | Schema
            |--------------------------------------------------------------------------
            */

            $table->string('schema_type')
                ->nullable();

            $table->json('schema_data')
                ->nullable();

            $table->timestamps();

            /*
            |--------------------------------------------------------------------------
            | Unique
            |--------------------------------------------------------------------------
            */

            $table->unique([
                'category_id',
                'locale'
            ]);

            $table->index('locale');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('category_translations');
    }
};