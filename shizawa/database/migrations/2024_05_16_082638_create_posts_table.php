<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('sleep');
            $table->unsignedTinyInteger('tired');
            $table->unsignedTinyInteger('drink');
            $table->unsignedTinyInteger('hangover');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('memo')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
