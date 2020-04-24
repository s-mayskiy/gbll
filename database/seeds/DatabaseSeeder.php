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
        //$this->call(CategoriesSeeder::class);
        //$this->call(NewsSeeder::class); Убрал сидинг новостей, чтобы проще было проверять функциолнал их загрузки из RSS-ленты
        $this->call(UserSeeder::class);
        $this->call(ResourcesSeeder::class);
    }
}
