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

        Schema::create('comprehension_du_texte', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('points');
            $table->string('titre_texte');
            $table->text('textes');
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
        Schema::dropIfExists('comprehension_du_texte');
    }
};
