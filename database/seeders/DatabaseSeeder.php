<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Models\ProductIngredient;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use MoonShine\Models\MoonshineUser;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        MoonshineUser::create([
            'name' => 'Admin',
            'email' => 'terowoc@mail.ru',
            'password' => Hash::make('password'),
        ]);

        User::factory(2)->create();
        Category::factory(5)->create();
        Product::factory(20)->create();
        ProductIngredient::factory(20)->create();
        Comment::factory(100)->create();

    }
}
