<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableClassVsAuto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cl_vs_auto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('class_auto_id')->unsigned()->default(1);
            $table->foreign('class_auto_id')->references('id')->on('class_auto');
            $table->integer('auto_id')->unsigned()->default(1);
            $table->foreign('auto_id')->references('id')->on('auto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cl_vs_auto');
    }
}
