@extends('layouts.app')

@section("content")
    <div class="container">
    <a href="/user/create"><button class="btn btn-primary">Create user</button></a>
        <table class="table">
        <thead class="thead-dark">
            <tr>
            
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>

                    <form action="/user/{{$user->id}}" method="POST">
                    {{ method_field("DELETE") }}
                    @csrf
                    <button class="btn btn-danger">Delete</button>
                    <a href="user/{{ $user->id}}/edit" class="btn btn-success">Edit</a>
                    </form>
                </td>
            </tr>
        @endforeach
            
            
        </tbody>
        </table>
    
    </div>
@endsection