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
        Schema::create('provinces', function (Blueprint $table) {

            $table->id();

            $table->foreignId('country_id')
                ->constrained()
                ->cascadeOnDelete();

            // SEO URL
            $table->string('slug')->unique();

            // Optional code
            $table->string('code', 20)->nullable();

            // Media
            $table->foreignId('thumbnail_id')
                ->nullable()
                ->constrained('media')
                ->nullOnDelete();

            $table->foreignId('banner_id')
                ->nullable()
                ->constrained('media')
                ->nullOnDelete();

            // Highlight
            $table->boolean('is_featured')->default(false);

            // Status
            $table->boolean('is_active')->default(true);

            // Sorting
            $table->integer('sort_order')->default(0);

            // SEO score / popularity
            $table->unsignedBigInteger('view_count')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provinces');
    }
};