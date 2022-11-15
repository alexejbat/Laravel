<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function create(Request $request, Category $category) {

        if ($request->isMethod('post')) {
            //TODO добавить новость в хранилище, прочитать старые новости, добавить новую в конце и сохранить обратно

           // $request->flash();
            return redirect()->route('admin.create');
        }

        return view('admin.create', [
            'categories' => $category->getCategories()
        ]);
    }

    public function test1()
    {
        return response()->download('1.jpg');
    }

    public function test2(News $news)
    {
        return response()->json($news->getNews())
            ->header('Content-Disposition', 'attachment; filename = "news.txt"')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

}
