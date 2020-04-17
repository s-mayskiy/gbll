<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class inputFormsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */

    public function testNewsCrud_hasImportantControls()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://laravel.local/admin/news/create')
                ->assertSee('Название новости')
                ->assertSee('Категория новости')
                ->assertSee('Содержание новости')
                ->assertSee('Добавить')
            ;
        });
    }

    public function testNewsCrud_showErrors4mandatoryFields()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://laravel.local/admin/news/create')
                ->press('Добавить')
                ->assertSee('Поле Название новости обязательно для заполнения.')
                ->assertSee('Поле Содержание новости обязательно для заполнения.');
        });
    }

    public function testNewsCrud_createSingleNews()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://laravel.local/admin/news/create')
                ->type('title', 'abcdefghig')
                ->select('categoryId', 2)
                ->type('text', '1234123412341234123412341234123412341234')
                ->press('Добавить')
                ->assertSee('Новость успешно создана!')
                ->assertPathIs('/admin/news');
        });
    }

    public function testCategoriesCrud_hasImportantControls()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://laravel.local/admin/categories/create')
                ->assertSee('Название категорией латиницей (для адресации)')
                ->assertSee('Название категории кириллицей')
                ->assertSee('Добавить');
        });
    }

    public function testCategoriesCrud_showErrors4mandatoryFields()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://laravel.local/admin/categories/create')
                ->press('Добавить')
                ->assertSee('Поле Название категорией латиницей (для адресации) может содержать только буквы. Поле Название категорией латиницей (для адресации) обязательно для заполнения.')
                ->assertSee('Поле Название категории кириллицей обязательно для заполнения.');
        });
    }

    public function testCategoriesCrud_createCategory()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://laravel.local/admin/categories/create')
                ->type('categoryTxt', 'something')
                ->type('name', 'Какая-то категория')
                ->press('Добавить')
                ->assertSee("успешно создана!")
                ->assertPathIs('/admin/categories');
        });
    }


    public function testCategoriesCrud_createExistsCategory()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://laravel.local/admin/categories/create')
                ->type('categoryTxt', 'something')
                ->type('name', 'Какая-то категория')
                ->press('Добавить')
                ->assertSee("Такое значение поля Название категорией латиницей (для адресации) уже существует.");
        });
    }

    public function testDownloadNewsByCategory_hasImportantControls()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://laravel.local/admin/downloadNewsByCategory')
                ->assertSee('Категория новости')
                ->assertSee('Скачать файл с данными');
        });
    }
}


