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
        Schema::create('relier_web_paires', function (Blueprint $table) {
            $table->id();
            $table->foreignId('relier_web_question_id')
                ->constrained('relier_web_questions')
                ->cascadeOnDelete();
            $table->string('element_left');
            $table->string('element_right');
            // Filaharana aseho amin'ny colonne gauche
            $table->unsignedInteger('order_left')->default(0);
            // Filaharana aseho amin'ny colonne droite
            $table->unsignedInteger('order_right')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relier_web_paires');
    }
};
