<?php

// app/Http/Controllers/CommentController.php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        return response()->json(Comment::with('post')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'content' => 'required|string',
        ]);

        $comment = Comment::create($request->all());
        return response()->json($comment, 201);
    }

    public function show($id)
    {
        $comment = Comment::with('post')->findOrFail($id);
        return response()->json($comment);
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->update($request->all());
        return response()->json($comment);
    }

    public function destroy($id)
    {
        Comment::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
