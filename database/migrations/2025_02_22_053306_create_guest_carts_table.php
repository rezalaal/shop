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
        Schema::create('guest_carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('count');
            $table->unsignedBigInteger('price');
            $table->json('color')->nullable();
            $table->json('size')->nullable();
            $table->string('delivery', 255)->nullable();
            $table->string('discount', 20)->nullable();
            $table->unsignedBigInteger('guest_id')->index();
            $table->foreign('guest_id')->references('id')->on('guests')->onDelete('cascade');
            $table->unsignedBigInteger('post_id')->index();
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->unsignedBigInteger('guarantee_id')->nullable();
            $table->foreign('guarantee_id')->references('id')->on('guarantees')->onDelete('set null'); // اگر گارانتی حذف شد، مقدار null شود
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guest_carts');
    }
};
