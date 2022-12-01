<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::query()->paginate(5);

        return view('admin.index')->with('news', $news);
    }

    public function create(Request $request)
    {
//crud
        $news = new News();

        if ($request->isMethod('post')) {



            // DB::table('news')->insert($data);

            $news->fill($request->all());
            $news->save();

            // $request->flash();
            return redirect()->route('admin.create')->with('success', 'Новость успешно добавлена!');
        }



        return view('admin.create', [
            'news' => $news,
            'categories' => Category::all()
        ]);
    }

    public function store(News $news)
    {

    }

    public function edit(News $news) {
        return view('admin.create', [
            'news' => $news,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, News $news) {

        $news->fill($request->all());
        $news->isPrivate = isset($request->isPrivate);
        $news->save();
        return redirect()->route('admin.index')->with('success', 'Новость изменена успешно!');
    }

    public function destroy(News $news) {
        $news->delete();
        return redirect()->route('admin.index')->with('success', 'Новость удалена успешно!');
    }
}
