<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categories;

class News extends Model
{
    protected $fillable = ['title', 'text', 'premium', 'categoryId'];

    public function category() {
        return $this->belongsTo(Categories::class, 'categoryId')->first();
    }

    public static function getValidationRules () {
        $categories = (new Categories())->getTable();

        return [
            'title' => 'required|max:70',
            'text' => 'required|min:30|max:5000',
            'categoryId' => "required|exists:{$categories},id",
            'image' => 'mimes:jpeg,png,gif,tif,bmp|max:5000',
            'premium' => 'in:0,1',
        ];

    }
    public static function customAttributes () {
        return [
            'title' => 'Название новости',
            'text' => 'Содержание новости',
            'categoryId' =>'Категория новости',
            'premium' => 'Новость для премиум доступа',
            'image' => 'Файл'
        ];
    }

}
