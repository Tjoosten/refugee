<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Database seeders.
         *
         * The seeders are used to populate the MySQL database
         * with a starter data-set that the system neede to be running optimal.
         *
         * -----------------------------------------------------------------------
         * SEEDER DESCRIPTION.
         * -----------------------------------------------------------------------
         *
         * userTableSeeder = Seed the database with a root user.
         *                   This user can be removed when there,
         *                   is a fully access administrator.
         *
         * roleTableSeeder = Seed the user roles to the database.
         *
         */

        $this->call(roleTableSeeder::class);
    }
}
