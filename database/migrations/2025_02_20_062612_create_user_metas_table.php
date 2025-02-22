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
        Schema::create('user_metas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('name', 255)->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->unsignedSmallInteger('post')->nullable();
            $table->text('address')->nullable();
            $table->text('residence_address')->nullable();
            $table->string('code', 10)->nullable();
            $table->string('job', 50)->nullable();
            $table->date('date')->nullable();
            $table->timestamps();
        });
    
        Schema::create('user_metasables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_meta_id')->constrained('user_metas')->cascadeOnDelete();
            $table->morphs('user_metasable');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_metasables');
        Schema::dropIfExists('user_metas');
    }
};
