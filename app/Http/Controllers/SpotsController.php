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

class SpotsController extends Controller
{
    public function index($id)
    {
        // idから都道府県を検索して取得
        $prefecture = Prefecture::findOrFail($id);
        
        // 都道府県の心霊スポット一覧を表示
        $spots = $prefecture->spots()->paginate(10);
        
        return view('spots.index',[
            'prefecture' => $prefecture,
            'spots' => $spots,
        ]);
    }
    
    
    public function create($id)
    {
        // idから都道府県を検索して取得
        $prefecture = Prefecture::findOrFail($id);
        
        // 心霊スポットの新規登録
        $spot = new Spot;
        
        return view('spots.create', [
            'spot' => $spot,
            'prefecture' => $prefecture,
        ]);
    }
    
    
    public function store(Request $request, $id)
    {
        // バリデーション
        $request->validate([
            'name' => 'required',
            'content' => 'required|max:255',
        ]);
        
        // 心霊スポットの新規登録
        $spot = new Spot;
        
        // idの値で都道府県を検索して取得
        $prefecture = Prefecture::findOrFail($id);
        
        // idの値で認証済ユーザを検索して取得
        $user = Auth::user();
        
        // データベースに入力内容を保存
        $spot->image1 = $request->image1;
        $spot->image2 = $request->image2;
        $spot->image3 = $request->image3;
        $spot->image4 = $request->image4;
        $spot->image5 = $request->image5;
        $spot->name = $request->name;
        $spot->adress = $request->adress;
        $spot->content = $request->content;
        $spot->prefecture_id = $prefecture->id;
        $spot->user_id = $user->id;
        $spot->save();

        return redirect('/');
    }
    

    public function show($id)
    {
        // 都道府県に紐付く心霊スポットを取得し表示
        $spot = Spot::findOrFail($id);
        
        // 都道府県を取得
        $prefecture = $spot->prefecture;

        return view('spots.show', [
            'spot' => $spot,
        ]);
    }
    

    public function edit($id)
    {
        // 都道府県に紐付く心霊スポットを取得し表示
        $spot = Spot::findOrFail($id);

        // 認証済ユーザーがその心霊スポットの登録者である場合は編集を許可
        if (\Auth::id() === $spot->user_id) {

            // 都道府県を取得
            $prefecture = $spot->prefecture;

            return view('spots.edit', [
                'spot' => $spot,
            ]);
        }
        
        return view('dashboard');
    }
    
    
    public function update(Request $request, $id)
    {
        // バリデーション
        $request->validate([
            'name' => 'required',
            'content' => 'required|max:255',
        ]);
        
        // idの値で心霊スポットを検索して取得
        $spot = spot::findOrFail($id);
        
        if (Prefecture::findOrFail($spot->prefecture_id)) {
            
            // データベースに入力内容を保存
            $spot->image1 = $request->image1;
            $spot->image2 = $request->image2;
            $spot->image3 = $request->image3;
            $spot->image4 = $request->image4;
            $spot->image5 = $request->image5;
            $spot->name = $request->name;
            $spot->adress = $request->adress;
            $spot->content = $request->content;
            $spot->save();

            return redirect('/');
        }
        
        return view('dashboard');
    }
    

    public function destroy($id)
    {
        $spot = Spot::findOrFail($id);

        // 認証済ユーザーがその心霊スポットの登録者である場合は削除を許可
        if (\Auth::id() === $spot->user_id) {

            if (Prefecture::findOrFail($spot->prefecture_id)) {
                $spot->delete();
                return redirect('/');
            }
        
        return view('dashboard');
        
        }
        
    return view('dashboard');
    
    }
}
