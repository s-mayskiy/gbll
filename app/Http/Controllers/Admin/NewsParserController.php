<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;
use App\News;
use App\Categories;

class NewsParserController extends Controller
{
    public function index()
    {
        $successNewsCounter = 0;
        $successCategoryCounter = 0;
        $xml = XmlParser::load('https://news.rambler.ru/rss/photo/');

        $data = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'image' => ['uses' => 'channel.image.url'],
            'news' => ['uses' => 'channel.item[title,link,guid,category,description,pubDate]']
        ]);

        foreach ($data['news'] as $singleNews) {
            if (News::query()->where(['guid' => $singleNews['guid']])->first()) {
                continue;
            }

            $categoryTxt = explode('/', $singleNews['link'])[3];

            $category = Categories::query()->where(['categoryTxt'=>$categoryTxt])->first();
            if (!$category)
            {
                $category = new Categories();
                $category->fill(['categoryTxt' => $categoryTxt,
                                'name' => $singleNews['category'],
                                    ]);
                $category->save();
                $successCategoryCounter++;
            }

            $news = new News();
            $news->fill([
                        'title' => $singleNews['title'],
                        'text' => $singleNews['description'],
                        'guid' => $singleNews['guid'],
                        'externalLink' => $singleNews['link'],
                        'categoryId' => $category->id,
                    ]);

            $news->save();
            $successNewsCounter++;
        }

        return redirect(route('admin.news.index'))->with('success', "Импортировано категорий: $successCategoryCounter, новостей: $successNewsCounter.");
    }
}
