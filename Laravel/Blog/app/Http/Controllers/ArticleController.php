<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', ['articles' => $articles]);
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.article', ['article' => $article]);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store()
    {
        $article = new Article();
        $article->title = request()->title;
        $article->slug = request()->slug;
        $article->image = request()->image;
        $article->content = request()->content;
        $article->save();
        return redirect('/articles');
    }

    public function delete($id)
    {
        $article = Article::findorfail($id);
        $article->delete();
        return redirect('/articles');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit', ['article' => $article]);
    }

    public function update($id)
    {
        $article = Article::findOrFail($id);
        $article->title = request()->title;
        $article->slug = request()->slug;
        $article->image = request()->image;
        $article->content = request()->content;
        $article->save();

        return redirect('/articles');
    }
}
