<?php

namespace App\Http\Controllers;

use App\Models\cr;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $posts = Post::with('category', 'user')->orderBy('created_at', 'DESC')->take(5)->get();
        $postsFirst2 = $posts->splice(0, 2);
        $middlePost = $posts->splice(0, 1);
        $lastPost = $posts->splice(0);

        $footerPost = Post::with('category', 'user')->inRandomOrder()->limit(4)->get();;
        $firstfooterPost = $footerPost->splice(0, 1);
        $firstfooterPost2 = $footerPost->splice(0, 2);
        $lastFooterPost = $footerPost->splice(0, 1);

        $recentPosts = Post::with('category', 'user')->orderBy('created_at', 'DESC')->paginate(9);
        return view('website.home', compact(['posts', 'recentPosts', 'footerPost', 'postsFirst2', 'middlePost', 
        'lastPost', 'firstfooterPost2', 
        'firstfooterPost', 'lastFooterPost']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        if($category)
        {
            $posts = Post::where('category_id', $category->id)->paginate(9);
            return view('website.category', compact('category', 'posts'));
        }
        else
        {
            return redirect()->route('website');
        }
        
    }

    public function tag($slug)
    {
        $tag = Tag::where('slug', $slug)->first();
        if($tag)
        {
            $posts = $tag->posts()->orderBy('created_at', 'desc')->paginate(9);
            return view('website.tag', compact('tag', 'posts'));
        }
        else
        {
            return redirect()->route('website');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function post($slug)
    {
        $relatedPost = Post::orderBy('category_id', 'desc')->inRandomOrder()->take(4)->get();;
        $firstrelatedPost = $relatedPost->splice(0, 1);
        $firstrelatedPost2 = $relatedPost->splice(0, 2);
        $lastrelatedPost = $relatedPost->splice(0, 1);

        $post = Post::with('category', 'user')->where('slug', $slug)->first();
        $posts = Post::with('category', 'user')->inRandomOrder()->limit(3)->get();
        $categories = Category::all();
        $tags = Tag::all();
        if($post){
            return view('website.post', compact('post', 'posts', 'categories', 'tags', 
            'firstrelatedPost', 'firstrelatedPost2', 'lastrelatedPost', 'relatedPost'));
        }
        else{
            return('/');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
   
    public function about()
    {
        $user = User::first();
        return view('website.about', compact('user'));
    }

    public function contact()
    {
        return view('website.contact');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function edit(cr $cr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cr $cr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy(cr $cr)
    {
        //
    }
}
