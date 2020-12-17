@extends('layouts.app')

@section("content")
   <div class="container">
   @if($post->image)
        <img src="{{'/images/'.$post->image}}" width="100" height="100">
    @endif
  
    <h4>{{ $post->title }}</h4> 
    @if($post->excerpt)
       <p>{{$post->excerpt}}</p>
    @endif
        Category - 
        @forelse($post->categories as $category)
                    {{$category->name }} , 
                @empty
                    No Category
                @endforelse
        <p>{{$post->body}}</p>
        <a href="/post/{{ $post->id}}/edit"><button class="btn btn-success">Edit</button></a>
        <form action="/post/{{$post->id}}" method="POST">
            {{ method_field("DELETE") }}
            @csrf
            <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-primary">DELETE</button>
        </form>
   </div>
@endsection