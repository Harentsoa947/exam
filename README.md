2026_07_17_063604_create_student_examen_table.php
Schema::create('student_examen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('examen_id')->constrained('examens')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->boolean('termine')->default(false);
            $table->timestamp('date_examen')->nullable();
            $table->timestamps();

            $table->unique(['examen_id', 'user_id']);
        });

2026_07_20_065040_create_qcm_table.php
Schema::create('qcm', function (Blueprint $table) {
            $table->id();
            $table->foreignId('examen_id')->constrained('examens')->cascadeOnDelete();
            $table->foreignId('categorie_id')->constrained('categories')->cascadeOnDelete();
            $table->string('titre'); 
            $table->text('description')->nullable();
            $table->integer('duree_minutes')->nullable(); 
            $table->integer('note_totale')->nullable(); 
            $table->integer('ordre')->default(0);
            $table->timestamps();
        });
2026_07_20_065507_create_qcm_questions_table.pnp
Schema::create('qcm_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('qcm_id')->constrained('qcm')->cascadeOnDelete();
            $table->text('enonce');
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->enum('reponse_type', ['true_false', 'single', 'multiple'])->default('single');
            $table->decimal('points', 5, 2)->default(1);
            $table->integer('duree_seconde')->nullable();
            $table->integer('ordre')->default(0);
            $table->timestamps();
        });
2026_07_20_065703_create_qcm_choices_table.php
 Schema::create('qcm_choices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('qcm_question_id')->constrained('qcm_questions')->cascadeOnDelete();
            $table->string('texte');
            $table->boolean('est_correcte')->default(false);
            $table->integer('ordre')->default(0);
            $table->timestamps();
        });
2026_07_20_070510_create_pointiller_table.php
Schema::create('pointiller', function (Blueprint $table) {
            $table->id();
            $table->foreignId('examen_id')->constrained('examens')->cascadeOnDelete();
            $table->foreignId('categorie_id')->constrained('categories')->cascadeOnDelete();
            $table->string('titre');
            $table->text('description')->nullable();
            $table->integer('duree_minutes')->nullable();
            $table->integer('note_totale')->nullable();
            $table->integer('ordre')->default(0);
            $table->timestamps();
        });
2026_07_20_070946_create_pointiller_questions_table.php
 Schema::create('pointiller_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pointiller_id')->constrained('pointiller')->cascadeOnDelete();
            $table->text('enonce'); // ohatra "Le [1] web est l'ensemble de [2] parfait."
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->decimal('points', 5, 2)->default(1);
            $table->integer('ordre')->default(0);
            $table->timestamps();
        });
2026_07_20_071549_create_pointiller_reponses_table.php
Schema::create('pointiller_reponses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pointiller_question_id')->constrained('pointiller_questions')->cascadeOnDelete();
            $table->integer('position');
            $table->string('reponse_correcte');
            $table->timestamps();
        });
2026_07_20_071731_create_pointiller_choices_table.php
 Schema::create('pointiller_choices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pointiller_reponse_id')->constrained('pointiller_reponses')->cascadeOnDelete();
            $table->string('texte');
            $table->timestamps();
        });
Ireo aloa ny voasokatra fa tonga de table ikambanan'ny rehetra ireo ,izany hoe raha vita ny qcm dev ohatra dia vita koa izany ny exercice rehetra 
Ity ny table apesaina rehefa hanao examen ilay mpianatra 
2026_07_20_164414_create_exam_attempts_table.php
Schema::create('exam_attempts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->cascadeOnDelete();
            $table->foreignId('examen_id')->constrained('examens')->cascadeOnDelete();
            $table->integer('numero_tentative')->default(1);
            $table->enum('status', ['en_cours','termine',])->default('en_cours');
            $table->timestamp('date_debut')->nullable();
            $table->timestamp('date_fin')->nullable();
            $table->decimal('score', 8, 2)->default(0);
            $table->timestamps();
        });
2026_07_20_165215_create_qcm_reponses_table.php
ity mstocke ilay reponse an'ny mpianatra an'ny qcm
 Schema::create('qcm_reponses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('qcm_question_id')->constrained('qcm_questions')->cascadeOnDelete();
            $table->foreignId('qcm_choice_id')->nullable()->constrained('qcm_choices')->nullOnDelete();
            $table->foreignId('exam_attempt_id')->constrained('exam_attempts')->cascadeOnDelete();
            $table->foreignId('student_id')->constrained('users')->cascadeOnDelete();
            $table->boolean('est_correcte')->default(false);
            $table->decimal('points_obtenus', 5, 2)->default(0);
            $table->timestamps();
        });
