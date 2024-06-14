<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;


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
            'categories.0' => 'required|exists:categories,id',
            'categories.*' => 'nullable|exists:categories,id',
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

        $item->categories()->attach(array_filter($request->categories));

        return redirect()->route('items.create')->with('success', '出品しました');
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);
        $categories = Category::all();

        return view('items.edit', compact('item', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'categories.0' => 'required|exists:categories,id',
            'categories.*' => 'nullable|exists:categories,id',
            'condition' => 'required',
        ]);

        $item = Item::findOrFail($id);
        $item->update($request->only(['name', 'description', 'price', 'condition']));

        $item->categories()->sync(array_filter($request->categories));

        return redirect()->route('mypage.index')->with('message', '商品情報が更新されました。');
    }
}
