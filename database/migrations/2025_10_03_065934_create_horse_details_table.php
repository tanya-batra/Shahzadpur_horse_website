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
        Schema::create('horse_details', function (Blueprint $table) {
             $table->id();
            $table->foreignId('subcategory_id')->constrained('subcategories')->onDelete('cascade');
            $table->string('horse_name');
               $table->text('description')->nullable();
            $table->string('color')->nullable();
            $table->string('age')->nullable();
            $table->string('height')->nullable();
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
        Schema::dropIfExists('horse_details');
    }
};
