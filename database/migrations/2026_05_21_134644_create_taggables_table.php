<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('taggables', function (Blueprint $table) {

            $table->id();

            $table->foreignId('tag_id')
                ->constrained('tags')
                ->cascadeOnDelete();

            $table->morphs('taggable');

            $table->integer('sort_order')
                ->default(0);

            $table->timestamps();

            // Index
            $table->index([
                'taggable_id',
                'taggable_type'
            ]);

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('taggables');
    }
};