@extends("public.public-layout")

@section("body")

<div id="wrapper">
	<div id="page" class="container">
    Total - {{$authors->count()}}
		
			<ul>
            @foreach($authors as $author)  
				<li> 
                <a href="/authors/{{$author->name}}"><h3 >{{$author->name}}</h3></a>
				<p>Total Articles - {{App\Post::where('author_id',$author->id)->count()}}
                <br>
                Followers - {{App\Follower::where('user_id',$author->id)->count()}}</a></p>
				</li>
                <hr>
			</ul>
            @endforeach
		
	</div>
</div>

@endsection