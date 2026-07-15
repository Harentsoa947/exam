<?php

namespace Database\Seeders;

// use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        // role_utilisateur
        DB::table('role_utilisateur')->insert([
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('role_utilisateur')->insert([
            'role' => 'prof',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('role_utilisateur')->insert([
            'role' => 'etudiant',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        

        // Catégories : CALL_FR, CALL_EN, BUR, DEV_WEB, PYTHON, DESIGN
        DB::table('categories')->insert([
            'category_name' => 'CALL_FR',
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        DB::table('categories')->insert([
            'category_name' => 'CALL_EN',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('categories')->insert([
            'category_name' => 'BUR',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('categories')->insert([
            'category_name' => 'DEV_WEB',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('categories')->insert([
            'category_name' => 'PYTHON',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('categories')->insert([
            'category_name' => 'DESIGN',
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        // Création user admin
        DB::table('utilisateurs')->insert([
            'nom' => 'Jean Dupont',
            'email' => 'dupont@gmail.fr',
            'password' => bcrypt('1234'),
            'role_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Création user prof
        DB::table('utilisateurs')->insert([
            'nom' => 'Doe',
            'email' => 'doe@gmail.com',
            'password' => bcrypt('0987'),
            'role_id' => 2,
            'category_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            // 'prof_id' => 1
        ]);

        // simulation examen call français
        DB::table('examen')->insert([
            'date' => Carbon::create(2030, 8, 15, 8, 30, 0), //  Y M D H:M:S
            'durée' => 120,
            'numero_examen' => 1,
            'category_id' => 1,
            'admin_id' => 1,
            'prof_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
