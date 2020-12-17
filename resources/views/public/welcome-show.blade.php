@extends("public.public-layout")

@section("body")
  <div class="post-show">
  @if($post->image)
       <div class="container">
       <div class="row">
          <div class="col-sm-12">
            <img src="{{'/images/'.$post->image}}" class="image-fluid public-show-photo">
          </div>
        </div>
       </div>
    @endif
  <h2 class="post-head">{{$post->title}}</h2>
    category - {{$post->category->name}}

    <p class="text-body">{{changetourl($post->body)}}</p>

  </div>
    <div class="my-3">
    <a href="{{url()->previous()}}"><button class="btn primary"> Go back </button></a>
    </div>

    <p class="mention">Related</p>
    <div class="container">
      <div class="row">
        @foreach($posts as $post)  
        
          
              <div class="card col-md-3 post">
                <div class="card-body">
                  <h5 class="card-title"><a href="/{{$post->category->name}}/{{$post->id}}"><h3 class="post-head">{{$post->title}}</h3></a> </h5>
                  by <a href="/{{$post->user->name}}">{{$post->author_name}}</a>
                  <br>
                $category - {{ $post->category->name }}
                  <br>
                </div>
            </div>
          
        @endforeach 
        </div>
      </div>
    </div>
@endsection