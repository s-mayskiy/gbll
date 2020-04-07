<?php

namespace App\Http\Controllers\Categories;

use App\Categories;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\News;

class CategoriesController extends Controller
{
    public function show($categoryTxt) {
        if (!is_null(Categories::getCategoryIdByCategory($categoryTxt))) {
            return view('Categories.Category')->with("Category", News::getNewsByCategoryId(Categories::getCategoryIdByCategory($categoryTxt)));
        } else {
            return redirect()->route('Categories.index');
        }
    }

    public function index() {
        return view('Categories.index')->with("Categories", Categories::getCategories());
    }
}
