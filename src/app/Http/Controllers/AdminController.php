<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Item;
use App\Models\PurchaseHistory;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function items()
    {
        $items = Item::all();
        return view('admin.items', compact('items'));
    }

    public function payments()
    {
        $payments = PurchaseHistory::all();
        return view('admin.payments', compact('payments'));
    }

    public function grantAdmin(User $user)
    {
        $user->update(['is_admin' => true]);
        return redirect()->back()->with('success', '管理者権限を付与しました。');
    }

    public function revokeAdmin(User $user)
    {
        $user->update(['is_admin' => false]);
        return redirect()->back()->with('success', '管理者権限を削除しました。');
    }
}
