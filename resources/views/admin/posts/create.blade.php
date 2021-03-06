@extends('layouts.dashboard')


@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>Creazione nuovo post </h1>
                    {{-- Here we go to the view admin.posts.create to create a post--}}
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">
                        Tutti i posts
                    </a>
                </div>

                {{-- here we check all the errors --}}
                <div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                    {{-- csrf token to control that datas comes from our site --}}
                    @csrf

                    <div class="form-group">
                        <label> Titolo </label>
                        <input type="text" name="title" class="form-control @error ('title') is-invalid @enderror"
                            placeholder="Inserisci il titolo" value="{{ old('title') }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label> Categoria </label>
                        <select name="category_id" class="@error('category_id') is-invalid @enderror">
                            <option value="">--Scegli Categoria--</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" 
                                    {{ $category->id == old('category_id') ? 'selected' : ''}}
                                > 
                                    {{$category->name}} 
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for='image'> Immagine cover </label>
                        <input type="file" name="image"/>
                    </div>

                    <div class="form-group">
                        <label> Contenuto </label>
                        <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="10"
                            placeholder="inizia a scrivere qualcosa..." required>{{ old('content') }}</textarea>

                        @error('content')
                            <div class="invalid-feedback"> {{ $message }} </div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <div> Tags </div>
                        @foreach ($tags as $tag)
                        {{-- name is an array --}}
                                <input class="form-check-input" type="checkbox" value="{{ $tag->id }}" name="tags[]" 
                                    {{ in_array($tag->id,old('tags',[])) ? 'checked' : '' }}
                                /> 
                                <div class="form-check-label"> {{ $tag->name }} </div>
                        @endforeach

                        @error('tags[]')
                            <div class="invalid-feedback"> {{ $message }} </div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-success">
                          Crea post
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection