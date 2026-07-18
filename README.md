2026_07_08_012844_create_categories_table.php
Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('slug')->unique();
            $table->timestamps();
        });

2026_07_10_060142_create_examens_table.php
Schema::create('examens', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description')->nullable();
            $table->foreignId('categorie_id')->constrained('categories')->cascadeOnDelete();
            $table->integer('duree_minutes')->nullable();
            $table->enum('status', ['brouillon', 'publie', 'archive'])->default('brouillon');
            $table->timestamps();
 });
