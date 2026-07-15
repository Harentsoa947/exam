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

        Schema::create('qcm', function (Blueprint $table) {
            $table->id();
            $table->integer('points');
            $table->string('text_question');
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->foreignId('forme_question')->constrained('choix_multiple')->nullable();
            $table->foreignId('question_id')->constrained('question')->nullable();
            $table->timestamps();
            // $table->integer('forme_question')->index();
            // $table->foreign('forme_question')->references('id')->on('choix_multiple');
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
        Schema::dropIfExists('qcm');
    }
};
