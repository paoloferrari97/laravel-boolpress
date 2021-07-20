<?php

use Illuminate\Database\Seeder;

use App\Article;

use Faker\Generator as Faker;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 15; $i++) {
            $article = new Article();

            $article->title = $faker->sentence();
            $article->text = $faker->text();
            $article->date = $faker->date();
            $article->author = $faker->name();

            $article->save();
        }
    }
}