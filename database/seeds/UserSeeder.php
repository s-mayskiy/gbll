<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert(
            [
                [// Создаём админа
                    'id' => 1,
                    'name' => 'Админ',
                    'email' => 'admin@admin.ru',
                    'email_verified_at' => now(),
                    'password' => Hash::make('123'),
                    'remember_token' => Str::random(10),
                    'isAdmin' => true
                ],
                [// Создаём пользователя: не админа с фиксированным логином и паролем.
                    'id' => 2,
                    'name' => 'НеАдмин',
                    'email' => '1@1.ru',
                    'email_verified_at' => now(),
                    'password' => Hash::make('123'),
                    'remember_token' => Str::random(10),
                    'isAdmin' => true
                ],
            ]);

        // Создаём подопытных пользователей
        factory(App\User::class, 5)->create();
    }
}
