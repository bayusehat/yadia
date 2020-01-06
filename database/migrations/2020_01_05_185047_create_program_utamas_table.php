<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramUtamasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_utamas', function (Blueprint $table) {
            $table->bigIncrements('programUtamaId');
            $table->string('programUtamaTitle');
            $table->string('programUtamaIcon');
            $table->text('programUtamContent');
            $table->datetime('programUtamaCreate');
            $table->datetime('programUtamaUpdate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('program_utamas');
    }
}
