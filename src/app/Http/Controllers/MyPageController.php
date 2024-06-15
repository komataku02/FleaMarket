<?php

namespace App\Http\Controllers;


use App\Models\Item;
use App\Models\Purchase;


class MyPageController extends Controller
{

    public function index()
    {

        $user = auth()->user();

        $items = Item::where('user_id', auth()->id())->get();

        return view('mypage.index', compact('items', 'user'));
    }

    public function purchasedItems()
    {

        $user = auth()->user();

        $purchasedItems = Purchase::where('user_id', auth()->id())->get();

        return view('mypage.purchased_items', compact('purchasedItems', 'user'));
    }
}
