<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Helpers\YoutubeAPI;
use App\Http\Controllers\SpotsController;
use App\Models\User;
use App\Models\Prefecture;
use App\Models\Spot;
use App\Models\Comment;

class CommentsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        $comments = Comment::orderBy('created_at', 'desc')->paginate(10);
            
        return view('comments.thread',[
            'user' => $user,
            'comments' => $comments,
        ]);
    }
    
    
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'post' => 'required|max:255',
        ]);

/*        // ファイルを変更した場合のみ変更を保存する
        if (!is_null($file)) {
            
            // アップロードしたファイル名を取得
            $file_name = $request->file('image')->getClientOriginalName();
            
            // s3のバケットURLを取得
            $file_path = Storage::disk('s3')->putFile('comment_image', $file);
            
            // 取得したファイル名のまま保存
            $request->file('image')->storeAs('comment_image', $file_name, 's3');
                
            // s3のバケットURLを取得してデータベースに編集内容を保存
            $commnet->image = Storage::disk('s3')->url($file_path);
        } */

        // 認証済ユーザー（閲覧者）の投稿として作成
        $request->user()->comments()->create([
            'post' => $request->post,
        ]);
        
        // 前のURLへリダイレクトさせる
        return back();
    }
    
    public function destroy($id)
    {
        // idの値で投稿を検索して取得
        $comment = \App\Models\Comment::findOrFail($id);
        
        // 認証済ユーザー（閲覧者）がその投稿の所有者である場合は投稿を削除
        if (\Auth::id() === $comment->user_id) {
            $comment->delete();
            return back()
                ->with('success', 'Delete Successful');
        }
        
        // 前のURLへリダイレクトさせる
        return back()
            ->with('Delete Failed');
    }
}
