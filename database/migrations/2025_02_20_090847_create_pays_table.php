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
        Schema::create('pays', function (Blueprint $table) {
            $table->id();
            $table->string('refId', 20)->nullable();
            $table->bigInteger('price');
            $table->string('auth', 36)->nullable();
            $table->boolean('status')->default(false);
            $table->string('time');
            $table->tinyInteger('back')->default(0);
            $table->boolean('deliver')->default(false);
            $table->string('track')->nullable();
            $table->boolean('seen')->default(false);
            $table->unsignedBigInteger('discount_id')->nullable();
            $table->foreign('discount_id')->references('id')->on('discounts')->onDelete('set null');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('property', 30);
            $table->boolean('is_archived')->default(false);
            $table->timestamps();
            $table->index(['user_id', 'discount_id', 'refId', 'track']);
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pays');
    }
};
