<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Article;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // Store a new comment
    public function store(Request $request, $articleId)
    {
        $request->validate([
            'content' => 'required|string|max:500',
        ]);

        // Create a comment, using 'article_id' for the foreign key
        Comment::create([
            'content' => $request->content,
            'user_id' => auth()->id(),
            'article_id' => $articleId,
        ]);

        return redirect()->back()->with('success', 'Comment added successfully!');
    }

    // Display comments for a particular article
    public function index($articleId)
    {
        $article = Article::with('comments.user')->findOrFail($articleId);

        return view('articles.show', compact('article'));
    }

    // CommentController.php

public function update(Request $request, $id)
{
    $request->validate([
        'content' => 'required|string|max:500',
    ]);

    $comment = Comment::findOrFail($id);
    // Ensure the comment belongs to the authenticated user
    if ($comment->user_id !== auth()->id()) {
        return redirect()->back()->with('error', 'You do not have permission to update this comment.');
    }

    $comment->update([
        'content' => $request->content,
    ]);

    return redirect()->back()->with('success', 'Comment updated successfully!');
}

public function destroy($id)
{
    $comment = Comment::findOrFail($id);
    // Ensure the comment belongs to the authenticated user
    if ($comment->user_id !== auth()->id()) {
        return redirect()->back()->with('error', 'You do not have permission to delete this comment.');
    }

    $comment->delete();
    return redirect()->back()->with('success', 'Comment deleted successfully!');
}

}
