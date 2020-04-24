<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Johnny Bravo',
            'email' => 'johnny.bravo@gmail.com',
            'password' => bcrypt('nonsecret')
            ]);

        DB::table('users')->insert([
            'name' => 'Tom Hanks',
            'email' => 'tom.hanks@gmail.com',
            'password' => bcrypt('runforest')

        ]);

        DB::table('users')->insert([
            'name' => 'Dummy Kowalski',
            'email' => 'dum.kowal@gmail.com',
            'password' => bcrypt('dummy123')

        ]);

        DB::table('users')->insert([
            'name' => 'Alex Hunter',
            'email' => 'alex.hunter@gmail.com',
            'password' => bcrypt('qwerty123')

        ]);
    }
}
