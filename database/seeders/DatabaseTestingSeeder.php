<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseTestingSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('wishes')->insert([
            'title' => 'Deseo Test 4',
            'text' => 'Texto del deseo 4',
            'isCompleted' => false,
            'date' => '2024-05-30',
        ]);
    }
}
