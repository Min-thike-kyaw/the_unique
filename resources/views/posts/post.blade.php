@extends('layouts.app')

@section("content")
    <div class="container">
    
    <div  class="mb-4"><a href="post/create"><button class="btn btn-primary ">Create post</button></a></div>
    Total - {{$post_count}}
        @foreach($posts as $post)
            <ul>
                <a href="/post/{{$post->id}}"><h3>{{ $post->title}}</h3></a>
                @forelse($post->categories as $category)
                    {{$category->name }} , 
                @empty
                    No Category
                @endforelse
                <hr>
            </ul>
        @endforeach
    </div>
@endsection