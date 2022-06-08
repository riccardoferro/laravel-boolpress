<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Str;

class Post extends Model
{
    //
    // here we insert the datas also with the property slug 
    protected $fillable = ['title','content','slug','category_id','cover'];



    // Siccome vogliamo usarla non nell'istanza ma nella classe utilizziamo la proprieta' statica
    // take a string as input and return a unique slug version
    public static function convertToSlug($title){

        $slugPrefix = Str::slug($title);

        $Slug = $slugPrefix;

        // andiamo ad interrogare il DB per vedere se esiste gia' questo slug

        // where 'slug' = $slug
        $postFound = Post::where('slug',$slugPrefix)->first();
        
        $counter = 1;

        while($postFound){
            $Slug = $slugPrefix . '_' . $counter;
            $counter++;
            $postFound = Post::where('slug',$Slug)->first();
        }

        return $Slug;
    }


    // relation with the model category
    public function category() {

        // here he return an object
        return $this->belongsTo('App\Category');

    }


    // relation with the model Tag
    public function tags() {

        // here he return an array, we'll have a lot of tags
        return $this->belongsToMany('App\Tag');

    }


}
