<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use MoonShine\Models\MoonshineUser;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        MoonshineUser::create([
            'name' => 'Admin',
            'email' => 'bobojonov3134304@gmail.com',
            'password' => Hash::make('Meizuu10'),
        ]);

        User::factory(2)->create();
        Category::factory(5)->create();
        Product::factory(20)->create();
        Comment::factory(100)->create();

    }
}
