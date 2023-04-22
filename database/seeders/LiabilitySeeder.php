<?php

namespace Database\Seeders;

use App\Models\Liability;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LiabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Liability::factory()->count(5)->create();
    }
}
