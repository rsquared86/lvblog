@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/blog" class="btn btn-outline-primary btn-sm">Go back</a>
                <h1 class="display-one">{{ ucfirst($blogPost->title) }}</h1>
                <p>{!! $blogPost->content !!}</p> 
                
                <a href="/blog/{{ $blogPost->id }}/edit" class="btn btn-outline-primary">Edit Post</a>
                <br><br>
                <form id="delete-frm" class="" action="" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">Delete Post</button>
                </form>
                <hr/>
                <h3>Comments</h3>
                <div>
                <a href="/comments/{{ $blogPost->id }}/" class="btn btn-primary btn-sm">Add Comment</a>

                </div>
                <div class="comments">
                    @foreach($blogComments as $comment)
                        <div class="comment">
                            <h4>{{ $comment->comment }}</h4>
                            <!-- <p>{{ $comment->user_id }}</p> -->
                        </div>
                        <hr/>
                    @endforeach
            </div>
            
        </div>
    </div>
@endsection