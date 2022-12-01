<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index()
    {
        //$news = DB::table('news')->get();
      //$news = News::where('isPrivate', false)->get();


        $news = News::query()->paginate(5);


        return view('news.index')->with('news', $news);
    }

    public function show(News $news)
    {
       // $news = DB::table('news')->find($id);
       // $news = News::query()->find($id);

        return view('news.one')->with('news', $news);
    }
}
