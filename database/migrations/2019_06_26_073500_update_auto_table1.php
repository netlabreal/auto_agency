<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAutoTable1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('auto', function (Blueprint $table) {
            $table->float('setka1');
            $table->float('setka2');
            $table->float('setka3');
            $table->float('zalog');
            $table->float('without');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('auto', function (Blueprint $table) {
            $table->dropColumn(['setka1']);
            $table->dropColumn(['setka2']);
            $table->dropColumn(['setka3']);
            $table->dropColumn(['zalog']);
            $table->dropColumn(['without']);
        });
    }
}
