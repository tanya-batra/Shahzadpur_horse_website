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
        Schema::create('horse_images', function (Blueprint $table) {
          $table->id();
            $table->foreignId('horse_detail_id')->constrained('horse_details')->onDelete('cascade');
            $table->string('image_path');
             $table->tinyInteger('status')
                  ->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horse_images');
    }
};
