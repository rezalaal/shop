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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->string('post', 10)->index();
            $table->string('name', 50);
            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 10, 7);
            $table->string('state', 50);
            $table->string('city', 50);
            $table->boolean('plaque');
            $table->smallInteger('unit')->nullable();
            $table->string('number', 11);
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
        
        Schema::create('addressables', function (Blueprint $table) {
            $table->unsignedBigInteger('address_id');
            $table->morphs('addressable');
            $table->timestamps();
        
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addressables');
        Schema::dropIfExists('addresses');
    }
};
