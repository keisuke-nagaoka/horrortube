@extends('layouts.app')

<link rel="stylesheet" href="/css/thread.css">

<body>
    @if (Auth::check())
        <div class="sm:grid sm:grid-cols-3 sm:gap-10" id="threads">
            <div class="sm:col-span-2">
                {{-- 投稿フォーム --}}
                @include('comments.form')
                {{-- 投稿一覧 --}}
                @include('comments.index')
            </div>
        </div>
    @else
        <div class="sm:grid sm:grid-cols-3 sm:gap-10" id="threads">
            <div class="sm:col-span-2">
                <a class="content link" href="{{ route('register') }}">コメントを投稿するにはユーザ登録が必要です</a>
                {{-- 投稿一覧 --}}
                @include('comments.index')
            </div>
        </div>
    @endif
</body>