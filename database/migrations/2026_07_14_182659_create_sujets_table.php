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

        Schema::create('sujets', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->foreignId('examen_id')->constrained('examen');
            $table->foreignId('prof_id')->constrained('utilisateurs');
            $table->timestamps();
            // $table->integer('examen_id')->index();
            // $table->foreign('examen_id')->references('id')->on('examen');
            // $table->integer('prof_id')->index();
            // $table->foreign('prof_id')->references('id')->on('utilisateurs');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sujets');
    }
};
