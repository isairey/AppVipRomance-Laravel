<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('preference_options', function (Blueprint $table) {
            $table->id();
            $table->string('category', 30); // open_to, preferences, personality
            $table->string('key', 60);
            $table->string('label', 120);
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->unique(['category', 'key']);
            $table->index(['category', 'sort_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('preference_options');
    }
};
