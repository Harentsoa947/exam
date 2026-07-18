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
        Schema::create('code_web_questions', function (Blueprint $table) {
             $table->id();
            $table->foreignId('code_web_id')->constrained('code_webs')->cascadeOnDelete();
            $table->text('instruction');
            $table->string('langage')->default('php'); // php, javascript, python...
            $table->text('code_starter')->nullable(); // code voatokana mialoha ho an'ny étudiant
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
        Schema::dropIfExists('code_web_questions');
    }
};
