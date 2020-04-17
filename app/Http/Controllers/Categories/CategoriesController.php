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

        $category = Categories::query()->where(['categoryTxt' => $categoryTxt])->first();
        return view('Categories.Category')->with(["Category" => $category,
                                                        'CategoryNews' =>$category->news()->get()
                                                        ]);
    }

    public function index() {
        $categories = Categories::query()
            ->paginate(2);

        return view('Categories.index')->with("Categories", $categories);
    }
}
