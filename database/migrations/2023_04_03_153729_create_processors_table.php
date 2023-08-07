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
        Schema::create('processors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')
                ->constrained('brands');
            $table->foreignId('type_id')
                ->constrained('types');
            $table->foreignId('model_id')
                ->constrained('models');
            $table->float('frequency');
            $table->integer('core');
            $table->integer('thread');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('processors');
    }
};
