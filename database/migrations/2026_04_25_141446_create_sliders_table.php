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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();

            // 📝 nội dung
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->text('description')->nullable();

            // 🖼️ hình ảnh
            $table->foreignId('image_id')
                  ->nullable()
                  ->constrained('media')
                  ->nullOnDelete();

            // 🔗 link
            $table->string('link')->nullable();
            $table->string('button_text')->nullable();

            // 📍 vị trí hiển thị
            $table->string('position')->nullable(); 
            // ví dụ: home, product, blog, landing

            // ⚙️ control
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
