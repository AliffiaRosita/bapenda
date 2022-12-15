<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'email' => 'admin@admin.com',
        ]);
        $this->call([
            AdminSeeder::class,
            AboutSeeder::class,
            ContactSeeder::class,
            CategorySeeder::class,
            NewsSeeder::class,
            BannerSeeder::class,
            PartnerSeeder::class,
            InfografisSeeder::class,
        ]);
    }
}
