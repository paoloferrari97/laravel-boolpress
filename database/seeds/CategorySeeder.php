<?php

use Illuminate\Database\Seeder;
use App\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ["Programming", "Automation", "Web Design", "Best Practice"];

        foreach ($categories as $category) { //ciclo nell'array categories
            $catg = new Category();
            $catg->name = $category;
            $catg->slug = Str::slug($category); //per creare slug
            $catg->save();
        }
    }
}