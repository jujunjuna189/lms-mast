<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('grade')->insert([
            [
                'title' => 'X',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'XI',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'XII',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
