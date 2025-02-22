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
        Schema::create('ranks', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->unsignedTinyInteger('off');
            $table->unsignedInteger('from');
            $table->unsignedInteger('to');
            $table->timestamps();
        });
        
        Schema::create('rankables', function (Blueprint $table) {
            $table->unsignedBigInteger('rank_id');
            $table->morphs('rankable');
            $table->timestamps();
        
            $table->foreign('rank_id')->references('id')->on('ranks')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rankables');
        Schema::dropIfExists('ranks');
    }
};
