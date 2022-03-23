<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $articles = Article::with('category', 'tags')->take(10)->latest()->paginate(5);

        return view('pages.home', compact('articles'));
    }

    public function aboutApp(){
        return view('pages.how_to_use');
    }
}
