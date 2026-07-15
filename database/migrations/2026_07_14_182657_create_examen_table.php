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
        // Désactive les clé étrangères, utile lors des suppression
        Schema::disableForeignKeyConstraints();

        Schema::create('examen', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->unsignedInteger('durée');
            $table->integer('numero_examen');
            $table->enum('status', ['en_attente', 'pret', 'terminer'])->default('en_attente');
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('admin_id')->constrained('utilisateurs');
            $table->foreignId('prof_id')->constrained('utilisateurs');
            $table->timestamps();
            // $table->integer('category_id')->index();
            // $table->foreign('category_id')->references('id')->on('categories');
            // $table->integer('admin_id')->index();
            // $table->foreign('admin_id')->references('id')->on('utilisateurs');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('examen');
    }
};
