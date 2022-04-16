<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index($name)
    {
        $cat = Category::where('slug', $name)->first();
        $newsArticles = [];
        return view('client.categories.index', compact(['newsArticles', 'cat']));
    }
}
