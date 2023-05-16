@extends('layouts.app')

@section('content')

@php
    use App\Helpers\YouTubeHelper;
@endphp

@if (Auth::check())

    <head>
        <link rel="stylesheet" href="/css/index.css">
    </head>

    <body>

    <a class="btn" href="{{ route('spots.create', $prefecture->id) }}">心霊スポットの新規登録</a>

    <div class="title">
        <h2>{{ $prefecture->name }} の心霊スポット一覧</h2>
    </div>

    @if (isset($spots))
        <table class="w-full">
            <thead>
                <tr>
                    <th>YouTube動画リンク1⃣</th>
                    <th>YouTube動画リンク2⃣</th>
                    <th>YouTube動画リンク3⃣</th>
                    <th>YouTube動画リンク4⃣</th>
                    <th>YouTube動画リンク5⃣</th>
                    <th>スポットの名前</th>
                    <th>住所</th>
                    <th>噂など</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($spots as $spot)
                <tr>
                    <td>
                        @if ($spot->image1 === null)
                        <img src="{{ Storage::disk('s3')->url('spot_image/horrortube_null_logo.JPG') }}">
                        @else
                        <img src="{{ YouTubeHelper::getVideoThumbnail($spot->image1) }}" alt="Video Thumbnail">
                        <a class="content link" href="{{ $spot->image1 }}" target="_brank">動画を見る</a>
                        @endif
                    </td>
                    <td>
                        @if ($spot->image2 === null)
                        <img src="{{ Storage::disk('s3')->url('spot_image/horrortube_null_logo.JPG') }}">
                        @else
                        <img src="{{ YouTubeHelper::getVideoThumbnail($spot->image2) }}" alt="Video Thumbnail">
                        <a class="content link" href="{{ $spot->image2 }}" target="_brank">動画を見る</a>
                        @endif
                    </td>
                    <td>
                        @if ($spot->image3 === null)
                        <img src="{{ Storage::disk('s3')->url('spot_image/horrortube_null_logo.JPG') }}">
                        @else
                        <img src="{{ YouTubeHelper::getVideoThumbnail($spot->image3) }}" alt="Video Thumbnail">
                        <a class="content link" href="{{ $spot->image3 }}" target="_brank">動画を見る</a>
                        @endif
                    </td>
                    <td>
                        @if ($spot->image4 === null)
                        <img src="{{ Storage::disk('s3')->url('spot_image/horrortube_null_logo.JPG') }}">
                        @else
                        <img src="{{ YouTubeHelper::getVideoThumbnail($spot->image4) }}" alt="Video Thumbnail">
                        <a class="content link" href="{{ $spot->image4 }}" target="_brank">動画を見る</a>
                        @endif
                    </td>
                    <td>
                        @if ($spot->image5 === null)
                        <img src="{{ Storage::disk('s3')->url('spot_image/horrortube_null_logo.JPG') }}">
                        @else
                        <img src="{{ YouTubeHelper::getVideoThumbnail($spot->image5) }}" alt="Video Thumbnail">
                        <a class="content link" href="{{ $spot->image5 }}" target="_brank">動画を見る</a>
                        @endif
                    </td>
                    <td><a class="content link" href="{{ route('spots.show', $spot->id) }}">{{ $spot->name }}</a></td>
                    <td>{{ $spot->adress }}</td>
                    <td>{{ $spot->content }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- ページネーションのリンク --}}
        {{ $spots->links() }}
    @endif
    
    </body>

@else

    <head>
        <link rel="stylesheet" href="/css/index.css">
    </head>

    <body>

    <div class="title">
        <h2>{{ $prefecture->name }} の心霊スポット一覧</h2>
    </div>

    @if (isset($spots))
        <table class="w-full">
            <thead>
                <tr>
                    <th>YouTube動画リンク1⃣</th>
                    <th>YouTube動画リンク2⃣</th>
                    <th>YouTube動画リンク3⃣</th>
                    <th>YouTube動画リンク4⃣</th>
                    <th>YouTube動画リンク5⃣</th>
                    <th>スポットの名前</th>
                    <th>住所</th>
                    <th>噂など</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($spots as $spot)
                <tr>
                    <td>
                        @if ($spot->image1 === null)
                        <img src="{{ Storage::disk('s3')->url('spot_image/horrortube_null_logo.JPG') }}">
                        @else
                        <img src="{{ YouTubeHelper::getVideoThumbnail($spot->image1) }}" alt="Video Thumbnail">
                        <a class="content link" href="{{ $spot->image1 }}" target="_brank">動画を見る</a>
                        @endif
                    </td>
                    <td>
                        @if ($spot->image2 === null)
                        <img src="{{ Storage::disk('s3')->url('spot_image/horrortube_null_logo.JPG') }}">
                        @else
                        <img src="{{ YouTubeHelper::getVideoThumbnail($spot->image2) }}" alt="Video Thumbnail">
                        <a class="content link" href="{{ $spot->image2 }}" target="_brank">動画を見る</a>
                        @endif
                    </td>
                    <td>
                        @if ($spot->image3 === null)
                        <img src="{{ Storage::disk('s3')->url('spot_image/horrortube_null_logo.JPG') }}">
                        @else
                        <img src="{{ YouTubeHelper::getVideoThumbnail($spot->image3) }}" alt="Video Thumbnail">
                        <a class="content link" href="{{ $spot->image3 }}" target="_brank">動画を見る</a>
                        @endif
                    </td>
                    <td>
                        @if ($spot->image4 === null)
                        <img src="{{ Storage::disk('s3')->url('spot_image/horrortube_null_logo.JPG') }}">
                        @else
                        <img src="{{ YouTubeHelper::getVideoThumbnail($spot->image4) }}" alt="Video Thumbnail">
                        <a class="content link" href="{{ $spot->image4 }}" target="_brank">動画を見る</a>
                        @endif
                    </td>
                    <td>
                        @if ($spot->image5 === null)
                        <img src="{{ Storage::disk('s3')->url('spot_image/horrortube_null_logo.JPG') }}">
                        @else
                        <img src="{{ YouTubeHelper::getVideoThumbnail($spot->image5) }}" alt="Video Thumbnail">
                        <a class="content link" href="{{ $spot->image5 }}" target="_brank">動画を見る</a>
                        @endif
                    </td>
                    <td><a class="content link" href="{{ route('spots.show', $spot->id) }}">{{ $spot->name }}</a></td>
                    <td>{{ $spot->adress }}</td>
                    <td>{{ $spot->content }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- ページネーションのリンク --}}
        {{ $spots->links() }}
    @endif
    
    </body>
    
@endif
    
@endsection