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

        Schema::create('question', function (Blueprint $table) {
            $table->id();
            $table->integer('ordre');
            $table->foreignId('sujet_config_id')->constrained('sujet_configuration');
            $table->foreignId('types_id')->constrained('types_question');
            $table->foreignId('category_id')->constrained('categories');
            $table->timestamps();
            // $table->integer('sujet_config_id')->index();
            // $table->foreign('sujet_config_id')->references('id')->on('sujet_configuration');
            // $table->integer('types_id')->index();
            // $table->foreign('types_id')->references('id')->on('types_question');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question');
    }
};
