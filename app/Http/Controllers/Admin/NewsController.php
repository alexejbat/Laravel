<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsRequest;
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

    public function create()
    {
//crud

        $news = new News();

        return view('admin.create', [
            'news' => $news,
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $tableNameCategory = (new Category())->getTable();

        $this->validate($request, [
            'title' => 'required|min:3|max:20',
            'text' => 'required|min:3',
            'isPrivate' => 'sometimes|in:1',
            'category_id' => "required|exists:{$tableNameCategory},id"
        ], [], [
            'title' => 'Заголовок новости',
            'text' => 'Текст новости',
            'category_id' => "Категория новости"
        ]);

        // DB::table('news')->insert($data);
        $news = new News();
        $news->fill($request->all());
        $news->save();

        // $request->flash();
        return redirect()->route('admin.news.create')->with('success', 'Новость успешно добавлена!');
    }

    public function edit(News $news) {
        return view('admin.create', [
            'news' => $news,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, News $news) {

        $tableNameCategory = (new Category())->getTable();
        $this->validate($request, [
            'title' => 'required|min:3|max:20',
            'text' => 'required|min:3',
            'isPrivate' => 'sometimes|in:1',
            'category_id' => "required|exists:{$tableNameCategory},id"
        ], [], [
            'title' => 'Заголовок новости',
            'text' => 'Текст новости',
            'category_id' => "Категория новости"
        ]);

        $news->fill($request->all());
        $news->isPrivate = isset($request->isPrivate);
        $result = $news->save();
        if ($result) {
            return redirect()->route('admin.news.index')->with('success', 'Новость изменена успешно!');
        } else {
            return redirect()->route('admin.news.index')->with('error', 'Ошибка изменения новости');
        }

    }

    public function destroy(News $news) {
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'Новость удалена успешно!');
    }
}
