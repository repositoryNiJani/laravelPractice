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
        Schema::create('user_preference', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('username');
            $table->foreign('username')->references('username')->on('users');
            $table->string('color');
            $table->string('cake');
            $table->string('flower');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_preference');
    }
};
