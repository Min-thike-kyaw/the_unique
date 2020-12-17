@extends('layouts.app')

@section("content")
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <form action="/post/{{$post->id}}" method="POST" enctype="multipart/form-data">
        {{ method_field("PATCH")}}
        @csrf
        
        <div class="form-group">
        <label for="">Post Image</label><br>
        <input type="file" name="rimage"><br><br>
        <img src="{{'/images/'.$post->image}}" width="150" height="150">
      </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" value="{{$post->title}}" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="title">Excerpt</label>
                <textarea name="excerpt" cols="30" rows="3" class="form-control">{{$post->excerpt}}</textarea>
            </div>



            <div class="form-group">
                <label for="category">Category</label>
                <select name="categories[]" class="form-control" class="form-control">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" class="form-control">{{$category->name}} </option><a href="post"></a>

                    @endforeach
                </select>
                <p><a href="/category/create">+ Add Category</a></p>
                <!-- <p><a href="/category/edit">* Edit Category</a></p> -->
                
            </div>

            <div class="form-group">
                <label for="title">Body</label>
                <textarea name="body" cols="30" rows="20" class="form-control">{{$post->body}}</textarea>
            </div>
            <button class="btn btn-primary">Edit</button>
        </form>
    </div>
@endsection