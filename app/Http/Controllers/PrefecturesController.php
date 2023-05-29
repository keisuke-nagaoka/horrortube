<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\SpotsController;
use App\Models\User;
use App\Models\Prefecture;
use App\Models\Spot;
use App\Models\Comment;

class PrefecturesController extends Controller
{
    public function index()
    {
        // 都道府県一覧を取得
        $prefectures = Prefecture::all();
        
        // トップページで表示
        return view('dashboard', [
            'prefectures' => $prefectures,
        ]);
    }
}
