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
    <form action="/post" method="POST" enctype="multipart/form-data">
    @csrf
    
        <div class="form-group">
            <label for="">Post Image</label><br>
            <input type="file" name="rimage">
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control">
        </div>

        <div class="form-group">
            <label for="excerpt">Excerpt</label>
            <textarea name="excerpt" cols="30" rows="3" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <select name="categories[]" multiple>
                @foreach($categories as $category)
                <option value="{{$category->id}}" >{{$category->name}}</option>
                @endforeach
            </select>
            <p><a href="/category/create">+ Add Category</a></p>
            
        </div>


        <div class="form-group">
            <label for="title">Body</label>
            <textarea name="body" cols="30" rows="20" class="form-control"></textarea>
        </div>
        

        <button class="btn btn-success">Submit</button>
    </form>
    </div>
    @endsection