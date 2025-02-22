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
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('image')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->timestamps();
        });

        Schema::create('brandables', function (Blueprint $table) {
            $table->integer('brand_id');
            $table->integer('brandables_id');
            $table->string('brandables_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brandables');
        Schema::dropIfExists('brands');
    }
};
