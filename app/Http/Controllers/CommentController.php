<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Article $article)
    {
        request()->validate([
            'comment' => 'required'
        ]);

        $article->comments()->create([
            'comment' => request('comment')
        ]);

        return back();
    }

    public function delete(Comment $comment)
    {
        $comment->delete();
        return redirect("/articles/{$comment->article->id}");
    }
}
