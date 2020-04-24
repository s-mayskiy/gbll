<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Categories;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::query()
            ->paginate(10);

        return view('admin.categories')->with('Categories', $categories );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Categories();
        return view('admin.categoryCRUD')->with('Category', $category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Categories();

        $this->validate($request, Categories::getValidationRules(), [], Categories::customAttributes());

        $category->fill($request->all());
        $category->save();

        return redirect()->route('admin.categories.index')->with('success', "Категория <$category->name> успешно создана!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Переходим из админки к обычному просмотру

        $category = Categories::query()->find($id);

        return redirect()->route("Categories.show", ['categoryTxt' => $category->categoryTxt])->with( 'success', 'Перешли к просмотру через пользовательский функционал!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Categories::query()->find($id);
        return view('admin.categoryCRUD')->with('Category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, Categories::getValidationRules(), [], Categories::customAttributes());

        $category = Categories::query()->find($id);

        $category->fill($request->all());
        $category->save();

        return redirect()->route('admin.categories.index')->with('success', "Категория <$category->name> успешно изменена!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Categories::query()->find($id);

        if ($category->news()->count() > 0)
        {
            return redirect()->route('admin.categories.index')->with('danger', 'По даннокй категории есть новости, её невозможно удалить! Сналача отвяжите все новости от этой категории или удалите их.');
        }

        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', "Категория <$category->name> успешно удалена!");
    }
}
