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
        Schema::create('laptops', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('brand_id')
                ->constrained('brands');
            $table->foreignId('processor_id')
                ->constrained('processors');
            $table->foreignId('video_card_id')
                ->constrained('video_cards');
            $table->integer('ram_memory');
            $table->integer('memory');
            $table->float('diagonal');
            $table->string('screen_resolution');
            $table->integer('price');
            $table->integer('quantity');
            $table->string('image');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laptops');
    }
};
