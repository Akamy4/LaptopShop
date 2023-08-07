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
        Schema::create('video_cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')
                ->constrained('brands');
            $table->foreignId('model_id')
                ->constrained('models');
            $table->integer('frequency');
            $table->integer('memory');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video_cards');
    }
};
