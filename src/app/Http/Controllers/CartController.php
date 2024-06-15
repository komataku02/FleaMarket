<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user_id', Auth::id())->get();
        return view('cart.index', compact('carts'));
    }

    public function addToCart( $itemId)
    {
        $userId = Auth::id();
        $item = Item::findOrFail($itemId);

        $cartItem = Cart::where('user_id', $userId)->where('item_id', $itemId)->first();

        if ($cartItem) {
            return redirect()->route('cart.index')->with('success', 'この商品は既にカートに追加されています。');
        } else {
            Cart::create([
                'user_id' => $userId,
                'item_id' => $item->id,
                'quantity' => 1
            ]);
        }

        return redirect()->route('cart.index')->with('success', '商品がカートに追加されました。');
    }

    public function destroy($id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();

        return redirect()->route('cart.index')->with('success', 'カートから商品を削除しました。');
    }

    public function checkout()
    {
        $carts = Cart::where('user_id', Auth::id())->get();

        if ($carts->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'カートに商品がありません。');
        }

        $item = $carts->first()->item;
        $price = $carts->sum(function ($cart) {
            return $cart->item->price * $cart->quantity;
        });

        return redirect()->route('payment.show', ['itemId' => $item->id, 'price' => $price]);
    }
}
