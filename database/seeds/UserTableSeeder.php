<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate method.
        \DB::statement('SET foreign_key_checks=0');
        User::truncate();
        \DB::statement('SET foreign_key_checks=1');


        // Insert
        $user            = new User();
        $user->name      = 'Tim Joosten';
        $user->email     = 'Topairy@gmail.com';
        $user->status    = 0;
        $user->password  = bcrypt('root1995!');
        $user->api_token = str_random(60);

        if ($user->save()) {
            $account = User::find($user->id);

            Bouncer::assign('admin')->to($account);
            Bouncer::refreshFor($account);
        }
    }
}
