<?php

use Illuminate\Database\Seeder;

//import model
use App\Tag;

use Illuminate\Support\Str;


class DeleteDuplicateTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //here we take all the tags
        $allTags = Tag::all();

        //take datas
        $tags = [];

        foreach ($allTags as $tag) {
                if (in_array($tag->name,$tags)) {
                    $tag->delete();
                }else {
                    $tags[] = $tag->name;
                }
        }

    }
}
