<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('page_translations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('page_id')->constrained('pages')->cascadeOnDelete();

            $table->string('locale', 10);

            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('excerpt')->nullable();
            $table->longText('content')->nullable();

            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();

            $table->string('og_title')->nullable();
            $table->text('og_description')->nullable();

            $table->unique(['page_id', 'locale']);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('page_translations');
    }
};