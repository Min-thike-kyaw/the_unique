<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Category;
use App\Follower;
use App\Mail\PostCreated;
use Illuminate\Http\Request;
use App\Events\PostCreateEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Notifications\PostCreatedNotification;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $posts = Post::get();
        $post_count = Post::count();
        
        return view('posts/post',compact('posts','post_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
        $categories = Category::get();
        return view('posts/post-create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validatedData = request()->validate([
            'title' => 'required',
            'categories' => 'exists:categories,id',
            'body' => 'required',
            'excerpt' => 'required',
            'rimage' => 'required|image',
        ]);
        //upload image
        $imageName = date('YmdHis') . "." . request()->rimage->getClientOriginalExtension();
        request()->rimage->move(public_path('images'), $imageName);
    
        $post = new Post(request(['title','excerpt','body']));
        $post->author_id = auth()->user()->id;
        $post->image = $imageName;
        $post->save();
        $post->categories()->attach(request('categories'));
        
        event(new PostCreateEvent($post));
        
        return redirect('post');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    { 
        return view('posts/post-show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
    
        // $this->authorize('view',$post);
        $categories = Category::get();
        return view('posts/post-edit', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        $post->categories()->detach(request('categories'));

        $validateData = request()->validate([
            'title' => 'required',
            'categories' => 'exists:categories,id',
            'body' => 'required',
            'excerpt' => 'required',
            'rimage' => 'image'
        ]);
        if(request()->rimage == null) {
            $post->update(['title','excerpt','body'] + ['author_id' => auth()->user()->id,  'image'=> $post->image]);
            
        } else {
            Storage::delete($post->image);
            if (request()->rimage) {
                //upload image
                $imageName = date('YmdHis') . "." . request()->rimage->getClientOriginalExtension();
                request()->rimage->move(public_path('images'), $imageName);
            }
            $post->update(['title','excerpt','body'] + ['author_id' => auth()->user()->id,  'image'=> empty($imageName) ? null : $imageName]);
        }
            $post->categories()->attach(request('categories'));
            return redirect('post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('view',$post); 
        $post->categories()->detach(request('categories'));

        Storage::delete($post->image);
        $post->delete();

        return redirect('post');
    }
}
