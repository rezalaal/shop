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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('rate' , 400)->nullable();
            $table->text('specifications')->nullable();
            $table->text('ability')->nullable();
            $table->string('size',300)->nullable();
            $table->string('colors' , 500)->nullable();
            $table->text('body')->nullable();
            $table->timestamps();
        });

        Schema::create('reviewables', function (Blueprint $table) {
            $table->integer('review_id');
            $table->integer('reviewables_id');
            $table->string('reviewables_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviewables');
        Schema::dropIfExists('reviews');
    }
};
