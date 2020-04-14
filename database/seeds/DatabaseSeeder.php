<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesSeeder::class);
        //$this->call(NewsSeeder::class);
        //$this->call(news_categoryId::class);
        //Заменил сидинг новостей на фабирку
        factory(App\News::class, 20)->create();
    }
}
