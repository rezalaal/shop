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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->text('data')->nullable();
            $table->enum('type', ['spam', 'abuse', 'fake', 'other'])->default('other');
            $table->text('body')->nullable();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->morphs('reportable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
