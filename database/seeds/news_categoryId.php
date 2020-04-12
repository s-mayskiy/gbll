<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class news_categoryId extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoriesCount = DB::table('categories')->count();
        DB::update("update news set categoryId =FLOOR(RAND()*($categoriesCount)) + 1");
    }
}
