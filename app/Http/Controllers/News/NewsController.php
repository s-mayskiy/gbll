<?php

namespace App\Http\Controllers\News;
use App\News;
use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index() {
        //return view('News.index')->with("News", News::getNews());
        $news = DB::table('news')->get();
        return view('News.index')->with('News', $news);
    }

    public function show($id) {

        $news = DB::table('news')->find($id);
        return view('News.show')->with('SingleNews', $news);
        /*
        if (array_key_exists($id, News::getNews())) {
            return view('News.show')->with("SingleNews", News::getSingleNews4Page($id));
        } else {
            return redirect()->route('News.index');
        }
        */
    }

}
