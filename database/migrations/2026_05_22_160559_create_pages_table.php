<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();

            $table->string('slug')->unique();

            $table->foreignId('thumbnail_id')->nullable()->constrained('media')->nullOnDelete();
            $table->foreignId('banner_id')->nullable()->constrained('media')->nullOnDelete();
            $table->foreignId('og_image_id')->nullable()->constrained('media')->nullOnDelete();

            $table->string('template')->default('default');
            $table->string('canonical_url')->nullable();
            $table->string('robots')->nullable();

            $table->string('schema_type')->nullable();
            $table->json('schema_data')->nullable();

            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};