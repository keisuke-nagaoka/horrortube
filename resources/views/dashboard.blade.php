@extends('layouts.app')

@section('content')

    <head>
        <link rel="stylesheet" href="/css/dashboard.css">
    </head>

    <body>
        
    <div class="explanatory">
        <h1>
            HorrorTubeは心霊系YouTube好きの為のまとめサイトです。<br>
            心霊スポットごとに好きなYouTube動画(URL)を登録いただけます。
        </h1>
    </div>
    <div class="warning">
        <h1>
            HorrorTubeは肝試しを推奨しているサイトではありません。<br>
            所有者の許可なく侵入する事は犯罪です。
        </h1>
    </div>
    <div class="cation">
        <h1>
            また、当サイトをご利用された後に<br>
            貴方の身に起きた事象に対しては一切の責任は負いかねます。
        </h1>
    </div>

    @if (isset($prefectures))
        <table class="w-full">
            
            <thead>
                <tr>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                @foreach ($prefectures as $prefecture)
                        <td><a class="prefectures content link" href="{{ route('spots.index', $prefecture->id) }}">{{ $prefecture->name }}</a></td>
                @endforeach
                </tr>
            </tbody>
            
        </table>
    @endif
    
    <a class="content link comment" href="{{ route('thread') }}">コメント掲示板</a>

    </body>

@endsection