<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ArticlesTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        // Para cada usuario, le creamos algunos artículos
        $users = User::all();

        foreach ($users as $user) {
            $numArticles = rand(1, 5);

            for ($i = 0; $i < $numArticles; $i++) {
                Article::create([
                    'title'   => $faker->sentence(),
                    'body'    => $faker->paragraph(4),
                    'date'    => $faker->date(),
                    'user_id' => $user->id,
                ]);
            }
        }
    }
}
