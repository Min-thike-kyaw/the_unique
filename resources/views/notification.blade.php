@extends("layouts.app")

@section("content")
    @foreach ($user->notifications as $notification)
    
    <b>{{$notification->data['author']}}</b> creates a post with the title <i><b>"{{$notification->data['title']}}"</b></i>
    <br>
    <a href="/post/{{$notification->data['post_id']}}">Click to see</a>
    <hr>
    @endforeach
@endsection