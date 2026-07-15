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
        Schema::disableForeignKeyConstraints();

        Schema::create('jeux_pendu', function (Blueprint $table) {
            $table->id();
            $table->string('texte_à_deviner');
            $table->string('indice');
            $table->integer('points');
            $table->foreignId('question_id')->constrained('question');
            $table->timestamps();
            // $table->integer('question_id')->index();
            // $table->foreign('question_id')->references('id')->on('question');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jeux_pendu');
    }
};
