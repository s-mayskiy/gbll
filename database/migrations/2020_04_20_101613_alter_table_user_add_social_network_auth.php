<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableUserAddSocialNetworkAuth extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('avatar')->nullable()->comment('аватар');
            $table->enum('type_auth', ['site', 'vk', 'github'])->default('site')->comment('Тип авторизации');
            $table->string('idInSNW',20)
                ->default('')
                ->comment('id в соцсети');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('avatar');
            $table->dropColumn('type_auth');
            $table->dropColumn('idInSNW');
        });
    }
}
