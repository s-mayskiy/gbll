<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class News
{
    private static $news = [
        1 => [
            'id' => 1,
            'categoryId' => 1,
            'title' => 'Новость про футбол',
            'text' => 'Футбола у нас больше нет :(',
            'premium' => 0,
        ],
        2 => [
            'id' => 2,
            'categoryId' => 1,
            'title' => 'Новость про академическую греблю',
            'text' => 'Скоро открытие сезона!',
            'premium' => 0,
        ],
        3 => [
            'id' => 3,
            'categoryId' => 1,
            'title' => 'Новость про бокс',
            'text' => 'Рой Джонс возвращается!',
            'premium' => 0,
        ],

        4 => [
            'id' => 4,
            'categoryId' => 2,
            'title' => 'Новость про Гондурас',
            'text' => 'В Гондурасе прходят выборы президента.',
            'premium' => 0,
        ],
        5 => [
            'id' => 5,
            'categoryId' => 2,
            'title' => 'Новость про ООН',
            'text' => 'ООН приняла решение перенести штаб-квартиру в Гондурас.',
            'premium' => 0,
        ],
        6 => [
            'id' => 6,
            'categoryId' => 3,
            'title' => 'Новость про NASA',
            'text' => 'NASA забыла астронавта на Марсе.',
            'premium' => 0,
        ],
    ];

    public static function getNewsFromClass() {
        return static::$news;
    }

    public static function getNews() {
        return json_decode(File::get(storage_path(). '/news.json'), true);
    }

    public static function getSingleNews($id) {
        return static::getNews()[$id];
    }

    public static function getSingleNews4page($id) {
        return [
                'category' => Categories::getCategory(static::getNews()[$id]['categoryId']),
                'singleNews' => static::getNews()[$id]
                ];
    }


    public static function getNewsByCategoryId ($categoryId)
    {
        $newsOfCategory = [];
        foreach (static::getNews() as $singleNews) {
            if ($singleNews['categoryId'] == $categoryId) {
                $newsOfCategory += [$singleNews['id'] => $singleNews];
            }
        }
        return ['name' => Categories::getCategory($categoryId)["name"], 'news' => $newsOfCategory];
    }

    public static function createSingleNews ($formData) {
        $data = News::getNews();
        $data[] = $formData;
        $id = array_key_last($data);
        $data[$id]['id'] = $id;

        File::put(storage_path() . "/news.json", json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_NUMERIC_CHECK));
    }
}
