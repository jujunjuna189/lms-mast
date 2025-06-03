<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('room')->insert([
            [
                'title' => 'X RPL 1',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'XI TKJ 2',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'XII AKL 1',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'X BDP 1',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
