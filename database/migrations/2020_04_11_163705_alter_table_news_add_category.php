<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AlterTableNewsAddCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->unsignedBigInteger('categoryId')->default(1);
            $table->foreign('categoryId')
                ->references('id')
                ->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Пришлось в тестах вручную дропать таблицу, т.к. SQLite не поддерживает дроп ключа и не может выполнить этот метод. В конце тестов лезла следующая ошибка:
        //SQLite doesn't support dropping foreign keys (you would need to re-create the table).
        if (Schema::hasTable('news')) {
            Schema::table('news', function (Blueprint $table) {
                $table->dropForeign(['categoryId']);
                $table->dropColumn(['categoryId']);
            });
        }
    }
}
