<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Comment;

use PDF;

class ArticleController extends Controller
{
    /**
     * Display a listing of all articles.
     */
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }
    /**
     * Show the form for creating a new article.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created article in the database.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'contenu' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'pdf' => 'nullable|mimes:pdf|max:10000', // Validation for PDF
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Handle PDF upload
        if ($request->hasFile('pdf')) {
            $pdfPath = $request->file('pdf')->store('pdfs', 'public');
            $validatedData['pdf'] = $pdfPath;
        }

        // Create and store the new article
        Article::create($validatedData);

        // Redirect with success message
        return redirect()->route('articles.index')->with('success', 'Article created successfully.');
    }

    /**
     * Show the form for editing the specified article.
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified article in the database.
     */
    public function update(Request $request, Article $article)
    {
        // Validate the request
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'contenu' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'pdf' => 'nullable|mimes:pdf|max:10000', // Validation for PDF
        ]);

        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Handle PDF upload if a new PDF is provided
        if ($request->hasFile('pdf')) {
            $pdfPath = $request->file('pdf')->store('pdfs', 'public');
            $validatedData['pdf'] = $pdfPath;
        }

        // Update the article with the new data
        $article->update($validatedData);

        // Redirect with success message
        return redirect()->route('articles.index')->with('success', 'Article updated successfully.');
    }
   /**
     * Download the article's PDF file.
     */
    public function downloadArticlePDF(Article $article)
    {
        // Load the view and pass the article data
        $pdf = PDF::loadView('articles.pdfdetails', compact('article'));

        // Return the PDF as a download
        return $pdf->download('article-' . $article->title . '.pdf');
    }
    /**
     * Display the specified article on the front-end.
     */
    public function show(Article $article)
    {
        // Use 'article_id' as the foreign key to fetch comments
        $comments = Comment::where('article_id', $article->id)->get();

        // Return the view with both article and comments
        return view('articles.frontdetails', compact('article', 'comments'));
    }


    /**
     * Display the specified article on the back-end (admin view).
     */
    public function showback(Article $article)
    {
        return view('articles.showback', compact('article'));
    }

    /**
     * Display a listing of articles in the public section.
     */
    public function indexarticle()
    {
        $articles = Article::all();
        return view('articles.article', compact('articles'));
    }

    /**
 * Remove the specified article from the database.
 */
public function destroy(Article $article)
{
    // Delete the article's image and PDF files if they exist
    if ($article->image && \Storage::exists('public/' . $article->image)) {
        \Storage::delete('public/' . $article->image);
    }

    if ($article->pdf && \Storage::exists('public/' . $article->pdf)) {
        \Storage::delete('public/' . $article->pdf);
    }

    // Delete the article from the database
    $article->delete();

    // Redirect with success message
    return redirect()->route('articles.index')->with('success', 'Article deleted successfully.');
}
}
