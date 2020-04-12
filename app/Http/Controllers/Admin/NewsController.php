<?php

namespace App\Http\Controllers\Admin;

use App\Categories;
use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::query()
            ->paginate(4);

        return view('admin.news')->with('News', $news );
    }

    public function create(Request $request)
    {
        $news = new News ();

        if ($request->isMethod('post')) {

            $this->createOrUpdate($request);

            return redirect()->route('admin.news.index')->with('success', 'Новость успешно создана!');
        }

        return view('admin.create', [
            'categories' => Categories::all(),
            'news' => $news
        ]);
    }

    public function edit(News $news = Null)
    {
        $categories = Categories::all();
        return view('admin.create')->with(['news' => $news,
            'categories' => $categories,
        ]);
    }

    public function update(News $news, Request $request)
    {
        $this->createOrUpdate($request, $news);

        return redirect()->route('admin.news.index')->with('success', 'Новость успешно изменена!');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'Новость успешно удалена!');
    }

    private function createOrUpdate (Request $request, News $news = null) {
        $url = null;

        if (!$news) {
            $news = new News();
        }
        $news->fill($request->all());

        if ($request->file('image')) {
            $path = Storage::putFile('public/images', $request->file('image'));
            $url = Storage::url($path);
            $news->image = $url;
        }

        $news->save();
    }

}
