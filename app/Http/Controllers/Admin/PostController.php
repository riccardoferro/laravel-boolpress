<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Category;
use App\Tag;

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
        $categories = Category::all();

        // take all the tags
        $tags = Tag::all();


        return view('admin.posts.create',compact('categories','tags'));
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
            'content'=>'required|min:5|max:100',
            'category_id'=>'required|exists:categories,id',
            'tags[]'=>'exists:tags,id'
        ],[
            'title.required' => 'Titolo deve essere valorizzato',
            'title.max' => 'Hai superato i 250 caratter',
            'content.required' => ':attribute deve avere minimo essere compilato ',
            'content.min' => 'Il contenuto deve avere almeno :min caratteri',
            'content.max' => 'Il contenuto deve avere almeno :max caratteri',
            'category.exists'=>'La categoria selezionata non esiste',
            'tags[]' =>'Tag non esiste'

        ]);

        $DatasPost = $request->all();
        
        $newPost = new Post();

        $newPost->fill($DatasPost);

        $newPost->slug = Post::convertToSlug($newPost->title);

        //se si vuole valorizzare qualcosa con l'id del nuovo post prima deve essere salvato
        $newPost->save();


        // add tags
        if (array_key_exists('tags',$DatasPost)){
            // dd($DatasPost['tags']);
            // insert new datas  
            $newPost->tags()->sync($DatasPost['tags']);
        }

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

        // $category = Category::find($post->category_id);

        // return view('admin.posts.show', compact('post','category'));


        // questi due dump non sono uguali, quando facciamo "$post->category" prendera' il campo "#related" del "$post->category()" 
        // accedere alla funzione o alla proprieta' ritorna oggetti di classe diversi
        // usare la proprieta' per accedere alla tabella associata
        
        //dump($post->category)
        //dd($post->category())


        // dump($post);
        // dd($post->category);

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

        $categories = Category::all();

        $tags = Tag::all();

        // view of a page edit to change the datas passing by parameter the data '$post' 
        return view('admin.posts.edit',compact('post','categories','tags'));
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
            'content'=>'required|min:5|max:100',
            'category_id'=>'required|exists:categories,id',
            'tags'=>'exists:tags,id'
        ],[
            'title.required' => 'Titolo deve essere valorizzato',
            'title.max' => 'Hai superato i 250 caratter',
            'content.required' => ':attribute deve avere minimo essere compilato ',
            'content.min' => 'Il contenuto deve avere almeno :min caratteri',
            'content.max' => 'Il contenuto deve avere almeno :max caratteri',
            'category.exists'=>'La categoria selezionata non esiste',
            'tags' =>'Tag non esistente'
        ]);

        $data = $request->all();


        $post->fill($data);

        $post->slug = Post::convertToSlug($post->title);


        // add tags
        if (array_key_exists('tags',$data)){
            // dd($data['tags']);
            // insert new datas  
            $post->tags()->sync($data['tags']);
        }else{
            $post->tags()->sync([]);
        }


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

        if ($post){

            $post->tags()->sync([]);

            $post->delete();
        }
        return redirect()->route('admin.posts.index');


    }
}
