<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            [
                [
                    'categoryTxt' => 'sport',
                    'name' => 'Спорт',
                ],
                [
                    'categoryTxt' => 'politics',
                    'name' => 'Политика',
                ],
                [
                    'categoryTxt' => 'space',
                    'name' => 'Космос',
                ],
                [
                    'categoryTxt' => 'culture',
                    'name' => 'Культура',
                ],
                [
                    'categoryTxt' => 'science',
                    'name' => 'Наука',
                ],
            ]
        );
    }
}
