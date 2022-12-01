<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index()
    {
        $news = DB::table('news')->get();

        return view('news.index')->with('news', $news);
    }

    public function show($id)
    {
        $news = DB::table('news')->find($id);

        return view('news.one')->with('news', $news);
    }
}
