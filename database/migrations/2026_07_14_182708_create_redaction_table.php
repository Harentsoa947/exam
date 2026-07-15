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

        Schema::create('redaction', function (Blueprint $table) {
            $table->increments('id');
            $table->text('texte_question');
            $table->integer('points');
            $table->integer('max_mot');
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
        Schema::dropIfExists('redaction');
    }
};
