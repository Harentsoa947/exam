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

        Schema::create('sujet_configuration', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sujet_id')->constrained('sujets');
            $table->foreignId('type_id')->constrained('types_question');
            $table->timestamps();
            // $table->integer('sujet_id')->index();
            // $table->foreign('sujet_id')->references('id')->on('sujets');
            // $table->integer('type_id')->index();
            // $table->foreign('type_id')->references('id')->on('types_question');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sujet_configuration');
    }
};
