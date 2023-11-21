@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/blog" class="btn btn-outline-primary btn-sm">Go back</a>
                <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4">
                    <h1 class="display-4">Edit Post</h1>
                    <p>Edit and submit this form to update a post</p>

                    <hr>

                    <form action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="control-group col-12">
                                <label for="title">Post Title</label>
                                <input type="text" id="title" class="form-control" name="title"
                                       placeholder="Enter Post Title" value="{{ $blogPost->title }}" required>
                            </div>
                            <div class="control-group col-12 mt-2">
                                <label for="content">Post Content</label>
                                <textarea id="content" class="form-control" name="content" placeholder="Enter Post Content"
                                          rows="5" required>{{ $blogPost->content }}</textarea>
                            </div>
                            <div class="control-group col-12 mt-2">
                                <label for="slug">Slug URL</label>
                                <textarea id="slug" class="form-control" name="slug" placeholder="Enter A Memorable URL"
                                          rows="" required>{{ $blogPost->slug }}</textarea>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">
                                <button id="btn-submit" class="btn btn-primary">
                                    Update Post
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection