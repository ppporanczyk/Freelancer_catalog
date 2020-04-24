<?php

use Illuminate\Database\Seeder;
use App\Offer;

class OffersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /*$offer=new Offer();
        $offer->title = 'new webpage';
        $offer->user_id = 1;
        $offer->description = 'help me';
        $offer->deadline = '2020-01-20 13:33:44';
        $offer->maxSalary = 3000;
        $offer->save();*/

        DB::table('offers')->insert([
            'title' => 'new webpage',
            'user_id' => 1,
            'description' => 'help me',
            'deadline' => '2020-01-20 13:33:44',
            'maxSalary' => 3000
    ]);

        DB::table('offers')->insert([
        'title' => 'Freelancer offer catalog',
        'user_id' => 2,
        'description' => 'website using laravel framework',
        'deadline' => '2020-01-22 13:33:44',
        'maxSalary' => 1500
    ]);

        DB::table('offers')->insert([
        'title' => 'Sudoku game',
        'user_id' => 3,
        'description' => 'Technology: Python, Intertk',
        'deadline' => '2020-02-22 13:33:44',
        'maxSalary' => 50
    ]);

        DB::table('offers')->insert([
            'title' => 'Temporary database',
            'user_id' => 4,
            'description' => 'Technology: C++',
            'deadline' => '2020-01-31 13:33:44',
            'maxSalary' => 900
        ]);


    }
}
