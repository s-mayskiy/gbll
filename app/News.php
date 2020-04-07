<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class News
{
    private static $news = [
        1 => [
            'id' => 1,
            'categoryId' => 1,
            'title' => 'Новость про футбол',
            'text' => 'Футбола у нас больше нет :('
        ],
        2 => [
            'id' => 2,
            'categoryId' => 1,
            'title' => 'Новость про академическую греблю',
            'text' => 'Скоро открытие сезона!'
        ],
        3 => [
            'id' => 3,
            'categoryId' => 1,
            'title' => 'Новость про бокс',
            'text' => 'Рой Джонс возвращается!'
        ],

        4 => [
            'id' => 4,
            'categoryId' => 2,
            'title' => 'Новость про Гондурас',
            'text' => 'В Гондурасе прходят выборы президента.'
        ],
        5 => [
            'id' => 5,
            'categoryId' => 2,
            'title' => 'Новость про ООН',
            'text' => 'ООН приняла решение перенести штаб-квартиру в Гондурас.'
        ],
        6 => [
            'id' => 6,
            'categoryId' => 3,
            'title' => 'Новость про NASA',
            'text' => 'NASA забыла астронавта на Марсе.'
        ],
    ];

    public static function getNews() {
        return static::$news;
    }

    public static function getSingleNews($id) {
        return static::$news[$id];
    }

    public static function getSingleNews4page($id) {
        return [
                'category' => Categories::getCategory(static::$news[$id]['categoryId']),
                'singleNews' => static::$news[$id]
                ];
    }


    public static function getNewsByCategoryId ($categoryId)
    {
        $newsOfCategory = [];
        foreach (static::$news as $singleNews) {
            if ($singleNews['categoryId'] == $categoryId) {
                $newsOfCategory[] = $singleNews;
            }
        }
        return ['name' => Categories::getCategory($categoryId)["name"], 'news' => $newsOfCategory];
    }
}
