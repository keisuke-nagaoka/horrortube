@extends('layouts.app')

<link rel="stylesheet" href="/css/thread.css">

<body>

<div class="mt-4">
    <form method="POST" action="{{ route('comments.store', $user->id) }}" enctype="multipart/form-data">
        @csrf
        
        {{--<div class="w-40">
            <div class="w-40 rounded">
                @if ($comment->image === null)
                    <img src="{{ Storage::disk('s3')->url('user_image/horrortube_null_logo.JPG') }}">
                @else
                    <img src="{{ $comment->image }}">
                @endif
            </div>
        </div>
            <input class="image" type="file" name="image">--}}
        
        <div class="form-control mt-4">
            <textarea rows="5" name="post" class="input input-bordered w-full"></textarea>
        </div>
        
        <button type="submit" class="btn btn-block">コメントの投稿</button>
    </form>
</div>

</body>