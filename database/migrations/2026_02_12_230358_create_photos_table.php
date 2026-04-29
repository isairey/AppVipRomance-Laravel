<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('path', 255);
            $table->boolean('is_profile')->default(false);
            $table->boolean('is_private')->default(false);
            $table->timestamps();

            $table->index(['user_id', 'is_profile']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('photos');
    }
};
