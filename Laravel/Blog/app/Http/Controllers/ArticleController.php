<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $articles = Article::with('category')->orderBy('created_at', 'DESC')->paginate(9);
        $categories = Category::all();
        $allTags = Article::pluck('tags')
            ->flatMap(function ($tagString) {
                return explode(',', $tagString);
            })
            ->map(fn($tag) => trim($tag))
            ->unique()
            ->values();

        return view('articles.index', [
            'articles' => $articles,
            'categories' => $categories,
            'tags' => $allTags,
        ]);
    }


    public function show($slug)
    {
        $article = Article::with(['category', 'user', 'comments.user'])->where('slug', $slug)->firstOrFail();
        return view('articles.article', ['article' => $article]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('articles.create', ['categories' => $categories]);
    }

    public function store(StoreArticleRequest $request)
    {
        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('articles', 'public');
        }
        $validated['user_id'] = auth()->id();
        $article = Article::create($validated);
        Category::where('id', $article->category_id)->increment('number_of_articles');
        return redirect('/articles')->with('success', 'Article created successfully');
    }



    public function delete($id)
    {
        $article = Article::findOrFail($id);

        if (auth()->id() !== $article->user_id) {
            abort(403, 'Unauthorized action.');
        }

        Category::where('id', $article->category_id)->decrement('number_of_articles');
        $article->delete();

        return redirect('/articles')->with('success', 'Article Deleted Successfully');
    }


    public function edit($id)
    {
        $article = Article::findOrFail($id);

        if (auth()->id() !== $article->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $categories = Category::all();
        return view('articles.edit', compact('article', 'categories'));
    }


    public function update(UpdateArticleRequest $request, Article $article)
    {
        $data = $request->only(['title', 'slug', 'content', 'tags']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('articles', 'public');
        }

        $article->update($data);

        return redirect('/articles/' . $article->slug)->with('success', 'Article updated successfully');
    }


}
