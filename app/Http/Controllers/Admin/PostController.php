<?php

namespace App\Http\Controllers\Admin;

use App\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use illuminate\Support\Str;

class PostController extends Controller
{




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        // Here we take all the posts
        $posts = Post::all();

        // Here return the view Index passing by parameter the object posts
        return view('admin.posts.index', compact('posts'));
    }







    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.posts.create');
    }







    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // validations datas
        $request->validate([
            'title'=>'required|max:250',
            'content'=>'required'
        ]);

        $DatasPost = $request->all();
        
        $newPost = new Post();

        $newPost->fill($DatasPost);

        $newPost->slug = Post::convertToSlug($newPost->title);

        $newPost->save();

        return redirect()->route('admin.posts.index');
    }









    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // //
        // $post = Post::find($id);
        if (!$post){
            abort(404);
        }
        // oppure senza il find e l'if si poteva direttamente mettere $post = Post::findOrFail($id)

        return view('admin.posts.show', compact('post'));
        
    }






    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        if (!$post){
            abort(404);
        }

        // view of a page edit to change the datas passing by parameter the data '$post' 
        return view('admin.posts.edit',compact('post'));
    }








    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Post $post)
    {
        // here we check if the request(the datas) ara valid
        $request->validate([
            'title'=>'required|max:250',
            'content'=>'required'
        ]);

        $data = $request->all();


        $post->fill($data);

        $post->slug = Post::convertToSlug($post->title);

        $post->update();

        return redirect()->route('admin.posts.index');
    }









    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index');


    }
}
