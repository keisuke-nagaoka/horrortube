@if (Auth::check())
    {{-- ユーザ詳細ページへのリンク --}}
    <li><a class="link-items" href="{{ route('users.show', Auth::user()->id) }}">{{ Auth::user()->name }}さんの登録情報</a></li>
    <li class="divider lg:hidden"></li>
    {{-- ログアウトへのリンク --}}
    <li><a class="link-items" href="#" onclick="event.preventDefault();this.closest('form').submit();">ログアウト</a></li>
@else
    {{-- ユーザ登録ページへのリンク --}}
    <li><a class="link-items" href="{{ route('register') }}">ユーザ登録</a></li>
    <li class="divider lg:hidden"></li>
    {{-- ログインページへのリンク --}}
    <li><a class="link-items" href="{{ route('login') }}">ログイン</a></li>
@endif