<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::with(['category', 'comments.user'])
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($article) {
                return [
                    'id' => $article->id,
                    'title' => $article->title,
                    'slug' => $article->slug,
                    'content' => $article->content,
                    'image' => $article->image,
                    'tags' => $article->tags_array,
                    'category' => $article->category,
                    'comments' => $article->comments,
                    'created_at' => $article->created_at,
                    'updated_at' => $article->updated_at,
                ];
            });

        return response()->json([
            'articles' => $articles
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $data = $request->validated();
//        if ($request->hasFile('image')) {
//            $validated['image'] = $request->file('image')->store('articles', 'public');
//        }
        $data['user_id'] = auth()->id();
//        $validated['user_id'] = auth()->id();
        $article = Article::create($data);
        Category::where('id', $article->category_id)->increment('number_of_articles');
        return response()->json([
            'message' => 'Article created successfully',
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
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $data = $request->only(['title', 'slug', 'content', 'tags']);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('articles', 'public');
        }
        $article->update($data);
//        if ($request->hasFile('image')) {
//            $validated['image'] = $request->file('image')->store('articles', 'public');
//        }
        return response()->json([
            'message' => 'Article updated successfully.',
            'article' => $article
        ], 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
