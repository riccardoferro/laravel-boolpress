@extends('layouts.dashboard')


@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>Visualizzazione post </h1>
                    {{-- Here we go to the view admin.posts.create to create a post--}}
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">
                        Tutti i posts
                    </a>
                </div>

                <dl>
                    <dt>Titolo</dt>
                    <dd>{{ $post->title }}</dd>
                    <dt>Slug</dt>
                    <dd>{{ $post->slug }}</dd>
                    <dt>Categoria</dt>
                    <dd>{{ $post->category->name }}</dd>
                    <dt>Contenuto</dt>
                    <dd>{{ $post->content }}</dd>
                    <dt>Tags</dt>
                    <dd>
                        @foreach ($post->tags as $tag)
                            <span>{{ $tag->name}}</span>
                        @endforeach    
                    </dd>
                    
                </dl>


                {{-- here we can edit the post --}}
                <a href="{{ route( 'admin.posts.edit', ['post' => $post->id] ) }}" 
                  class="btn btn-warning">

                    Modifica

                </a>
                
                {{-- thats a form with a button to delete the post --}}
                <form action="{{ route('admin.posts.destroy', ['post' => $post->id] ) }}" 
                  class="d-inline-block" 
                  method="POST">

                    {{-- control --}}
                    @csrf
                    @method('DELETE')
                    
                    <button type="submit" class="btn btn-danger">

                      Elimina

                    </button>
                </form>


            </div>
        </div>
    </div>

@endsection