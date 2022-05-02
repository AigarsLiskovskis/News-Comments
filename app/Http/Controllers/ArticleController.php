<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Validation\Rule;

class ArticleController extends Controller
{
    public function index()
    {
        return view('articles.index', [
            'articles' => Article::latest()->get()
        ]);
    }

    public function show(Article $article)
    {
        return view('articles.show', [
            'article' => $article
        ]);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);

        $attributes['user_id'] = auth()->id();

        Article::create($attributes);

        return redirect('/');
    }

    public function edit(Article $article)
    {
        return view('articles.edit', [
            'article' => $article
        ]);
    }

    public function update(Article $article)
    {
        $attributes = request()->validate([
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);

        $attributes['user_id'] = auth()->id();

        $article->update($attributes);

        return redirect("/articles/{$article->id}");
    }

    public function delete(Article $article)
    {
        $article->delete();
        return redirect('/');
    }
}
