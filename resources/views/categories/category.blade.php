@extends('layouts.app')

@section("content")
    <div class="container">
    <a href="/category/create"><button class="btn btn-primary">Create Category</button></a>
        <table class="table">
        <thead class="thead-dark">
            <tr>
            
            <th scope="col">Category Name</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                
                <td>{{$category->name}}</td>
                <td>
                    <a href="category/{{ $category->id}}/edit"><button class="btn btn-success">Edit</button></a>
                    <form action="/category/{{$category->id}}" method="POST">
                    {{ method_field("DELETE") }}
                    @csrf
                    <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
            
            
        </tbody>
        </table>
    
    </div>
@endsection