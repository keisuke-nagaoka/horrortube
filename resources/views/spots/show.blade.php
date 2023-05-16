@extends('layouts.app')

@section('content')

@php
    use App\Helpers\YouTubeHelper;
@endphp

@if (Auth::id() === $spot->user_id)

    <head>
        <link rel="stylesheet" href="/css/show.css">
    </head>

    <body>
    <div class="title">
        <h2>【　{{ $spot->name }}　】</h2>
    </div>
    
    <table class="w-full">

        <tr>
            <th>住所</th>
            <td>{{ $spot->adress }}</td>
        </tr>
        
        <tr>
            <th>噂など</th>
            <td>{{ $spot->content }}</td>
        </tr>        

        <tr>
            <th>YouTube動画リンク1⃣</th>
            <td>
                @if ($spot->image1 === null)
                <img src="{{ Storage::disk('s3')->url('spot_image/horrortube_null_logo.JPG') }}">
                @else
                <img src="{{ YouTubeHelper::getVideoThumbnail($spot->image1) }}" alt="Video Thumbnail">
                <a class="content link" href="{{ $spot->image1 }}" target="_brank">動画を見る</a>
                @endif
            </td>
        </tr>

        <tr>
            <th>YouTube動画リンク2⃣</th>
            <td>
                @if ($spot->image2 === null)
                <img src="{{ Storage::disk('s3')->url('spot_image/horrortube_null_logo.JPG') }}">
                @else
                <img src="{{ YouTubeHelper::getVideoThumbnail($spot->image2) }}" alt="Video Thumbnail">
                <a class="content link" href="{{ $spot->image2 }}" target="_brank">動画を見る</a>
                @endif
            </td>
        </tr>

        <tr>
            <th>YouTube動画リンク3⃣</th>
            <td>
                @if ($spot->image3 === null)
                <img src="{{ Storage::disk('s3')->url('spot_image/horrortube_null_logo.JPG') }}">
                @else
                <img src="{{ YouTubeHelper::getVideoThumbnail($spot->image3) }}" alt="Video Thumbnail">
                <a class="content link" href="{{ $spot->image3 }}" target="_brank">動画を見る</a>
                @endif
            </td>
        </tr>

        <tr>
            <th>YouTube動画リンク4⃣</th>
            <td>
                @if ($spot->image4 === null)
                <img src="{{ Storage::disk('s3')->url('spot_image/horrortube_null_logo.JPG') }}">
                @else
                <img src="{{ YouTubeHelper::getVideoThumbnail($spot->image4) }}" alt="Video Thumbnail">
                <a class="content link" href="{{ $spot->image4 }}" target="_brank">動画を見る</a>
                @endif
            </td>
        </tr>

        <tr>
            <th>YouTube動画リンク5⃣</th>
            <td>
                @if ($spot->image5 === null)
                <img src="{{ Storage::disk('s3')->url('spot_image/horrortube_null_logo.JPG') }}">
                @else
                <img src="{{ YouTubeHelper::getVideoThumbnail($spot->image5) }}" alt="Video Thumbnail">
                <a class="content link" href="{{ $spot->image5 }}" target="_brank">動画を見る</a>
                @endif
            </td>
        </tr>
        
    </table>
        
        <a class="btn" href="{{ route('spots.edit', $spot->id) }}">心霊スポットを編集する</a>

        <form method="POST" action="{{ route('spots.destroy', $spot->id) }}" class="my-2">
            @csrf
            @method('DELETE')
        
            <button type="submit" class="btn btn-delete"
                onclick="return confirm('{{ $spot->name }} を削除します。よろしいですか？')">心霊スポットを削除する</button>
        </form>
        
    </body>
    
@else

    <head>
        <link rel="stylesheet" href="/css/show.css">
    </head>

    <body>
    <div class="title">
        <h2>【　{{ $spot->name }}　】</h2>
    </div>
    
    <table class="w-full">

        <tr>
            <th>住所</th>
            <td>{{ $spot->adress }}</td>
        </tr>
        
        <tr>
            <th>噂など</th>
            <td>{{ $spot->content }}</td>
        </tr>        

        <tr>
            <th>YouTube動画リンク1⃣</th>
            <td>
                @if ($spot->image1 === null)
                <img src="{{ Storage::disk('s3')->url('spot_image/horrortube_null_logo.JPG') }}">
                @else
                <img src="{{ YouTubeHelper::getVideoThumbnail($spot->image1) }}" alt="Video Thumbnail">
                <a class="content link" href="{{ $spot->image1 }}" target="_brank">動画を見る</a>
                @endif
            </td>
        </tr>

        <tr>
            <th>YouTube動画リンク2⃣</th>
            <td>
                @if ($spot->image2 === null)
                <img src="{{ Storage::disk('s3')->url('spot_image/horrortube_null_logo.JPG') }}">
                @else
                <img src="{{ YouTubeHelper::getVideoThumbnail($spot->image2) }}" alt="Video Thumbnail">
                <a class="content link" href="{{ $spot->image2 }}" target="_brank">動画を見る</a>
                @endif
            </td>
        </tr>

        <tr>
            <th>YouTube動画リンク3⃣</th>
            <td>
                @if ($spot->image3 === null)
                <img src="{{ Storage::disk('s3')->url('spot_image/horrortube_null_logo.JPG') }}">
                @else
                <img src="{{ YouTubeHelper::getVideoThumbnail($spot->image3) }}" alt="Video Thumbnail">
                <a class="content link" href="{{ $spot->image3 }}" target="_brank">動画を見る</a>
                @endif
            </td>
        </tr>

        <tr>
            <th>YouTube動画リンク4⃣</th>
            <td>
                @if ($spot->image4 === null)
                <img src="{{ Storage::disk('s3')->url('spot_image/horrortube_null_logo.JPG') }}">
                @else
                <img src="{{ YouTubeHelper::getVideoThumbnail($spot->image4) }}" alt="Video Thumbnail">
                <a class="content link" href="{{ $spot->image4 }}" target="_brank">動画を見る</a>
                @endif
            </td>
        </tr>

        <tr>
            <th>YouTube動画リンク5⃣</th>
            <td>
                @if ($spot->image5 === null)
                <img src="{{ Storage::disk('s3')->url('spot_image/horrortube_null_logo.JPG') }}">
                @else
                <img src="{{ YouTubeHelper::getVideoThumbnail($spot->image5) }}" alt="Video Thumbnail">
                <a class="content link" href="{{ $spot->image5 }}" target="_brank">動画を見る</a>
                @endif
            </td>
        </tr>
        
    </table>
        
    </body>
    
@endif
    
@endsection