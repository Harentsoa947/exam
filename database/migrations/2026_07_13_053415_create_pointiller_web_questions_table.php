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
        Schema::create('pointiller_web_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pointiller_web_id')->constrained('pointiller_webs')->cascadeOnDelete();
            $table->text('enonce');
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->decimal('points', 5, 2)->default(1);
            $table->integer('ordre')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pointiller_web_questions');
    }
};
