<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('province_translations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('province_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('locale', 10); // vi, en

            $table->string('name');
            $table->text('description')->nullable();

            // SEO
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();

            $table->timestamps();

            $table->unique(['province_id', 'locale']);
            $table->index(['locale', 'name']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('province_translations');
    }
};