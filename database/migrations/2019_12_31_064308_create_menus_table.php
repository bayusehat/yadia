<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->bigIncrements('menuId');
            $table->string('menuName');
            $table->string('menuUrl');
            $table->integer('menuParent');
            $table->string('menuUrlActive');
            $table->string('menuParentActive');
            $table->string('menuIcon');
            $table->datetime('menuCreate');
            $table->datetime('menuUpdate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
