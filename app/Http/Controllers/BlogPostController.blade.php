<?php

namespace App\Http\Controllers;

use App\Models\BlogComments;
use App\Models\BlogPost;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
        return view('blog.index', ['blogPosts' => $blogPosts]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return the view
       return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //dd(auth()->user()->id);
        // store the blog post
        $newPost = BlogPost::create([
            'title' => $request->title,
            'content' => $request->content,
            'slug' => $request->slug,
            'user_id' => $request->user()->id,
            //'comment_id' => $request->comment_id,
        ]);
        return redirect('blog/' . $newPost->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogPost $postId)
    {
        // return the view
        //return $postId;
        $blogPost = BlogPost::find($postId);
        $blogComments = BlogComments::where('blog_post_id', $postId->id)
            ->orderBy('created_at', 'desc')
            ->get();
        
       //dd($blogComments);
        return view('blog.show', ['blogPost' => $postId, 'blogComments' => $blogComments]);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogPost $postId)
    {
        // return the view
        //$blogPost = BlogPost::find($editPost);
        //dd($postId);
        return view('blog.edit', ['blogPost' => $postId]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogPost $postId)
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
        return redirect('blog/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogPost $postId)
    {
        //dd($blogPost);
        // destroy post
        $postId->delete();
        return redirect('blog/');
    }
}
