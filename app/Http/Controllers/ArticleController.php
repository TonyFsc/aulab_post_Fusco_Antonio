<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    
    public function __construct(){
        $this->middleware('auth')->except('index', 'show');
    }


    public function byCategory(){

        $article = $category->articles->sortByDesc('create_at');
        return view('article.by-category', compact('category','article'));
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $article = Article::orderBy('created_at', 'desc')->get();
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       

        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){

        $request->validate([
            'title' => 'required|unique:articles|min:5',
            'subtitle' => 'required|unique:articles|min:5',
            'body' => 'required|min:10',
            'image' => 'image|required',
            'category' => 'required',
    
        ]);
    
        Article::create([
    
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'body'  => $request->body,
            'image' => $request->file('image')->store('public/images'),
            'category_id' => $request->category,
            'user_id' => Auth::user()->id,
        ]);
    
        return redirect(route('homepage'))->whit('message', 'Articolo creato correttamente');
    }
    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
      return view ('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
