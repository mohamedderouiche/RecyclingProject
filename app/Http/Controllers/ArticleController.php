<?php


namespace App\Http\Controllers;


use App\Models\Article;
use Illuminate\Http\Request;


class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }


    public function create()
    {
        return view('articles.create');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'contenu' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);


        // Handle image upload if present
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validatedData['image'] = $imagePath;
        }


        Article::create($validatedData);


        return redirect()->route('articles.index')->with('success', 'Article created successfully.');
    }


    public function show(Article $article)
    {
        return view('articles.frontdetails', compact('article'));
    }

    public function showback(Article $article)
    {
        return view('articles.showback', compact('article'));
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    // Update the specified article
    public function update(Request $request, Article $article)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'contenu' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
    
        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validatedData['image'] = $imagePath; // Add image path to validated data
        }
    
        // Update the article with the validated data
        $article->update($validatedData);
    
        // Redirect back to the article index page with a success message
        return redirect()->route('articles.index')->with('success', 'Article updated successfully.');
    }
    
    
    
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article deleted successfully.');
    }


    // Fetch and display articles in 'articles.article' view
    public function indexarticle()
    {
        $articles = Article::all(); // Fetch articles from the database
        return view('articles.article', compact('articles')); // Pass the articles to the view
    }
}


