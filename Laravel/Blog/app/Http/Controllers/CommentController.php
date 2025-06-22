<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'article_id' => 'required|exists:articles,id',
            'content' => 'required|min:5',
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'article_id' => $request->article_id,
            'body' => $request->content,
        ]);

        return back()->with('success', 'Comment added successfully.');
    }
    public function destroy(Comment $comment)
    {
        if (auth()->id() !== $comment->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $comment->delete();

        return back()->with('success', 'Comment deleted successfully.');
    }
    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);


        if (auth()->id() !== $comment->user_id) {
            return redirect()->back()->with('error', 'Unauthorized');
        }

        $request->validate([
            'body' => 'required|string|max:1000',
        ]);

        $comment->body = $request->body;
        $comment->save();

        return redirect()->back()->with('success', 'Comment updated successfully.');
    }

}
