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
        Schema::create('active_sms', function (Blueprint $table) {
            $table->id();
            $table->timestamp('expire');
            $table->char('code', 6);
            $table->string('phone', 15)->index();
            $table->timestamps();

            $table->index('expire');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('active_sms');
    }
};
