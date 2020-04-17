<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = ['categoryTxt', 'name'];

    public function news() {
        return $this->hasMany(News::class, 'categoryId');
    }


    public static function getValidationRules () {

        return [
            'categoryTxt' => 'alpha|required|min:5|max:70|regex:/(^([a-zA-Z]+)(\d+)?$)/u|unique:categories,categoryTxt',
            'name' => 'required|min:3|max:50',
        ];

    }
    public static function customAttributes () {
        return [
            'categoryTxt' => 'Название категорией латиницей (для адресации)',
            'name' => 'Название категории кириллицей',
        ];
    }
}
