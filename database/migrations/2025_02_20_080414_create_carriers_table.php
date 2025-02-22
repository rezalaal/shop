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
        Schema::create('carriers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->name();
            $table->bigInteger('price');
            $table->string('city')->nullable();
            $table->integer('limit')->nullable();
            $table->timestamps();            
        });
        
        Schema::create('carriables', function (Blueprint $table) {
            $table->unsignedBigInteger('carrier_id'); 
            $table->unsignedBigInteger('carriables_id');
            $table->string('carriables_type');
            $table->primary(['carrier_id', 'carriables_id', 'carriables_type']);
            $table->index(['carrier_id', 'carriables_id', 'carriables_type']);
            $table->foreign('carrier_id')->references('id')->on('carriers')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carriables');
        Schema::dropIfExists('carriers');
    }
};
