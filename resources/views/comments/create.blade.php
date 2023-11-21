@extends('layouts.app')
@section('content')
<div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4">
    <h1 class="display-4">Add a comment</h1>
    <p>Add your thoughts about this post</p>
    <hr>
    <form action="" method="POST">
        @csrf
        <div class="row">
            <div class="control-group col-12 mt-2">
                <label for="comment">Comment Text</label>
                <textarea id="comment" class="form-control" name="comment" placeholder="Enter Comment"
                            rows="" required></textarea>
            </div>
        </div>
        <input type="hidden" id="postId" name="postId" value={{$postId}}>
        <div class="row mt-2">
            <div class="control-group col-12 text-center">
                <button id="btn-submit" class="btn btn-primary">
                    Comment!
                </button>
            </div>
        </div>
    </form>
</div>
@endsection