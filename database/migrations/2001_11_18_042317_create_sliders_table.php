<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_size')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();
            $table->string('button_bg_color')->nullable();
            $table->string('button_text_color')->nullable();
            $table->string('button_size')->nullable();
            $table->string('image');
            $table->decimal('overlay_opacity', 3, 2)->default(0.5);
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->string('text_color')->default('#ffffff');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};