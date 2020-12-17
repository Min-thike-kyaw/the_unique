@extends("public.public-layout")

@section("body")

<div id="wrapper">
	<div id="page" class="container">
  <h3 class="my-4">Author - {{$user->name}}</h3>
    <form action="/follower" method="POST">
    @csrf
    <input type="hidden" name="user_id" value="{{$user->id}}"> 
        <div class="row"> 
            <div class="col-md-8">         
                <input type="email" name="email" required class="form-control" placeholder="Enter your email..">   
            </div>
            <div class="col-md-4">
                <button class="btn btn-outline-danger mx-0">Subcribe {{$user->name}}</button>
            </div>
        </div>
        
    </form>
		
			<ul>
      @if($posts->count())
            @foreach($posts as $post)  
              <div class="m-3">
                <a href="/{{$post->category->name}}/{{$post->id}}"><h3 >{{$post->title}}</h3></a>
                <p class="category-name">category - {{ $post->category->name }}</p>
                <p>{{Str::limit($post->body, 300, ' ...Seemore')}}</p>
                <hr>
              </div>
            @endforeach 
            @else
          <h2>No post to show</h2>
        @endif
		</ul>
	</div>
</div>




@endsection