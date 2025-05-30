<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // return articles view
    public function index()
    {
        return view('articles.index');
    }
}
