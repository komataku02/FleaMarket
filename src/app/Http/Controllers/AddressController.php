<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AddressController extends Controller
{
    public function edit(Request $request)
    {
        // itemIdとpriceをセッションに保存
        Session::put('item_id', $request->input('itemId'));
        Session::put('price', $request->input('price'));

        return view('address.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'postal_code' => 'required|string|max:10',
            'address' => 'required|string|max:255',
            'building_name' => 'nullable|string|max:255',
        ]);

        $address = [
            'postal_code' => $request->postal_code,
            'address' => $request->address,
            'building_name' => $request->building_name,
        ];

        session(['address' => $address]);

        // itemIdとpriceをセッションから取得してリダイレクトに使用
        $itemId = session('item_id');
        $price = session('price');

        return redirect()->route('payment.show', ['itemId' => $itemId, 'price' => $price])
            ->with('success', '配送先が更新されました。');
    }
}
