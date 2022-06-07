<?php

use Illuminate\Database\Seeder;

//import model
use App\Tag;

use Illuminate\Support\Str;


class AnotherTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //take datas
        $tags = ['boolean','mattino','pomeriggio','sera'];

        foreach ($tags as $tag) {
            $newtag = new Tag();

            $newtag->name = $tag;
            $newtag->slug = Str::slug($tag);

            //insert datas in the DB
            $newtag->save();
        }

    }
}
