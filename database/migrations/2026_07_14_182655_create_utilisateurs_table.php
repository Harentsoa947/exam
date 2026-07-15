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

        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('email');
            $table->string('image')->nullable();
            $table->string('password');
            $table->foreignId('role_id')->constrained('role_utilisateur');
            $table->foreignId('category_id')->nullable()->constrained('categories');
            $table->foreignId('prof_id')->nullable()->constrained('prof');
            $table->timestamps();
            // $table->integer('role')->index();
            // $table->foreign('role')->references('role')->on('role_utilisateur');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisateurs');
    }
};
