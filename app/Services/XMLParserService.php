<?php


namespace App\Services;
use App\Categories;
use App\News;
use App\Resources;
use Illuminate\Support\Facades\Storage;
use Orchestra\Parser\Xml\Facade as XmlParser;

class XMLParserService
{
    public function getAndSaveNews($rssLink)
    {
        $successNewsCounter = 0;
        $successCategoryCounter = 0;
        $xml = XmlParser::load($rssLink);

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

            $categoryTxt = str_slug($singleNews['category'] ? $singleNews['category'] : $data['title']);

            $category = Categories::query()->where(['categoryTxt'=>$categoryTxt])->first();
            if (!$category)
            {
                $category = new Categories();
                $category->fill(['categoryTxt' => $categoryTxt,
                    'name' => ($singleNews['category'] ? $singleNews['category'] : $data['title']),
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
        $fileName = sprintf('Logs%s.txt', time().random_int(0,10000));
        Storage::disk('publicLogs')->put($fileName, $rssLink." categories_added $successCategoryCounter news_added $successNewsCounter ". date('c') . '\n');
    }
}
