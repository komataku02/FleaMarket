<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;


class ItemController extends Controller
{
    public function show($id)
    {
        $item = Item::findOrFail($id);
        return view('detail', compact('item'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|integer',
            'category' => 'required|array',
            'condition' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        $item = Item::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'condition' => $request->condition,
            'image' => $imagePath,
        ]);

        $item->categories()->sync($request->category);

        return redirect()->route('items.create')->with('success', '出品しました');
    }
}
