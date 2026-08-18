<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_translations', function (Blueprint $table) {

            $table->id();

            $table->foreignId('product_id')
                ->constrained('products')
                ->cascadeOnDelete();

            $table->string('locale')->index();

            /*
            |--------------------------------------------------------------------------
            | CONTENT
            |--------------------------------------------------------------------------
            */

            $table->string('name');

            $table->text('short_description')->nullable();

            $table->longText('description')->nullable();

            /*
            |--------------------------------------------------------------------------
            | SEO
            |--------------------------------------------------------------------------
            */

            $table->string('meta_title')->nullable();

            $table->text('meta_description')->nullable();

            $table->string('meta_keywords')->nullable();

            /*
            |--------------------------------------------------------------------------
            | OPEN GRAPH
            |--------------------------------------------------------------------------
            */

            $table->json('specifications')->nullable();

            $table->json('features')->nullable();


            $table->string('og_title')->nullable();

            $table->text('og_description')->nullable();

            $table->timestamps();

            $table->unique(['product_id', 'locale']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_translations');
    }
};