<?php
use App\Category;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class AddCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //we can also take this datas from the folder config
        $categories = ['Vegan','Fitness'];


        foreach ($categories as $category) {
            $new_category_object = new Category();
            $new_category_object->name = $category;
            $new_category_object->slug = Str::slug($category);
            $new_category_object->save();
        }

    }
}
