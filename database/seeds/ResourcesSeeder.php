<?php

use Illuminate\Database\Seeder;

class ResourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resources')->insert(
            [
                [ 'URI' => 'https://lenta.ru/rss/news'],
                [ 'URI' => 'https://news.yandex.ru/auto.rss'],
                [ 'URI' => 'https://news.yandex.ru/auto_racing.rss'],
                [ 'URI' => 'https://news.yandex.ru/army.rss'],
                [ 'URI' => 'https://news.yandex.ru/gadgets.rss'],
                [ 'URI' => 'https://news.yandex.ru/index.rss'],
                [ 'URI' => 'https://news.yandex.ru/martial_arts.rss'],
                [ 'URI' => 'https://news.yandex.ru/communal.rss'],
                [ 'URI' => 'https://news.yandex.ru/health.rss'],
                [ 'URI' => 'https://news.yandex.ru/games.rss'],
                [ 'URI' => 'https://news.yandex.ru/internet.rss'],
                [ 'URI' => 'https://news.yandex.ru/cyber_sport.rss'],
                [ 'URI' => 'https://news.yandex.ru/movies.rss'],
                [ 'URI' => 'https://news.yandex.ru/cosmos.rss'],
                [ 'URI' => 'https://news.yandex.ru/culture.rss'],
                [ 'URI' => 'https://news.yandex.ru/fire.rss'],
                [ 'URI' => 'https://news.yandex.ru/championsleague.rss'],
                [ 'URI' => 'https://news.yandex.ru/music.rss'],
                [ 'URI' => 'https://news.yandex.ru/nhl.rss'],
            ]);
    }
}
