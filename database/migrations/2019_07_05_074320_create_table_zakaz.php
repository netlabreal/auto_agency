<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableZakaz extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zakaz', function (Blueprint $table){
            $table->increments('id');
            $table->string('fio');
            $table->string('tel');
            $table->string('email');
            $table->string('prim');
            $table->dateTime('datn');
            $table->dateTime('datk');
            $table->unsignedInteger('auto_id')->nullable(false);
            $table->index('auto_id', 'auto_id');
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
        Schema::dropIfExists('zakaz');
    }
}
