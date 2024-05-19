<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Comment;


class CommentController extends Controller
{
    public function store(Request $request, $item_id)
    {
        $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        Comment::create([
            'item_id' => $item_id,
            'user_id' => auth()->id(),
            'comment' => $request->comment,
        ]);

        return redirect()->route('comments.show', $item_id)->with('message', 'コメントを追加しました');
    }

    public function show($item_id)
    {
        $item = Item::findOrFail($item_id);
        $comments = $item->comments()->with('user')->get();

        return view('comments.show', compact('item', 'comments'));
    }
}
