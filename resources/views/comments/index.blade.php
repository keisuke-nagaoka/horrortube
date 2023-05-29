@extends('layouts.app')

<link rel="stylesheet" href="/css/thread.css">

<body>

<div class="mt-4">
    @if (isset($comments))
        <ul class="list-none">
            @foreach ($comments as $comment)
                <li class="flex items-start gap-x-2 mb-4">
                    {{--<div class="avatar">
                        <div class="w-12 rounded">
                            @if ($user->image === null)
                                <img src="{{ Storage::disk('s3')->url('user_image/horrortube_null_logo.JPG') }}">
                            @else
                                <img src="{{ $user->image }}">
                            @endif
                        </div>
                    </div>--}}
                    <div>
                        <div>
                            {{-- コメントの所有者のユーザー --}}
                            <a class="text-info">{{ $comment->user->name }}</a>
                            <span class="text-muted text-gray-500">投稿日時 {{ $comment->created_at }}</span>
                        </div>
                        <div>
                            {{-- 投稿内容 --}}
                            <p class="mb-0">{!! nl2br(e($comment->post)) !!}</p>
                        </div>
                        <div>
                            @if (Auth::id() == $comment->user_id)
                                {{-- 投稿削除ボタンのフォーム --}}
                                <form method="POST" action="{{ route('comments.destroy', $comment->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete btn-sm"
                                        onclick="return confirm('「{{ $comment->post }}」 このコメントを削除しますか？')">コメントの削除</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
        {{-- ページネーションへのリンク --}}
        {{ $comments->links() }}
    @endif
</div>

</body>