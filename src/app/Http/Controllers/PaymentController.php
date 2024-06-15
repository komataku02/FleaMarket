<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\PurchaseHistory;
use Illuminate\Support\Facades\Session;
use Stripe\Stripe;
use Stripe\Charge;

class PaymentController extends Controller
{
    public function show($itemId, $price)
    {
        $item = Item::findOrFail($itemId);
        return view('payment', compact('item', 'price'));
    }

    public function store(Request $request, $itemId)
    {
        $item = Item::findOrFail($itemId);
        $price = $item->price;


        $paymentMethod = session('payment_method', $request->input('payment_method'));

        if ($paymentMethod === 'credit_card') {
            Stripe::setApiKey(config('services.stripe.secret'));

            try {
                Charge::create([
                    'source' => $request->stripeToken,
                    'amount' => $price,
                    'currency' => 'jpy',
                ]);
            } catch (\Exception $e) {
                return back()->with('error', '決済に失敗しました！(' . $e->getMessage() . ')');
            }
        } elseif ($paymentMethod === 'bank_transfer') {

            $bankAccountNumber = $request->input('bank_account_number');
            $bankRoutingNumber = $request->input('bank_routing_number');

            if (!$bankAccountNumber || !$bankRoutingNumber) {
                return back()->with('error', '銀行口座情報が不足しています！');
            }
        }

        PurchaseHistory::create([
            'user_id' => auth()->id(),
            'item_id' => $itemId,
            'amount' => $price,
            'payment_method' => $paymentMethod,
        ]);

        return back()->with('success', '決済が完了しました！');
    }

    public function selectPaymentMethod(Request $request)
    {

        Session::put('item_id', $request->input('itemId'));
        Session::put('price', $request->input('price'));

        return view('payment.method');
    }

    public function updatePaymentMethod(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|string|in:credit_card,bank_transfer',
        ]);

        session(['payment_method' => $request->payment_method]);

        $itemId = session('item_id');
        $price = session('price');

        return redirect()->route('payment.show', ['itemId' => $itemId, 'price' => $price])
            ->with('success', '支払い方法が更新されました。');
    }
}

