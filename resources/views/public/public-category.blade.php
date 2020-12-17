@extends("public.public-layout")

@section("body")

<div class="container">

    <h3 class="my-4 category-name">{{$category->name}}</h3>
    <br>
    Total - {{$posts->count()}}
    <hr>
    <div>
      <ul>
      @if($posts->count())
        @foreach($posts as $post)  
          <div class="post">
            <a href="/{{$category->name}}/{{$post->id}}"><h3 >{{$post->title}}</h3></a> 
            <a href="/authors/{{$post->user->name}}">by {{$post->author_name}}</a>
            
            <p class="category-name">category - {{ $post->category->name }}</p>
          </div>
        @endforeach 
        @else
          <h2>No post to show</h2>
        @endif
      </ul>
    </div>

  </div>






@endsection




