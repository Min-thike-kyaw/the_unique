@extends('layouts.app')

@section("content")
    <div class="container">
    <form action="/category/{{$category->id}}" method="POST">
    {{ method_field("PATCH") }}
    @csrf
        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" name="name" class="form-control" value="{{$category->name}}">
        </div>
        <button class="btn btn-primary">Update category</button>
    </form>
    </div>
@endsection