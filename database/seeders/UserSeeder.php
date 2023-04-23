<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Moderator;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // if (!config('app.admin_password')) {
        //     throw new \Exception('Environment variable ADMIN_PASSWORD is required. You can set it in .env file');
        // }

        // User::factory()->create([
        //     'name' => 'Vitalii',
        //     'email' => 'synthex@bk.ru',
        //     'password' => bcrypt(config('app.admin_password')), // secret
        //     'email_verified_at' => now(),
        // ]);

        if(! Admin::whereEmail('admin@flagstudio.ru')->exists()) {
            Admin::factory()->create([
                'name' => 'Admin',
                'email' => 'admin@flagstudio.ru',
                'password' => bcrypt('admin'), // secret
                'email_verified_at' => now(),
            ]);
        }

        if(! Moderator::whereEmail('moderator@flagstudio.ru')->exists()) {
            Moderator::factory()->create([
                'name' => 'Moderator',
                'email' => 'moderator@flagstudio.ru',
                'password' => bcrypt('admin'), // secret
                'email_verified_at' => now(),
            ]);
        }
    }
}
