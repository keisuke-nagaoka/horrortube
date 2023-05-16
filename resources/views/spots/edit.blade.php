@extends('layouts.app')

@section('content')

@php
    use App\Helpers\YouTubeHelper;
@endphp

    <head>
        <link rel="stylesheet" href="/css/edit.css">
    </head>

    <body>
    <div class="title">
        <h2>【　{{ $spot->name }}　 】編集</h2>
    </div>

    <div class="flex justify-center">
        <form method="POST" action="{{ route('spots.update', $spot->id) }}" class="w-1/2 content">
            @csrf
            @method('PUT')
            
                <div class="form-control my-4">
                    <label for="text" class="label">
                        <span class="label-text">YouTube動画リンク1⃣</span>
                    </label>
                    @if ($spot->image1 === null)
                    <img src="{{ Storage::disk('s3')->url('spot_image/horrortube_null_logo.JPG') }}">
                    @else
                    <img src="{{ YouTubeHelper::getVideoThumbnail($spot->image1) }}" alt="Video Thumbnail">
                    @endif
                        <input type="text" name="image1" value="{{ $spot->image1 }}" class="input input-bordered w-full">
                </div>

                <div class="form-control my-4">
                    <label for="text" class="label">
                        <span class="label-text">YouTube動画リンク2⃣</span>
                    </label>
                    @if ($spot->image2 === null)
                    <img src="{{ Storage::disk('s3')->url('spot_image/horrortube_null_logo.JPG') }}">
                    @else
                    <img src="{{ YouTubeHelper::getVideoThumbnail($spot->image2) }}" alt="Video Thumbnail">
                    @endif
                        <input type="text" name="image2" value="{{ $spot->image2 }}" class="input input-bordered w-full">
                </div>
                
                <div class="form-control my-4">
                    <label for="text" class="label">
                        <span class="label-text">YouTube動画リンク3⃣</span>
                    </label>
                    @if ($spot->image3 === null)
                    <img src="{{ Storage::disk('s3')->url('spot_image/horrortube_null_logo.JPG') }}">
                    @else
                    <img src="{{ YouTubeHelper::getVideoThumbnail($spot->image3) }}" alt="Video Thumbnail">
                    @endif
                        <input type="text" name="image3" value="{{ $spot->image3 }}" class="input input-bordered w-full">
                </div>
                
                <div class="form-control my-4">
                    <label for="text" class="label">
                        <span class="label-text">YouTube動画リンク4⃣</span>
                    </label>
                    @if ($spot->image4 === null)
                    <img src="{{ Storage::disk('s3')->url('spot_image/horrortube_null_logo.JPG') }}">
                    @else
                    <img src="{{ YouTubeHelper::getVideoThumbnail($spot->image4) }}" alt="Video Thumbnail">
                    @endif
                        <input type="text" name="image4" value="{{ $spot->image4 }}" class="input input-bordered w-full">
                </div>
                
                <div class="form-control my-4">
                    <label for="text" class="label">
                        <span class="label-text">YouTube動画リンク5⃣⃣</span>
                    </label>
                    @if ($spot->image5 === null)
                    <img src="{{ Storage::disk('s3')->url('spot_image/horrortube_null_logo.JPG') }}">
                    @else
                    <img src="{{ YouTubeHelper::getVideoThumbnail($spot->image5) }}" alt="Video Thumbnail">
                    @endif
                        <input type="text" name="image5" value="{{ $spot->image5 }}" class="input input-bordered w-full">
                </div>
                
                <div class="form-control my-4">
                    <label for="text" class="label">
                        <span class="label-text">スポットの名前　<a class="must">*必須項目</a></span>
                    </label>
                        <input type="text" name="name" value="{{ $spot->name }}" class="input input-bordered w-full">
                </div>
            
                <div class="form-control my-4">
                    <label for="text" class="label">
                        <span class="label-text">住所</span>
                    </label>
                        <input type="text" name="adress" value="{{ $spot->adress }}" class="input input-bordered w-full">
                </div>
            
                <div class="form-control my-4">
                    <label for="text" class="label">
                        <span class="label-text">噂など</span>
                    </label>
                        <input type="text" name="content" value="{{ $spot->content }}" class="input input-bordered w-full">
                </div>


            <button type="submit" class="btn">更新する</button>
        </form>
    </div>
    </body>

@endsection