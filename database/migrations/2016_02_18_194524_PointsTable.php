<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inzamelpunten', function (Blueprint $t) {
            $t->increments('id');
            $t->string('Opening_maandag');
            $t->string('Opening_dinsdag');
            $t->string('Opening_woensdag');
            $t->string('Opening_donderdag');
            $t->string('Opening_vrijdag');
            $t->string('Opening_zaterdag');
            $t->string('Opening_zondag');
            $t->string('adress');
            $t->string('contact');
            $t->string('naam_inzamelpunt');
            $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfexists('inzamelpunten');
    }
}
