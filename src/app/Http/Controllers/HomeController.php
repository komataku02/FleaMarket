<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {

        $items = Item::all();

        $favorites = Auth::check() ? Auth::user()->favorites : null;

        return view('index', compact('items', 'favorites'));
    }
}
