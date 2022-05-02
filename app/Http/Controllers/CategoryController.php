<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function categorize(Category $category)
    {
        return view('articles.index', [
            'articles' => $category->articles
        ]);
    }
}
