<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function __construct(){
        
    }
    public function index()
    {     
        return view('public.welcome');
    }

    public function article()
    {
        $posts = Post::orderBy('id', 'desc')->get();
        return view('public.articles',compact('posts'));
    }

    public function show(Category $category,Post $post)
    {
        // dd($post);
        // $id = Str::of(url()->current())->basename();
        $posts = Post::where('category_id', $category->id)->orderBy('id','desc')->take(3)->get();
        
        $categories = Category::get();
        
        return view('public.welcome-show',compact('posts','post','categories'));
    }

    public function category_show(Category $category)
    {
        // dd("hell");
        $categories = Category::get();
        $posts = Post::where('category_id',$category->id)->orderBy('id', 'desc')->get();
        return view('public.public-category',compact('posts','categories','category'));
    }

    public function author_index()
    {
        $authors = User::get();
        
        $categories = Category::get();
        
        return view('public.author-index', compact('categories','authors'));
    }

    public function author_show(User $user)
    {
        $posts = Post::where('author_id',$user->id)->get();
        $categories = Category::get();
        
        return view('public.author-show', compact('categories','posts','user'));
    }
}
