<?php

use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    private function getData(): array
    {
        $faker = Faker\Factory::create('ru_RU');

        $data = [];

        for ($i = 0; $i < 7; $i++) {
            $data[] = [
                'title' => $faker->realText(rand(10,70)),
                'text' => $faker->realText(rand(200,5000)),
            ];
        }
        return $data;
    }
}
