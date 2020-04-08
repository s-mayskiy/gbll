<?php

namespace App\Http\Controllers\Categories;

use App\Categories;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\News;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    public function show($categoryTxt) {

        $category = DB::table('categories')->where('categoryTxt',$categoryTxt)->first();
        return view('Categories.Category')->with("Category", $category);
        /*
        if (!is_null(Categories::getCategoryIdByCategory($categoryTxt))) {
            return view('Categories.Category')->with("Category", News::getNewsByCategoryId(Categories::getCategoryIdByCategory($categoryTxt)));
        } else {
            return redirect()->route('Categories.index');
        }
        */
    }

    public function index() {
        //return view('Categories.index')->with("Categories", Categories::getCategories());
        $categories = DB::table('categories')->get();
        return view('Categories.index')->with("Categories", $categories);
    }
}
