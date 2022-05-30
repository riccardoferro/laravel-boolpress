<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    // here we insert the datas also with the property slug 
    protected $fillable = ['title','content','slug'];
}
