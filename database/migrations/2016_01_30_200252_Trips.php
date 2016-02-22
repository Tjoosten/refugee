<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Trips extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         * Database columns.
         *
         * | Column      | Type         | Description            | System reserved |
         * | ----------- | ------------ |----------------------- | --------------- |
         * | id          | int(11)      | The incremental ID     | TRUE            |
         * | user_id     | int(11)      | The user id            | FALSE           |
         * | destination | varchar(255) | The trip destination   | FALSE           |
         * | region      | varchar(255) | The departure region   | FALSE           |
         * | date        | varchar(255) | The date off the trip  | FALSE           |
         * | name        | varchar(255) | The name of the driver | FALSE           |
         * | email       | varchar(255) | The email adress       | FALSE           |
         * | telephone   | varchar(255) | The telephone number   | FALSE           |
         * | places      | int          | Avaible places.        | FALSE           |
         * | updated_at  | timestamp    | The update date        | TRUE            |
         * | created_at  | timestamp    | The created date       | TRUE            |
         * | deleted_at  | timestamp    | The delete date        | TRUE            |
         * | ----------- | ------------ | ---------------------- | --------------- |
         *
         */
        Schema::create('trips', function (Blueprint $column) {
            $column->increments('id');
            $column->integer('user_id');
            $column->string('region');
            $column->string('destination');
            $column->string('date');
            $column->string('name');
            $column->string('email');
            $column->string('telephone');
            $column->integer('places');
            $column->timestamps();
            $column->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('trips');
    }
}
