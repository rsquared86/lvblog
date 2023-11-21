<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all blog posts
        $blogPosts = BlogPost::all();
        // log $blogPosts
        
        // return the view
        // return a rendered Inertia response
        //return view('blog.index', ['blogPosts' => $blogPosts]);

        return Inertia::render('Blogs/Index', [
            'blogPosts' => $blogPosts,
            
        ]);


        //return view('blog.index', ['blogPosts' => $blogPosts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return the view
        return Inertia::render('Blogs/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //dd(auth()->user()->id);
        // store the blog post
        BlogPost::create([
            'title' => $request->title,
            'content' => $request->content,
            'slug' => $request->slug,
            'user_id' => $request->user()->id,
            //'comment_id' => $request->comment_id,
        ]);
        return redirect(route('blog.index'))->with('success', 'Blog post created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogPost $postId)
    {
        // return the view
        //return $postId;
        $blogPost = BlogPost::find($postId);
        //dd($blogPost);
        return Inertia::render('Blogs/Show', [
            'blogPost' => $blogPost,
            
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogPost $postId)
    {
        // return the view
        $blogPost = BlogPost::find($postId);
        return Inertia::render('Blogs/Edit', [
            'blogPost' => $blogPost,
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogPost $postId): RedirectResponse
    {
        // log to the console
        //dd($blogPost);
        //$this->authorize('update', $blogPost);
        $postId->update([
            'title' => $request->title,
            'content' => $request->content,
            'slug' => $request->slug,
            //'comment_id' => $request->comment_id,
        ]);
        return redirect(route('blog.index'))->with('success', 'Blog post updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogPost $postId)
    {
        dd($postId);
        // destroy post
        $postId->delete();
        return redirect(route('blog.index'))->with('success', 'Blog post deleted.');
    }
}
