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
        Schema::create('attraction_translations', function (Blueprint $table) {

            $table->id();

            $table->foreignId('attraction_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('locale', 10);

            // Content
            $table->string('name');

            $table->text('short_description')->nullable();

            $table->longText('description')->nullable();

            $table->string('address')->nullable();

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

            $table->unique(['attraction_id', 'locale']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attraction_translations');
    }
};