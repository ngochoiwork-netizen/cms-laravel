<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            $table->string('group')->index(); // general, seo, sitemap, schema, social, script
            $table->string('key');
            $table->text('value')->nullable();

            $table->string('type')->default('text'); 
            // text, textarea, image, boolean, number, json

            $table->string('label')->nullable();
            $table->text('description')->nullable();

            $table->integer('sort_order')->default(0);

            $table->timestamps();

            $table->unique(['group', 'key']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};