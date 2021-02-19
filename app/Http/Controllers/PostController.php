<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Str;
use Session;
use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(20);
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all(); 
        return view('admin.post.create', compact(['categories', 'tags']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
     
        $this->validate($request, [
            'title' => 'required|unique:posts,title',
            'image' => 'required|image',
            'category_id' => 'required',
            'description' => 'required',
            'tags' => 'exists:tags, id',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title), 
            'image' => 'image.jpg',
            'category_id' => $request->category_id,
            'description' => $request->description,
            'user_id' => auth()->user()->id,
            'published_at' => Carbon::now(),

        ]);

        if($request->has('image'))
        {
            $image = $request->image;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/post', $image_new_name);
            $post->image = '/storage/post/' . $image_new_name;
        }

        $post->save();

        $post->tags()->attach(request('tag'));

        Session::flash('success', 'Post created successfully!');
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.post.edit', compact(['post', 'categories', 'tags']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => 'required|unique:posts,title,' . $post->id,
            'category_id' => 'required',
            'description' => 'required',
            'tags' => 'exists:tags, id',
        ]);

            $post->title = $request->title;
            $post->slug = Str::slug($request->title);
            $post->category_id = $request->category_id;
            $post->description = $request->description;

        if($request->hasFile('image'))
        {
            $image = $request->image;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/post', $image_new_name);
            $post->image = '/storage/post/' . $image_new_name;
            
        }
        $post->tags()->sync(request('tag'));
        $post->save();

        Session::flash('success', 'Post updated successfully!');
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post)
        {
            if(file_exists(public_path($post->image)))
            {
                unlink(public_path($post->image));
            }
            
            $post->delete();
            Session::flash('Post deleted successfully!');
        }

        return redirect()->route('post.index');
    }
}
