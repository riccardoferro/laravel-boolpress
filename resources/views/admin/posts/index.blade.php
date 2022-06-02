@extends('layouts.dashboard')


@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>Tutti i posts</h1>
                    {{-- Here we go to the view admin.posts.create to create a post--}}
                    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
                        Crea nuovo post
                    </a>
                </div>


                <table class="table">
                    {{-- titles --}}
                    <thead>
                            <tr>
                                    <td>ID</td>
                                    <td>Title</td>
                                    <td>Slug</td>
                                    <td>Azioni</td>
                            </tr>
                    </thead>

                    {{-- body of the table --}}
                    <tbody>
                            @foreach ($posts as $post)

                                    {{-- datas --}}
                                    <tr>
                                          <td> {{ $post->id }} </td>
                                          <td> {{ $post->title }} </td>
                                          <td> {{ $post->slug }} </td>
                                          <td>
                                          {{-- here we want with a link show a detail of the post,
                                              we sent to the view posts.show the post id  --}}
                                          <td>
                                              <a href="{{ route('admin.posts.show',$post->id) }}"> DET </a>
                                          </td>

                                          <td>
                                              <a href="{{ route('admin.posts.edit',$post->id) }}"> EDI </a>
                                          </td>

                                          <td>
                                              <form action="{{ route('admin.posts.destroy', $post )}}" method="POST">
                                                      @csrf
                                                      @method('DELETE')
                                              
                                                      <input class="deleteBtn" type="submit" value="DEL">
                                                  </form>  
                                          </td>
                                        </td>
                                      </tr> 
                            @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    {{-- <a href="{{ route('comics.create') }}"> Insert new comic </a> --}}

@endsection