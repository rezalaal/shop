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
        Schema::create('robots', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('body')->nullable();
            $table->boolean('status')->default(false);
            $table->json('data')->nullable();
            $table->string('token', 100)->unique();
            $table->string('group', 30)->index();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');        
            $table->timestamps();
            $table->index(['status', 'group']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('robots');
    }
};
