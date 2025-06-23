<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    public function index()
    {
        $categories = Category::with('user')->orderBy('created_at', 'DESC')->paginate(6);
        $tags = Article::all()->pluck('tags')->toArray();
        $allTags = [];
        foreach ($tags as $tagString) {
            $tagArray = array_map('trim', explode('|', $tagString));
            $allTags = array_merge($allTags, $tagArray);
        }
        $uniqueTags = array_unique($allTags);
        // get the category author name by author_id from users table
        return view('categories.index', [
            'categories' => $categories,
            'tags' => $uniqueTags,
        ]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
            $validated['image'] = $imagePath;
        }
        $validated['author_id'] = auth()->id();
        Category::create($validated);
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }


    public function show(Category $category)
    {
        $relatedArticles = $category->articles()->latest()->take(3)->get();
        return view('categories.show', compact('category', 'relatedArticles'));
    }

    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, string $id)
    {
        $category = Category::findOrFail($id);
        $validated = $request->validated();
        if ($request->hasFile('image')) {
            if ($category->image && Storage::disk('public')->exists($category->image)) {
                Storage::disk('public')->delete($category->image);
            }
            $imagePath = $request->file('image')->store('categories', 'public');
            $validated['image'] = $imagePath;
        }
        $category->update($validated);
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        // Delete image from storage if it exists
        if ($category->image && Storage::disk('public')->exists($category->image)) {
            Storage::disk('public')->delete($category->image);
        }

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
