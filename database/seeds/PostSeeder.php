<?php

use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use App\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 20; $i++) {
            $post = new Post();
            $post->title = $faker->sentence(3);
            $post->image = $faker->imageUrl(640, 300, 'Posts', true, $post->title);
            $post->body = $faker->text();
            $post->save();
        }
    }
}