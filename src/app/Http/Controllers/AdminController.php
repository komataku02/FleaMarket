<?php

namespace App\Http\Controllers;

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
        $users = User::where('is_admin', false)->get();
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
}
