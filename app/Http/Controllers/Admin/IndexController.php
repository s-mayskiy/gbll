<?php

namespace App\Http\Controllers\Admin;

use App\Categories;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use App\Http\Controllers\News\NewsController;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function create(Request $request)
    {
        if ($request->isMethod("POST")) {

            $url = null;
            //dd($request);
            if ($request->image) {
                $path = Storage::putFile('public/images', $request->image);
                $url = Storage::url($path);
            }


            News::createSingleNews( [
                'title' => $request->title,
                //'categoryId' => $request->category,
                'text' => $request->text,
                'image' => $url,
                'premium' => isset($request->premium),
            ]
            );

            return redirect()->route('admin.index')->with('success', 'Новость "'.$request->title.'" добавлена!');
        }
        return view('admin.create', [
            "categories" => Categories::getCategories()
        ]);
    }

    public function downloadNewsByCategory( Request $request ){

        if ($request->isMethod("POST")) {

            $categories = (new Categories())->getTable();
            $this->validate($request, ['category' => "required|exists:{$categories},id"], [], Categories::customAttributes());

            $category = Categories::query()->find($request->category);
            return response()->json($category->news()->get()->toArray())
                ->header('Content-Disposition', 'attachment; filename = "' . $category->name . '.json.txt"')
                ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_NUMERIC_CHECK);
        }

        return view('admin.downloadNewsByCategory', [
            "categories" => Categories::all()
        ]);
    }

    public function addImage(Request $request, $id) {
        if ($request && $request->isMethod("POST")) {
            $url = null;
            if ($request->image) {
                $path = Storage::putFile('public/images', $request->image);
                $url = Storage::url($path);
            }

            DB::table('news')->where('id', $id)->update(['image' => $url]);

            $NewsController = new NewsController();
            return $NewsController->show($id);
        }
        return view('admin.addImage')->with('id', $id);
    }
}
