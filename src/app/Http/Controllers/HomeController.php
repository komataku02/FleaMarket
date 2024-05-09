<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class HomeController extends Controller
{
    public function index()
    {

        $items = Item::getAllItems();

        return view('index', compact('items'));
    }
}
