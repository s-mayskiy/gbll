<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

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

    public static function getCategories() {
        return static::$categories;
    }

    public static function getCategoryIdByName($name) {
        $id = null;
        foreach (static::$categories as $category) {
            if ($category['name'] == $name) {
                $id = $category['id'];
                break;
            }
        }
        return $id;
    }

    public static function getCategory($id) {
        return static::$categories[$id];
    }

    public static function getCategoryIdByCategory ($categoryTxt) {
        $id = null;
        foreach (static::$categories as $category) {
            if ($category['categoryTxt'] == $categoryTxt) {
                $id = $category['id'];
                break;
            }
        }

        return $id;
    }
}
