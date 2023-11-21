<?php

namespace App\Http\Controllers;

use App\Models\BlogComments;
use Illuminate\Http\Request;

class BlogCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($postId)
    {
        // create a comment
        return view('comments.create', [
            'postId' => $postId,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        // store the comment
        $newComment = BlogComments::create([
            'comment' => $request->comment,
            'user_id' => $request->user()->id,
            'blog_post_id' => $request->postId,
        ]);
        return redirect('blog/' . $newComment->blog_post_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogComments $blogComments)
    {
        // show comments
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogComments $blogComments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogComments $blogComments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogComments $blogComments)
    {
        //
    }
}
