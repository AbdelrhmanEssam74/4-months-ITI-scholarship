<?php

namespace App\Http\Controllers;

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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:articles',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|min:150',
            'tags' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('articles', 'public');
            $validated['image'] = $imagePath;
        }

        // Add the currently authenticated user ID
        $validated['user_id'] = auth()->id();

        // Store the article
        $article = Article::create($validated);

        // Increment article count on the category
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


    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:articles,slug,' . $id,
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'content' => 'required|max:255',
            'tags' => 'nullable|string'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('articles', 'public');
            $validated['image'] = $imagePath;
        } else {
            $validated['image'] = $article->image;
        }

        $article->update($validated);

        return redirect('/articles/' . $id)->with('success', 'Article updated successfully');
    }
}
