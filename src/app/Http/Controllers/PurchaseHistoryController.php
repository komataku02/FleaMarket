<?php

namespace App\Http\Controllers;


use App\Models\PurchaseHistory;

class PurchaseHistoryController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $purchaseHistories = PurchaseHistory::with('item')->where('user_id', $user->id)->get();

        return view('mypage.purchased_items', compact('purchaseHistories', 'user'));
    }
}
