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
        Schema::create('posts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('slug')->unique();
            $table->smallInteger('count');
            $table->smallInteger('type')->default(0);
            $table->boolean('status')->default(0);
            $table->boolean('variety')->default(0);
            $table->string('suggest',50)->nullable();
            $table->string('score',50)->nullable();
            $table->boolean('showcase')->default(0);
            $table->boolean('original')->default(0);
            $table->boolean('used')->default(0);
            $table->string('off' , 3)->nullable();
            $table->text('body')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->decimal('price', 10, 2);
            $table->decimal('offPrice', 10, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('postables', function (Blueprint $table) {
            $table->integer('post_id');
            $table->integer('postables_id');
            $table->string('postables_type');
            $table->primary(['post_id', 'postables_id', 'postables_type']);
            
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            
            $table->index(['postables_id', 'postables_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postables');
        Schema::dropIfExists('posts');
    }
};
