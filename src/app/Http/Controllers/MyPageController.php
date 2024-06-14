<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Purchase;
use App\Models\User;

class MyPageController extends Controller
{
    // 出品した商品一覧を表示するメソッド
    public function index()
    {

        $user = auth()->user();

        // 出品した商品を取得
        $items = Item::where('user_id', auth()->id())->get();

        return view('mypage.index', compact('items','user'));
    }

    // 購入した商品一覧を表示するメソッド
    public function purchasedItems()
    {

        $user = auth()->user();
        // ログインユーザーが購入した商品を取得
        $purchasedItems = Purchase::where('user_id', auth()->id())->get();

        return view('mypage.purchased_items', compact('purchasedItems','user'));
    }
}

