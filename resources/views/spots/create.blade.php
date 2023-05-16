@extends('layouts.app')

@section('content')

    <head>
        <link rel="stylesheet" href="/css/create.css">
    </head>

    <body>
    <div class="title">
        <h2>{{ $prefecture->name }} の心霊スポットの登録</h2>
    </div>

    <div class="flex justify-center">
        <form method="POST" action="{{ route('spots.store', $prefecture->id) }}" class="w-1/2">
            @csrf

            <div class="form-control my-4">
                <label for="text" class="label">
                    <span class="label-text">YouTube動画リンク1⃣</span>
                </label>
                    <input type="text" name="image1" class="input input-bordered w-full">
            </div>

            <div class="form-control my-4">
                <label for="text" class="label">
                    <span class="label-text">YouTube動画リンク2⃣⃣</span>
                </label>
                    <input type="text" name="image2" class="input input-bordered w-full">
            </div>
            
            <div class="form-control my-4">
                <label for="text" class="label">
                    <span class="label-text">YouTube動画リンク3⃣⃣</span>
                </label>
                    <input type="text" name="image3" class="input input-bordered w-full">
            </div>

            <div class="form-control my-4">
                <label for="text" class="label">
                    <span class="label-text">YouTube動画リンク4⃣⃣</span>
                </label>
                    <input type="text" name="image4" class="input input-bordered w-full">
            </div>
            
            <div class="form-control my-4">
                <label for="text" class="label">
                    <span class="label-text">YouTube動画リンク5⃣⃣</span>
                </label>
                    <input type="text" name="image5" class="input input-bordered w-full">
            </div>
            
            <div class="form-control my-4">
                <label for="text" class="label">
                    <span class="label-text">スポットの名前　<a class="must">*必須項目</a></span>
                </label>
                    <input type="text" name="name" class="input input-bordered w-full">
            </div>
            
            <div class="form-control my-4">
                <label for="text" class="label">
                    <span class="label-text">住所</span>
                </label>
                    <input type="text" name="adress" class="input input-bordered w-full">
            </div>
            
            <div class="form-control my-4">
                <label for="text" class="label">
                    <span class="label-text">噂など　<a class="must">*必須項目</a></span>
                </label>
                    <input type="text" name="content" class="input input-bordered w-full">
            </div>

            <button type="submit" class="btn">登録する</button>
        </form>
    </div>
    </body>
    
@endsection