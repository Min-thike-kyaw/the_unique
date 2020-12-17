@extends('layouts.app')

@section("content")
    <div class="container">
    <form action="/category" method="POST">
    @csrf
        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" name="name" class="form-control">
        </div>
        <button class="btn btn-primary">Create category</button>
    </form>
    </div>
@endsection