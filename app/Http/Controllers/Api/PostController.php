<?php

namespace App\Http\Controllers\Api;

//import model post
use App\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // take all post's data, instead of take all datas with "all" we can also take less data and paginate it
        // $posts = Post::all();
        // $posts = Post::paginate(1);


        $posts = Post::with('category')->get(); //CON IL WITH SI PRENDONO I MODELLI ASSOCIATI A QUEL ELEMENTO POST:
        // SI AGGANCIA ALLE CATEGORIE TRAMITE IL MODELLO CATEGORY e mostrera'
        // tutti i dati del post tra cui anche category->id e ci sara' anche un'altra proprieta' che si chiamera' category e avra'   
        //  tutti i dati riferiti al category di quel post


        // wrapping the posts
        $result = ['result'=>$posts,'success'=>true];

        // return post's data transformed in file json
        return response()->json($result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
