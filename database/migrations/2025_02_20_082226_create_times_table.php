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
        Schema::create('times', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();            
            $table->smallInteger('from');
            $table->smallInteger('to');
            $table->smallInteger('day');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->index(['from', 'to', 'day']);
        });
        
        Schema::create('timables', function (Blueprint $table) {
            $table->unsignedBigInteger('time_id');
            $table->unsignedBigInteger('timables_id');
            $table->string('timables_type');
            $table->primary(['time_id', 'timables_id', 'timables_type']);
            $table->index(['time_id', 'timables_id', 'timables_type']);
            $table->foreign('time_id')->references('id')->on('times')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timables');
        Schema::dropIfExists('times');
    }
};
