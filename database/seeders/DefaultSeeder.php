<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Vitalii',
        //     'email' => 'synthex@bk.ru',
        //     'password' => bcrypt(config('app.admin_password')), // secret
        //     'email_verified_at' => now(),
        // ]);


        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            LiabilitySeeder::class,
            ClientSeeder::class,
            PromotionSeeder::class,
            SourceSeeder::class,
            AssetSeeder::class,
        ]);
    }
}
