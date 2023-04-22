<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!config('app.admin_password')) {
            throw new \Exception('Environment variable ADMIN_PASSWORD is required. You can set it in .env file');
        }

        User::factory()->create([
            'name' => 'Vitalii',
            'email' => 'synthex@bk.ru',
            'password' => bcrypt(config('app.admin_password')), // secret
            'email_verified_at' => now(),
        ]);
    }
}
