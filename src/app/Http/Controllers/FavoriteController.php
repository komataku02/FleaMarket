<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{

    public function index()
    {

        $favorites = Auth::user()->favorites;

        return view('my_items', compact('favorites'));
    }

    public function favorite($id)
    {
        $favorite = Favorite::where('item_id', $id)->where('user_id', auth()->id())->first();

        if ($favorite) {
            return back()->with('error', '既にお気に入りに追加されています。');
        }

        $favorite = new Favorite();
        $favorite->user_id = auth()->id();
        $favorite->item_id = $id;
        $favorite->save();

        return back();
    }

    public function unfavorite($id)
    {
        $favorite = Favorite::where('item_id', $id)->where('user_id', auth()->id())->first();

        if ($favorite) {
            $favorite->delete();
        }

        return redirect()->back()->with('success', 'お気に入りから削除しました。');
    }
}
