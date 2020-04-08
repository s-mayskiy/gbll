<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\File;

class Categories
{
    private static $categories = [
        1 => [
            'id' => 1,
            'categoryTxt' => 'sport',
            'name' => 'Спорт',
        ],
        2 => [
            'id' => 2,
            'categoryTxt' => 'politics',
            'name' => 'Политика',
        ],

        3 => [
            'id' => 3,
            'categoryTxt' => 'space',
            'name' => 'Космос',
        ],
    ];

    public static function getCategoriesFromClass() {
        return static::$categories;
    }

    public static function getCategories() {
        return json_decode(File::get(storage_path(). '/categories.json'), true);
    }

    public static function getCategoryIdByName($name) {
        $id = null;
        foreach (static::getCategories() as $category) {
            if ($category['name'] == $name) {
                $id = $category['id'];
                break;
            }
        }
        return $id;
    }

    public static function getCategory($id) {
        return static::getCategories()[$id];
    }

    public static function getCategoryIdByCategory ($categoryTxt) {
        $id = null;
        foreach (static::getCategories() as $category) {
            if ($category['categoryTxt'] == $categoryTxt) {
                $id = $category['id'];
                break;
            }
        }

        return $id;
    }
}
