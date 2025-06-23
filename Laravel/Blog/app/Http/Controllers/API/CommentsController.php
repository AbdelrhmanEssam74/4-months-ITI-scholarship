<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request)
    {
        $request->validate([
            'article_id' => 'required|exists:articles,id',
            'content' => 'required|min:5',
        ]);

        Comment::create([
            'user_id' => $request->input('user_id', 1), // Default to 1 if not provided
            'article_id' => $request->article_id,
            'body' => $request->content,
        ]);
        return response()->json([
            'message' => 'Comment added successfully.',
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);
//        if (auth()->id() !== $comment->user_id) {
//            return response()->json([
//                'message' => 'Unauthorized'
//            ], 403);
//        }
        $request->validate([
            'body' => 'required|string|max:1000',
        ]);
        $comment->body = $request->body;
        $comment->save();

        return response()->json([
            'message' => 'Comment updated successfully.',
            'comment' => $comment
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        if (auth()->id() !== $comment->user_id) {
            abort(403, 'Unauthorized action.');
        }
        $comment->delete();
        return response()->json([
            'message' => 'Comment deleted successfully.',
        ], 200);
    }
}
