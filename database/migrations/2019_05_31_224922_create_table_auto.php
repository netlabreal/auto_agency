<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAuto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!DB::select("SHOW TABLES LIKE 'auto'")) {
        }
        else{
            Schema::dropIfExists('auto');
        }
        Schema::create('auto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('mosh');
            $table->unsignedInteger('class_auto_id')->nullable(false);
            $table->string('korobka')->nullable(false);
            $table->string('type_rule')->nullable(false);
            $table->float('v');
            $table->float('cena');
            $table->text('opisanie');
            $table->string('preview');

            $table->index('class_auto_id', 'class_id');
            $table->timestamps();
        });
        DB::statement("INSERT INTO `auto` (`id`, `name`, `mosh`, `class_auto_id`, `korobka`, `type_rule`, `v`, `cena`, `opisanie`, `preview`)
        VALUES 
        (1, 'Toyota Vitz 2009 Хэчбек', 87, 1, 1, 1, 1.3, 1800, 'Вторая генерация ', ''),
        (2, 'Toyota Vitz 2009 Хэчбек', 87, 1, 1, 1, 1.3, 2100, 'Вторая генерация ', '');
            
        ");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auto');
    }
}
