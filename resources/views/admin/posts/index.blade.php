@extends('layouts.dashboard')


@section('content')

<table class="m-auto mt-5 w-75">

  {{-- titles --}}
  <thead>
          <tr>
                  <td>Id</td>
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

                      {{-- here we want with a link show a detail of the post,
                           we sent to the view posts.show the post id  --}}
                      {{-- <td>
                          <a href="{{ route('posts.show',$post->id) }}"> Detail </a>
                      </td>

                      <td>
                          <a href="{{ route('posts.edit',$post->id) }}"> Edit </a>
                      </td> --}}

                      {{-- <td>
                          <form action="{{ route('posts.destroy', $post )}}" method="POST">
                                  @csrf
                                  @method('DELETE')
                          
                                  <input class="deleteBtn" type="submit" value="delete">
                              </form>  
                      </td> --}}
                  </tr> 
          @endforeach
  </tbody>
</table>

{{-- <a href="{{ route('comics.create') }}"> Insert new comic </a> --}}



@endsection