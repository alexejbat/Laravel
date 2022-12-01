<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {

        $categories = Category::all();

        return view('news.categories')->with('categories', $categories);
    }

    public function show($slug) {

        //TODO извлеките новости категории через отношения
        $category = Category::query()->where('slug', $slug)->first();
        $news = News::query()->where('category_id', $category->id)->get();

        return view('news.category')
            ->with('news', $news)
            ->with('category', $category->name);
    }
}
