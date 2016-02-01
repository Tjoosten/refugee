<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class roleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate the table.
        DB::table('roles')->delete();

        // Insert the records.
        DB::table('roles')->insert([

            // Global roles.
            ['name' => 'administrator', 'description' => 'Administrator role'],
            ['name' => 'user',          'description' => 'User role'],
            ['name' => 'moderator',     'description' => 'Moderator role'],

            // Collecting points
            // TODO: Make this groeps.

            // Various work groups
            // TODO: Make this groups
        ]);
    }
}
