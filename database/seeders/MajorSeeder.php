<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('major')->insert([
            [
                'title' => 'Rekayasa Perangkat Lunak',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Teknik Komputer dan Jaringan',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Akuntansi dan Keuangan Lembaga',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Bisnis Daring dan Pemasaran',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
