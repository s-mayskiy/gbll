<?php

namespace App\Http\Controllers\News;

use App\News;
use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {
        return view('News.index')->with("News", News::getNews());
    }

    public function show($id) {
        if (array_key_exists($id, News::getNews())) {
            return view('News.show')->with("SingleNews", News::getSingleNews4Page($id));
        } else {
            return redirect()->route('News.index');
        }

    }

}
