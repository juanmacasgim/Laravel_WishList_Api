<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class DatabaseTestingSeeder
 * This class is used to seed the database with testing data.
 */
class DatabaseTestingSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('wishes')->insert([
            [
                'title' => 'Deseo Test 1',
                'text' => 'Texto del deseo 1',
                'isCompleted' => false,
                "date" => "26/5/2024 22:59:59"
            ],
            [
                'title' => 'Deseo Test 2',
                'text' => 'Texto del deseo 2',
                'isCompleted' => false,
                "date" => "26/5/2024 22:59:59"
            ],
            [
                'title' => 'Deseo Test 3',
                'text' => 'Texto del deseo 3',
                'isCompleted' => false,
                "date" => "26/5/2024 22:59:59"
            ]
        ]);
    }
}
