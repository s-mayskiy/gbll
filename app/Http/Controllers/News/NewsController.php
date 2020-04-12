<?php

namespace App\Http\Controllers\News;
use App\News;
use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index() {
        $news = News::query()
            ->paginate(4);

        return view('News.index')->with('News', $news);
    }

    public function show(News $news) {
        return view('News.show')->with('SingleNews', $news);
    }

}
