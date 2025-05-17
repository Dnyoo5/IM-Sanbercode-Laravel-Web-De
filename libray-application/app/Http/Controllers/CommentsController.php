<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
   public function store(Request $request, Book $book)
{
    $request->validate([
        'message' => 'required|string|max:1000',
    ]);

    $comment = $book->comments()->create([
        'user_id' => auth()->id(),
        'content' => $request->message,
    ]);

    if ($request->ajax()) {
        return response()->json([
            'message' => $comment->content,
            'user_name' => $comment->user->name,
        ]);
    }

    return back()->with('success', 'Komentar berhasil ditambahkan.');
}

}
