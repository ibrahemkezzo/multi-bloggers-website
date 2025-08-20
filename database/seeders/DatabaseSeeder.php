<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);

                // Create 10 users
        // User::factory()->count(10)->create();

        // Create 5 categories
        // Category::factory()->count(5)->create();

        // Create 50 blogs, linking to existing users and categories
        // Blog::factory()->count(20)->create([
        //     'user_id' => fn () => User::inRandomOrder()->first()->id,
        //     'category_id' => fn () => Category::inRandomOrder()->first()->id,
        // ]);
    }
}
