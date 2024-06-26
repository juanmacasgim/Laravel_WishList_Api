<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('wishes')->insert([
            'title' => 'Deseo Test 1',
            'text' => 'Texto del deseo 1',
            'isCompleted' => false,
            'date' => '2024-05-30 10:34:00',
        ]);
    }
}
