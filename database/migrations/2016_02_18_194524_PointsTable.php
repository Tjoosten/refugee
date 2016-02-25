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
            $t->increments('id')->comment('Unique id off the row (PK)');
            $t->string('Opening_maandag')->comment('Opening hours on Monday');
            $t->string('Opening_dinsdag')->comment('Opening hours on Tuesday');
            $t->string('Opening_woensdag')->comment('Opening hours on Wednesday');
            $t->string('Opening_donderdag')->comment('Opening hours on Thursday');
            $t->string('Opening_vrijdag')->comment('Opening hours on Friday');
            $t->string('Opening_zaterdag')->comment('Opening hours on Saturday');
            $t->string('Opening_zondag')->comment('Opening hours on Sunday');
            $t->string('adress')->comment('Address for th collection point');
            $t->string('contact')->comment('Contact info for the collection point');
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
