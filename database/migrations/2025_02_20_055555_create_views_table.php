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
        Schema::create('views', function (Blueprint $table) {
            $table->id();
            $table->string('user_ip', 45);
            $table->string('browser', 50);
            $table->string('platform', 50);
            $table->timestamps();
        });
    
        Schema::create('viewables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('view_id')->constrained('views')->cascadeOnDelete();
            $table->morphs('viewable');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('viewables');
        Schema::dropIfExists('views');
    }
};
